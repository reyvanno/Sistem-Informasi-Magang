<?php

namespace App\Http\Controllers;

use App\Models\Intern;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Form edit data magang siswa
     */
    public function edit(Request $request)
    {
        $intern = Intern::where('user_id', auth()->id())->first();

        return view('profile.edit', [
            'intern'  => $intern,
            'jurusan' => config('internship.jurusan'),
            'agama'   => config('internship.agama'),
        ]);
    }

    /**
     * Simpan / update data magang siswa
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|max:255|unique:interns,email,' . optional(
                Intern::where('user_id', auth()->id())->first()
            )->id,
            'phone'          => 'required|string|max:20|regex:/^[0-9]+$/',
            'school'         => 'required|string|max:255',
            'nisn'           => 'required|string|max:20|regex:/^[0-9]+$/',
            'jenis_kelamin'  => 'required|in:Laki-laki,Perempuan',
            'major'          => 'required|string|max:255',
            'divisi'         => 'required|string|max:255',
            'tempat_lahir'   => 'required|string|max:255',
            'tanggal_lahir'  => 'required|date',
            'agama'          => 'required|string|max:255',
            'alamat'         => 'required|string',
            'start_date'     => 'required|date',
            'end_date'       => 'required|date|after_or_equal:start_date',
            'foto'           => 'nullable|image|mimes:jpg,jpeg,png|max:5120',
        ], [
            'foto.max' => 'Ukuran foto terlalu besar. Maksimal 5MB.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.mimes' => 'Format foto harus berupa jpg, jpeg, atau png.',
        ]);

        $validated['user_id'] = auth()->id();

        // Ambil data lama (jika ada)
        $intern = Intern::where('user_id', auth()->id())->first();

        // Handle upload foto
        if ($request->hasFile('foto')) {

            if ($intern && $intern->foto && Storage::disk('public')->exists('foto-intern/' . $intern->foto)) {
                Storage::disk('public')->delete('foto-intern/' . $intern->foto);
            }

            $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->storeAs('foto-intern', $filename, 'public');
            $validated['foto'] = $filename;
        } else {
            $validated['foto'] = $intern?->foto;
        }

        Intern::updateOrCreate(
            ['user_id' => auth()->id()],
            $validated
        );

        return redirect()
            ->route('siswa.interns.index')
            ->with('success', 'Data magang berhasil disimpan.');
    }
}
