<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class TestPDF extends Controller
{
    public function generatePDF()
    {
        $data = [
            'title' => 'Welcome to CodeSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('testpdf', $data);
    
        return $pdf->download('codesolutionstuff.pdf');
    }
}
