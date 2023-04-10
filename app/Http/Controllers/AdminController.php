<?php

namespace App\Http\Controllers;

use App\Imports\BookImports;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Penulis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{


    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function daftarbuku()
    {
        $books = Buku::all();
        return view('admin.daftarbuku',['booksList' => $books]);
    }

    public function tambahbuku()
    {
        return view('admin.tambahbuku');
    }

    public function uploadBuku(Request $request)
    {

        $buku = new Buku;
        $buku->nama =  $request->input('namabuku');
        $buku->tahun_terbit = $request->input('tahunterbit');
        $buku->id_penulis = $request->input('idpenulis');
        $buku->id_penerbit = $request->input('idpenerbit');
        $buku->id_kategori = $request->input('idkategori');
        $buku->sinopsis = $request->input('sinopsis');
        $buku->created_at = Carbon::now();
        $buku->updated_at = Carbon::now();

            // //mengecek apabila filenya ada
            // if($request->hasFile('sampulbuku')){
            //     $file = $request->file('sampulbuku');
            //     $extention = $file->getClientOriginalExtension();
            //     $filename = time(). '.'.$extention;
            //     $file->storeAs('public/foto_sampul',$filename);
            //     return redirect()->route('admin.daftarbuku');
            // }
        $buku->save();
        return redirect()->route('admin.daftarbuku')->with('status','Berhasil');



        // if($file = $request->file('sampulbuku')){
        //     $fileData = $this->uploads($file,'/public/foto_sampul/');
        //     $uploading = Buku::create([
        //         'sampul' => $fileData['fileName']
        //     ]);
        // }
        // return $uploading;
        // $buku->save();
        // return redirect()->route('admin.daftarbuku');


    }

    public function editbuku($id)
    {
        $data = Buku::findOrFail($id);
        return view('admin.editbuku',compact('data'));
    }

    public function updatebuku(Request $request, $id)
    {
        $this->validate($request,[
            'namabuku',
            'tahunterbit',
            'idpenulis',
            'idpenerbit',
            'idkategori',
            'sinopsis',
            'updated_at'
        ]);

        $data = Buku::find($id);
        $data->nama = $request->namabuku;
        $data->tahun_terbit = $request->tahunterbit;
        $data->id_penulis = $request->idpenulis;
        $data->id_penerbit = $request->idpenerbit;
        $data->id_kategori = $request->idkategori;
        $data->sinopsis = $request->sinopsis;
        $data->updated_at = Carbon::now();
        $data->save();

        return redirect()->route('admin.daftarbuku')->with('sukses','Data telah berhasi diubah');
    }

    public function hapusbuku($id)
    {
        Buku::where('id',$id)->delete();

        return redirect()->route('admin.daftarbuku');
    }

    public function kategoribuku()
    {
        $categories = Kategori::all();
        return view('admin.kategoribuku',['catList' => $categories]);
    }

    public function daftarPenulis()
    {
        $authors = Penulis::all();
        return view('admin.daftarpenulis',compact('authors'));
    }

    public function generatePDF($id)
    {
        $data = Buku::findOrFail($id);
        $pdf = PDF::loadView('admin.pdfbuku', compact('data'));
        return $pdf->download('data_buku.pdf');        
    }

    public function generateExcel($id)
    {
        return Excel::download(new BookImports, 'data-buku.xlsx');
    }


    public function daftarPenerbit()
    {
        $publishers = Penerbit::all();
        return view('admin.daftarpenerbit',compact('publishers'));
    }

}
