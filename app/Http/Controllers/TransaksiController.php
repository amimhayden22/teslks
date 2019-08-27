<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Barang;
use Redirect;
use Form;

class TransaksiController extends Controller
{
    //
    public function TampilTransaksi()
    {
        $transaksi = Transaksi::select('*')->get();
        $barang = Barang::all();

        return view('table_transaksi', compact('barang', 'transaksi'));
    }

    public function InputTransaksi(Request $request)
    {
        $cek = Transaksi::wherenm_brg($request->get('nm_brg'))->count();
        if ($cek > 0) {
            $jml = Transaksi::wherenm_brg($request->get('nm_brg'))->first()->jml_out;
            $brg = Transaksi::wherenm_brg($request->get('nm_brg'))->first();
            $brg->jml_out= $jml + $request->get('jml_out'); 
            $brg->save();
            
            return redirect()->back()->with('alert','jumlah');
        } else {
            $input = new Transaksi();
            $input->nm_brg = $request->get('nm_brg');
            $input->jml_out = $request->get('jml_out');
            $input->satuan = $request->get('satuan');
            $input->ket = $request->get('ket');
            $input->save();

            return redirect()->back()->with('alert','tambah');
        }
        
    }

    public function UpdateTransaksi(Request $request)
    {
        $brg = Transaksi::whereid($request->get('id'))->first();
        $brg->nm_brg = $request->get('nm_brg');
        $brg->jml_out = $request->get('jml_out');
        $brg->satuan = $request->get('satuan');;
        $brg->ket = $request->get('ket');
        $brg->save();

        return redirect()->back()->with('alert','update');
    }

    public function HapusTransaksi(Request $request)
    {
        $hapus = Transaksi::whereid($request->get('id'))->delete();
        
        return redirect()->back()->with('alert','hapus');
    }

    public function CetakTransaksi()
    {
        
    }
}
