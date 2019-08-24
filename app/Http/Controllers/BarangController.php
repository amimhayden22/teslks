<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Transaksi;

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
            
            return redirect()->back();
        } else {
            $input = new Barang();
            $input->nm_brg = $request->get('nm_brg');
            $input->jml_in = $request->get('jml_in');
            $input->satuan = $request->get('satuan');
            $input->harga_brg = $request->get('harga_brg');
            $input->ket = $request->get('ket');

            return redirect('readbarang');
        }
        
    }

}
