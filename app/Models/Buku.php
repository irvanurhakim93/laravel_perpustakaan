<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'tahun_terbit',
        'id_penulis',
        'id_kategori',
        'sinopsis',
        'sampul',
        'berkas'
    ];

}
