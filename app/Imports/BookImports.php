<?php

namespace App\Imports;
use App\Models\Buku;
use Maatwebsite\Excel\Concerns\FromCollection;

class BookImports implements FromCollection 
{

    public function collection()
    {
        return Buku::all();
    }

}
