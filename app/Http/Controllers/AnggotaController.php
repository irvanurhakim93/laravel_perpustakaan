<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $data = Anggota::all();
        return view('anggota.listanggota',compact('data'));
    }

    public function tambahanggota()
    {
        return view('anggota.tambahanggota');
    }

    public function uploadanggota(Request $request)
    {

        $input = new Anggota;
        $input->nama =  $request->input('namamember');
        $input->alamat = $request->input('alamat');
        $input->telepon = $request->input('telepon');
        $input->email = $request->input('email');
        $input->status_aktif = $request->input('statusaktif');
        $input->created_at = Carbon::now();
        $input->updated_at = Carbon::now();
        $input->save();
        return redirect()->route('admin.listanggota')->with('status','Berhasil');

    }




    public function editanggota($id)
    {
        $data = Anggota::findOrFail($id);
        return view('anggota.ubahanggota',compact('data'));
    }

    public function updateanggota(Request $request, $id)
    {
        $this->validate($request,[
            'namamember',
            'alamat',
            'telepon',
            'email',
            'statusaktif',
            'updated_at'
        ]);

        $data = Anggota::find($id);
        $data->nama = $request->namamember;
        $data->alamat = $request->alamat;
        $data->telepon = $request->telepon;
        $data->email = $request->email;
        $data->status_aktif = $request->statusaktif;
        $data->updated_at = Carbon::now();
        $data->save();

        return redirect()->route('admin.listanggota')->with('sukses','Data telah berhasi diubah');
    }

    public function hapusanggota($id)
    {
        Anggota::where('id',$id)->delete();

        return redirect()->route('admin.listanggota');
    }

}
