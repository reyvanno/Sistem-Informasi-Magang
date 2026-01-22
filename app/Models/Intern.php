<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Intern extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'school',
        'major',
        'divisi',
        'alamat',
        'nisn',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'foto',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'tanggal_lahir' => 'date',
    ];

    /**
     * URL foto peserta magang
     */
    public function getFotoUrlAttribute()
    {
        // Jika ada nama file DAN file-nya benar-benar ada
        if ($this->foto && Storage::disk('public')->exists('foto-intern/' . $this->foto)) {
            return asset('storage/foto-intern/' . $this->foto);
        }

        // Fallback default avatar
        return asset('images/default-profile.jpg');
    }
}
