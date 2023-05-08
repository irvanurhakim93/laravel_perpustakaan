<?php

namespace App\Http\Controllers;

use App\Imports\BookImports;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Penulis;
use Carbon\Carbon;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use Maatwebsite\Excel\Facades\Excel;


class AdminController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    //     $this->middleware('role:ROLE_ADMIN');  
    // }

    public function index()
    {
        return view('admin.dashboard');
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $userinfo = User::where('username', '=', $request->username)->first();

        if(!$userinfo){
            return back();
        } else {
            return redirect()->route('petugas.dashboard');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('petugas.login');
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function daftarbuku()
    { 
        $booksList = Buku::paginate(10);
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        return view('admin.daftarbuku',compact('booksList','penulis','penerbit'));
    }

    public function filterBuku(Request $request)
    {
        $booksList = Buku::where(function($query) use($request){
            return $request->id_penulis ? $query->from('penulis')->where('id',$request->id_penulis) : '';
        })->where(function($query) use($request){
            return $request->id_penerbit ? $query->from('penerbit')->where('id',$request->id_penerbit) : '';
        })
        ->with('penulis','penerbit')
        ->get();

        $selected_id = [];
        $selected_id['id_penulis'] = $request->id_penulis;
        $selected_id['id_penerbit'] = $request->id_penerbit;

        return view('admin.daftarbuku',compact('booksList','selected_id'));

    }

    public function tambahbuku()
    {
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('admin.tambahbuku',compact('penulis','penerbit','kategori'));
    }

    public function uploadBuku(Request $request)
    {

        $buku = new Buku;
        $buku->nama =  $request->input('namabuku');
        $buku->tahun_terbit = $request->input('tahunterbit');
        $buku->id_penulis = $request->input('pilihpenulis');
        $buku->id_penerbit = $request->input('pilihpenerbit');
        $buku->id_kategori = $request->input('pilihkategori');
        $buku->sinopsis = $request->input('sinopsis');

        //upload foto sampul
        if ($request->hasFile('cover')) {
            $fotosampul = $request->file('cover');
            $namasampul = rand(1000, 9999) . $fotosampul->getClientOriginalName();
            $fotosampul->move('images/books', $namasampul);
            $buku->sampul = $namasampul;
        }
        $buku->created_at = Carbon::now();
        $buku->updated_at = Carbon::now();

        $buku->save();
        return redirect()->route('admin.daftarbuku')->with('status','Berhasil');
    }

    public function editbuku($id)
    {
        $data = Buku::findOrFail($id);
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();
        return view('admin.editbuku',compact('data','penulis','penerbit','kategori'));
    }

    public function updatebuku(Request $request, $id)
    {
        $this->validate($request,[
            'namabuku',
            'tahunterbit',
            'pilihpenulis',
            'pilihpenerbit',
            'pilihkategori',
            'sinopsis',
            'cover
            ',
            'updated_at'
        ]);

        $data = Buku::find($id);
        $data->nama = $request->namabuku;
        $data->tahun_terbit = $request->tahunterbit;
        $data->id_penulis = $request->pilihpenulis;
        $data->id_penerbit = $request->pilihpenerbit;
        $data->id_kategori = $request->pilihkategori;
        $data->sinopsis = $request->sinopsis;

        //upload foto sampul
        if ($request->hasFile('cover')) {
        $fotosampul = $request->file('cover');
        $namasampul = rand(1000, 9999) . $fotosampul->getClientOriginalName();
        $fotosampul->move('images/books', $namasampul);
        $data->sampul = $namasampul;
        }

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
        // return $pdf->download('data_buku.pdf');        
        return $pdf->download($data->nama . ' ' . '.pdf');        
    }

public function generateExcel()
    {
        return Excel::download(new BookImports, 'data-buku.xlsx');
    }


    public function daftarPenerbit()
    {
        $publishers = Penerbit::all();
        return view('admin.daftarpenerbit',compact('publishers'));
    }

}
