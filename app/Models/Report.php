<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $fillable = [
        'nik',
        'nama',
        'email',
        'hp',
        'aduan',
        'status',
        'respon',
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
    ];
}
