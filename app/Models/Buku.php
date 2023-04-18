<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'tahun_terbit',
        'id_penerbit',
        'id_penulis',
        'id_kategori',
        'sinopsis',
        'sampul',
        'berkas'
    ];

    public function penulis()
    {
        $namapenulis = $this->belongsTo(Penulis::class,'id_penulis');
        return $namapenulis;
    }

    public function penerbit()
    {
        $penerbit = $this->belongsTo(Penerbit::class,'id_penerbit');
        return $penerbit;
    }

    public function kategori()
    {
        $listkategori = $this->belongsTo(Kategori::class,'id_kategori');
        return $listkategori;
    }

    public function gambar()
    {
         // jika ada data dari sampul dan juga file yang di folder public images books itu ada
        // yang sesuai dengan namanya
        // maka kita akan memangiil file nya di dalam image book nama foto

        if ($this->sampul && file_exists(public_path('images/books/' . $this->sampul))) {
            return asset('images/books/' . $this->sampul);
        } else {
            return asset('images/no_image.png');
        }
    }

    public function hapusgambar()
    {
        if ($this->sampul && file_exists(public_path('image/books' . $this->sampul))) {
            return unlink('images/books' . $this->sampul);
        }
    }

}
