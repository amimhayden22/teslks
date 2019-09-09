<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stock;
use Redirect;
use Form;

class StockController extends Controller
{
    //
    public function TampilStock()
    {
        $stock = Stock::select('*')->get();

        return view('table_stock', compact('stock'));
    }

    public function InputStock(Request $request)
    {
        $input = new Stock();
        $input->nm_brg = $request->get('nm_brg');
        $input->save();

        return redirect()->back()->with('alert', 'tambah');
    }

    public function UpdateStock(Request $request)
    {
        $stock = Stock::whereid($request->get('id'))->first();
        $stock->nm_brg = $request->get('nm_brg');
        $stock->save();

        return redirect()->back()->with('alert','update');
    }

    public function HapusStock(Request $request)
    {
        $hapus = Stock::whereid($request->get('id'))->delete();

        return redirect()->back()->with('alert','hapus');
    }
}
