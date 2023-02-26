<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Teachers as AuthTeachers;

class Teachers extends AuthTeachers
{
    use HasFactory;

    protected $table = 'tb_teachers';
    protected $primaryKey = 'id_teachers';

    protected $fillable = [
        'nama_teachers',
        'city',
        'pob',
        'dob',
    ];
}