<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Good;
use App\Models\Transaction;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('dashboard.orders.index', [
            'active' => 'data',
            'no_nota' => $request->no_nota,
            'orders' => Order::where('no_nota', $request->no_nota)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('dashboard.orders.create', [
            'active' => 'data',
            'goods' => Good::all(),
            'no_nota' => $request->no_nota,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $barang = Good::where('id', $request['good_id'])->first();
        $harga = $barang->harga;
        Order::create([
            'no_nota' => $request->no_nota,
            'good_id' => $request->good_id,
            'qty' => $request->qty,
            'subtotal' => $request->subtotal,
            'price' => $harga,
        ]);
        Good::find($request->good_id)->decrement('stok', $request->qty);
        return view('dashboard.orders.index', [
            'no_nota' => $request['no_nota'],
            'orders' => Order::where('no_nota', $request['no_nota'])->get(),
            'goods' => Good::all(),
            'active' => 'cashier',
        ])->with('success', 'Pesanan telah ditambahkan.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function checkout(Request $request)
    {
        $transaction = Transaction::where('no_nota', $request->no_nota)->first();
        $kembalian = $request->total_harga - $transaction['bayar'];
        $rules = [
            'no_nota' => $request->no_nota,
            'total_harga' => $request->total_harga,
            'kembalian' => $kembalian,
        ];

        Transaction::where('no_nota', $rules['no_nota'])->update($rules);

        return redirect('/dashboard/transactions')->with('success', 'Sukses!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
