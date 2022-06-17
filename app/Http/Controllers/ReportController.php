<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good;
use App\Models\Transaction;
use App\Models\Order;
use PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.reports.index', [
            'dateawal' => Transaction::min('tgl_transaksi'),
            'dateakhir' => Transaction::max('tgl_transaksi'),
            'active' => 'rekap',
        ]);
    }
    public function goods()
    {
        $goods = Good::all();

        $pdf = PDF::loadview('good_pdf', ['goods' => $goods]);
        return $pdf->download('laporan-barang.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function transactions(Request $request)
    {
        $transactions = Transaction::all();

        $pdf = PDF::loadview('transactions_pdf', ['transactions' => $transactions]);
        return $pdf->download('laporan-transaksi.pdf');
    }
}
