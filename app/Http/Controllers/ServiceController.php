<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Stasiun;
use App\Models\Center;
use App\Models\Customer;
use App\Models\Log;
use App\Models\Perangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            // $data = Service::where('customer_id', 'LIKE', '%' . $request->search . '%')->paginate(25);
            $data = Service::where('companyname', 'LIKE', '%' . $request->search . '%')->paginate(25);
        } else {
            $data = Service::orderBy('created_at','desc')->paginate(25);
        }
        return view('service.service', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        $center = Center::all();
        $stasiun = Stasiun::all();
        $perangkat = Perangkat::all();
        return view('service.tambahservice', compact('center', 'stasiun','customer','perangkat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'status_node_a' => 'required',
            'detail_status_node_a' => 'required',
            'location_node_a' => 'required',
            'rack_node_a' => 'required',
            'swicth_node_a' => 'required',
            'request_number_node_a' => 'required',
            'label_node_a' => 'required',
            'cable_lenght_node_a' => 'required',
            'status_node_b' => 'required',
            'detail_status_node_b' => 'required',
            'location_node_b' => 'required',
            'rack_node_b' => 'required',
            'switch_node_b' => 'required',
            'request_number_node_b' => 'required',
            'label_node_b' => 'required',
            'cable_lenght_node_b' => 'required',
        ]);
        // dd($request->all());
        Log::createLog(Auth::user()->id, 'Menambah Service');
        $data = Service::create($request->all());
        return redirect()->route('service.index')->with('success', 'Create Success !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Service::find($id);
        $center = Center::all();
        $stasiun = Stasiun::all();
        $customer = Customer::all();
        $perangkat = Perangkat::all();
        return view('service.editservice', compact('data', 'center', 'stasiun', 'customer','perangkat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Service::find($id);
        $data->update($request->all());
        Log::createLog(Auth::user()->id, 'Mengubah Service');
        return redirect()->route('service.index')->with('edit', 'Edit Success !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Service::find($id);
        $data->delete();
        Log::createLog(Auth::user()->id, 'Menghapus Service');
        return response()->json(['status' => 'Data Berhasil di hapus!']);
    }
}
