<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;

class HutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.hutang.index', [
            'active' => 'data',
            'customers' => Customer::latest()
                ->filter(request(['search']))
                ->paginate(10)
                ->withQueryString(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $balance = Transaction::where('nama_pembeli', $request->customer_id)->sum('kembalian');
        return view('dashboard.hutang.check', [
            'active' => 'data',
            'balance' => $balance,
            'customer' => Customer::where('nama', $request->customer_id)->first(),
        ]);
    }
}
