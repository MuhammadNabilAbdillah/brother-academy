<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_murid',
        'jenis_kelamin',
        'tanggal_lahir',
        'foto_murid',
        'nama_ortu',
        'hp_ortu',
        'pekerjaan_ortu',
    ];
}