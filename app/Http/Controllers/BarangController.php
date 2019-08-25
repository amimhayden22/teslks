<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Transaksi;
use Redirect;
use Form;

class BarangController extends Controller
{
    public function TampilBarang()
    {
        $barang = Barang::select('*')->get();

        return view('table_barang', compact('barang'));
    }

    public function InputBarang(Request $request)
    {
        $cek = Barang::wherenm_brg($request->get('nm_brg'))->count();
        if ($cek > 0) {
            $jml = Barang::wherenm_brg($request->get('nm_brg'))->first()->jml_in;
            $brg = Barang::wherenm_brg($request->get('nm_brg'))->first();
            $brg->jml_in= $jml + $request->get('jml_in'); 
            $brg->save();
            
            return redirect()->back()->with('alert','jumlah');
        } else {
            $input = new Barang();
            $input->nm_brg = $request->get('nm_brg');
            $input->jml_in = $request->get('jml_in');
            $input->satuan = $request->get('satuan');
            $input->harga_brg = $request->get('harga_brg');
            $input->ket = $request->get('ket');
            $input->save();

            return redirect()->back()->with('alert','tambah');
        }
    }
    public function UpdateBarang(Request $request)
    {
        $brg = Barang::whereid($request->get('id'))->first();
        $brg->nm_brg = $request->get('nm_brg');
        $brg->jml_in = $request->get('jml_in');
        $brg->satuan = $request->get('satuan');
        $brg->harga_brg = $request->get('harga_brg');
        $brg->ket = $request->get('ket');
        $brg->save();

        return redirect()->back()->with('alert','update');
    }

    public function HapusBarang($id)
    {
        $hapus = Barang::whereid($id)->delete();
        
        return redirect()->back()->with('alert','hapus');
    }

    public function TampilTransaksi()
    {
        $transaksi = Transaksi::select('*')->get();
        $barang = Barang::all();

        return view('table_transaksi', compact('barang', 'transaksi'));
    }

    // public function InputTransaksi(Request $request)
    // {
    //     $cek = Transaksi::wherejml_out($request->get('jml_out'))->count();
    //     if ($cek > 0) {
    //         $jml = Barang::wherejml_in($request->get('jml_in'))->first()->jml_in;
    //         $out = Transaksi::wherenm_out($request->get('nm_out'))->first();
    //         $out->jml_out= $jml - $request->get('jml_out'); 
    //         $out->save();
            
    //         return redirect()->back()->with('alert','jumlah');
    //     } else {
    //         $input = new Transaksi();
    //         $input->nm_brg = $request->get('nm_brg');
    //         $input->jml_out = $request->get('jml_out');
    //         $input->satuan = $request->get('satuan');
    //         $input->ket = $request->get('ket');
    //         $input->save();

    //         return redirect()->back()->with('alert','tambah');
    //     }
    // }
}
