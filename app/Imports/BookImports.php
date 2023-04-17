<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\Exportable;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Penulis;


use Maatwebsite\Excel\Concerns\FromCollection;

class BookImports implements FromCollection 
{
    use Exportable;

    protected $selected;


    public function collection()
    {
        return Buku::all();
    }

}
