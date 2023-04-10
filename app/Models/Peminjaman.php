<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_buku',
        'id_anggota',
        'tanggal_pinjam',
        'tanggal_kembali'
    ];


}
