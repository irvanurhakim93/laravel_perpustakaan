<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Penulis extends Model
{
    use HasFactory;

    protected $table = 'penulis';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'email'
    ];

    public function namaPenulis()
    {
        return $this->nama;
    }

    public function buku(): HasMany
    {
        return $this->hasMany(Buku::class,'id_penulis');
    }

}
