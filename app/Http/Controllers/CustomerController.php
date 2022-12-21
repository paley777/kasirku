<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.customers.index', [
            'active' => 'data',
            'customers' => Customer::latest()
                ->filter(request(['search']))
                ->paginate(10)
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
        return view('dashboard.customers.create', [
            'active' => 'data',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
        ]);
        Customer::create($validatedData);

        return redirect('/dashboard/customers')->with('success', 'Pelanggan telah ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('dashboard.customers.edit', [
            'customer' => $customer,
            'active' => 'data',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $rules = [
            'id' => 'required',
            'nama' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
        ];
        $validatedData = $request->validate($rules);
        Customer::where('id', $validatedData['id'])->update($validatedData);

        return redirect('/dashboard/customers')->with('success', 'Pelanggan telah diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        Customer::destroy($customer->id);

        return redirect('/dashboard/customers')->with('success', 'Pelanggan telah dihapus.');
    }
}
