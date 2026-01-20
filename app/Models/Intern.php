<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{
    use HasFactory;

    protected $fillable = [
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

    // Method untuk mendapatkan path foto
    public function getFotoUrlAttribute()
    {
        if ($this->foto) {
            return asset('storage/foto-intern/' . $this->foto);
        }
        return asset('images/default-profile.jpg');
    }
}