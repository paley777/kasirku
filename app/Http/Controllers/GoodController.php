<?php

namespace App\Http\Controllers;

use App\Models\Good;
use App\Models\Category;
use App\Http\Requests\StoreGoodRequest;
use App\Http\Requests\UpdateGoodRequest;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.goods.index', [
            'active' => 'data',
            'goods' => Good::latest()
                ->filter(request(['search']))
                ->paginate(7)
                ->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.goods.create', [
            'categories' => Category::all(),
            'active' => 'data',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGoodRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGoodRequest $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required',
            'tgl_masuk' => 'required',
            'nama' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ]);
        Good::create($validatedData);

        return redirect('/dashboard/goods')->with('success', 'Barang telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function show(Good $good)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function edit(Good $good)
    {
        return view('dashboard.goods.edit', [
            'categories' => Category::all(),
            'good' => $good,
            'active' => 'data',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGoodRequest  $request
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGoodRequest $request, Good $good)
    {
        $rules = [
            'id' => 'required',
            'category_id' => 'required',
            'tgl_masuk' => 'required',
            'nama' => 'required',
            'stok' => 'required',
            'harga' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Good::where('id', $validatedData['id'])->update($validatedData);

        return redirect('/dashboard/goods')->with('success', 'Barang telah diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Good  $good
     * @return \Illuminate\Http\Response
     */
    public function destroy(Good $good)
    {
        Good::destroy($good->id);

        return redirect('/dashboard/goods')->with('success', 'Barang telah dihapus.');
    }
}
