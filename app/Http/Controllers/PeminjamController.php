<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Carbon\Carbon;
use Illuminate\Http\Request;


class PeminjamController extends Controller
{
    public function index()
    {
        $data = Peminjaman::all();
        return view('peminjam.peminjam',compact('data'));
    }


    public function editPeminjam($id)
    {
        $data = Peminjaman::findOrFail($id);
        return view('peminjam.ubahpeminjam',compact('data'));
    }

    public function hapusPeminjam($id)
    {
        Peminjaman::where('id',$id)->delete();
        return redirect()->route('peminjam.index');
    }

    public function updatePeminjam(Request $request,$id)
    {
        $this->validate($request,[
            'idbuku',
            'idanggota',
            'tglpinjam',
            'tglkembali',
            'updated_at'
        ]);

        $data = Peminjaman::find($id);
        $data->id_buku = $request->idbuku;
        $data->id_anggota = $request->idanggota;
        $data->tanggal_pinjam = $request->tglpinjam;
        $data->tanggal_kembali = $request->tglkembali;
        $data->updated_at = Carbon::now();
        $data->save();

        return redirect()->route('peminjam.index')->with('sukses','Data telah berhasi diubah');

    }

}
