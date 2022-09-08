<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Customer::where('companyname', 'LIKE', '%' . $request->search . '%')->paginate(25);
        } else {
            $data = Customer::paginate(25);
        }
        return view('customer.customer', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorecustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'inputdate' => 'required',
            'companyname' => 'required',
            'companyaddress' => 'required',
            'phone' => 'required',
            'npwp' => 'required',
            'dealname' => 'required',
            'position' => 'required',
            'nohandphone' => 'required',
            'emaildealname' => 'required',
            'pictechnicalname' => 'required',
            'position_pict' => 'required',
            'phone_pict' => 'required',
            'email_pict' => 'required',
            'picfinacename' => 'required',
            'position_picf' => 'required',
            'phone_picf' => 'required',
            'email_picf' => 'required',
            'service' => 'required',
            'project' => 'required',
            'bandwidth' => 'required',
            'node_a' => 'required',
            'node_b' => 'required',
        ]);
        $data = Customer::create($request->all());
        return redirect()->route('customer.index')->with('success', 'Create Success !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecustomerRequest  $request
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Customer::find($id);
        $data->update($request->all());

        return redirect()->route('customer.index')->with('edit', 'Edit Success !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customer::find($id);
        $data->delete();
        return redirect()->route('customer.index')->with('delete', 'Delete Success !!');
    }
}
