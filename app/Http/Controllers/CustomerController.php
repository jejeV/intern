<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Center;
use App\Models\Log;
use App\Models\Stasiun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            $center = Center::all();
            $stasiun = Stasiun::all();
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
        $center = Center::all();
        $stasiun = Stasiun::all();
        return view('customer.tambahcustomer', compact('center', 'stasiun'));
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
            'companyname' => 'required',
            'salesname' => 'required',
            'node_a' => 'required',
            'node_b' => 'required',
            'product' => 'required',
            'ring' => 'required',
            'bandwidth' => 'required',
            'pair' => 'required',
            'km' => 'required',
            'so' => 'required',
            'cid' => 'required',
            'sid' => 'required',
            'net_active' => 'required',
            'active_date' => 'required',
            'hh_access' => 'required',
            'backbone' => 'required',
            'update_node_a' => 'required',
            'update_node_b' => 'required',
            'port_node_a' => 'required',
            'port_node_b' => 'required',
        ]);
        // dd($request->all());
        $data = Customer::create($request->all());
        Log::createLog(Auth::user()->id, 'Menambah Customer');
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
    public function edit($id)
    {
        $data = Customer::find($id);
        $center = Center::all();
        $stasiun = Stasiun::all();
        return view('customer.editcustomer', compact('data','center','stasiun'));
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
        Log::createLog(Auth::user()->id, 'Mengubah Customer');
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
        Log::createLog(Auth::user()->id, 'Menghapus Customer');
        return response()->json(['status' => 'Data Berhasil di hapus!']);
    }

    public function status($id)
    {
        $data = Customer::where('id',$id)->first();

        $status_sekarang = $data->status;

        if($status_sekarang == 'aktif'){
            Customer::where('id',$id)->update([
                'status'=>'tidak aktif'
            ]);
        }else{
            Customer::where('id',$id)->update([
                'status'=>'aktif'
            ]);
        }
        return redirect()->route('service.index');
    }
}
