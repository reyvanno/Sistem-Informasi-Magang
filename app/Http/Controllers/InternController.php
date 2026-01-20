<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use App\Services\ActivityLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InternController extends Controller
{
    public function index()
    {
        $interns = Intern::latest()->get();
        return view('interns.index', compact('interns'));
    }

    public function create()
    {
        $jurusan = config('internship.jurusan');
        $agama = config('internship.agama');
        $divisi = [];
        
        return view('interns.create', compact('jurusan', 'agama', 'divisi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:interns,email',
            'phone' => 'required|string|max:20|regex:/^[0-9]+$/',
            'school' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'divisi' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nisn' => 'required|string|max:20|regex:/^[0-9]+$/',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        // Handle file upload
        if ($request->hasFile('foto')) {
            $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('foto-intern', $filename, 'public');
            $validated['foto'] = $filename;
        }

        $intern = Intern::create($validated);

        // Log activity
        ActivityLogService::log('create', "Created intern: {$intern->name}");

        return redirect()->route('interns.index')
            ->with('success', 'Peserta magang berhasil ditambahkan!');
    }

    public function show(Intern $intern)
    {
        return view('interns.show', compact('intern'));
    }

    public function edit(Intern $intern)
    {
        $jurusan = config('internship.jurusan');
        $agama = config('internship.agama');
        $divisiMapping = config('internship.divisi_mapping');
        $divisi = $intern->major ? ($divisiMapping[$intern->major] ?? []) : [];
        
        return view('interns.edit', compact('intern', 'jurusan', 'agama', 'divisi'));
    }

    public function update(Request $request, Intern $intern)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:interns,email,' . $intern->id,
            'phone' => 'required|string|max:20|regex:/^[0-9]+$/',
            'school' => 'required|string|max:255',
            'major' => 'required|string|max:255',
            'divisi' => 'required|string|max:255',
            'alamat' => 'required|string',
            'nisn' => 'required|string|max:20|regex:/^[0-9]+$/',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

       // Hapus Foto Jika Checkbox Di Centang
        if ($request->delete_foto == 1) {
            if ($intern->foto && Storage::disk('public')->exists('foto-intern/' . $intern->foto)) {
                Storage::disk('public')->delete('foto-intern/' . $intern->foto);
            }
            $validated['foto'] = null;
        }

        // Jika Upload Foto Baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($intern->foto && Storage::disk('public')->exists('foto-intern/' . $intern->foto)) {
                Storage::disk('public')->delete('foto-intern/' . $intern->foto);
            }

            $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->storeAs('foto-intern', $filename, 'public');

            $validated['foto'] = $filename;
        }

        // Jika tidak upload foto dan tidak centang hapus, maka pakai foto lama
        if (!isset($validated['foto'])) {
            $validated['foto'] = $intern->foto;
        }

        $intern->update($validated);

        ActivityLogService::log('update', "Updated intern: {$intern->name}");

        return redirect()->route('interns.index')
            ->with('success', 'Data peserta magang berhasil diperbarui!');
    }

    public function destroy(Intern $intern)
    {
        // Delete foto if exists
        if ($intern->foto && Storage::disk('public')->exists('foto-intern/' . $intern->foto)) {
            Storage::disk('public')->delete('foto-intern/' . $intern->foto);
        }

        $internName = $intern->name;
        $intern->delete();

        // Log activity
        ActivityLogService::log('delete', "Deleted intern: {$internName}");

        return redirect()->route('interns.index')
            ->with('success', 'Peserta magang berhasil dihapus!');
    }

    // Ajax method untuk mendapatkan divisi berdasarkan jurusan
    public function getDivisi(Request $request)
    {
        $jurusan = $request->get('jurusan');
        $divisiMapping = config('internship.divisi_mapping');
        
        $divisi = $jurusan ? ($divisiMapping[$jurusan] ?? []) : [];
        
        return response()->json($divisi);
    }
}