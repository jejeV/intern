<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Stasiun;
use App\Models\Center;
use App\Models\Customer;
use App\Models\DetailA;
use App\Models\DetailB;
use App\Models\Perangkat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        if ($request->has('search')) {
            $data1 = Service::with(['customer'])
                            ->join('customers', 'services.customer_id', '=', 'customers.id')
                            ->where('companyname', 'LIKE' , '%' . $keyword . '%')
                            ->paginate(25);
            $count = Service::join('customers', 'services.customer_id', '=', 'customers.id')
            ->where('status', 'tidak aktif')
            ->count();
        } else {
            $count = Service::join('customers', 'services.customer_id', '=', 'customers.id')
            ->where('status', 'tidak aktif')
            ->count();
            // $data = Service::orderBy('created_at','desc')->paginate(25);
            $data1 = Service::with(['customer'])->paginate(25);
        }
        return view('service.service', compact('data1','count'));
        // dd($count);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        $perangkat = Perangkat::all();
        $data = Service::all();
        
        $ti = DB::table('services')->select(DB::raw('MAX(RIGHT(id,10000)) as kode'));
        $tt = "";
        if($ti->count()>0){
            foreach($ti->get() as $t){
                $tkt = ((int)$t->kode)+1;
                $tt = sprintf("%1s", $tkt);
            }
        }else{
            $tt = "10000";
        }

        return view('service.tambahservice', compact('customer','perangkat', 'tt','data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required'=>':attribute wajib di isi!'
        ];

        $this->validate($request, [
            'customer_id' => 'required',
            'status_node_a' => 'required',
            'rack_node_a' => 'required',
            'swicth_node_a' => 'required',
            'request_number_node_a' => 'required',
            'label_node_a' => 'required',
            'cable_lenght_node_a' => 'required',
            'status_node_b' => 'required',
            'rack_node_b' => 'required',
            'switch_node_b' => 'required',
            'request_number_node_b' => 'required',
            'label_node_b' => 'required',
            'cable_lenght_node_b' => 'required',
        ], $messages);

        $data = Service::create($request->all());
        $detaila = DetailA::create($request->all());
        $detailb = DetailB::create($request->all());
        return redirect()->route('service.index')->with('success', 'Create Success !!');
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Service::find($id);
        $detaila = DetailA::where('service_id', $id)->get();
        $detaila1 = DetailA::where('service_id', $id)->orderBy('created_at','desc')->paginate(1);
        $detailb = DetailB::where('service_id', $id)->get();
        $detailb1 = DetailB::where('service_id', $id)->orderBy('created_at', 'desc')->paginate(1);
        return view('service.showservice', compact('data','detaila','detaila1','detailb','detailb1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Service::findOrFail($id);
        $customer = Customer::all();
        $perangkat = Perangkat::all();
        return view('service.editservice', compact('data','customer','perangkat'));
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
        // 
        $data_old = Service::find($id);
        $data = Service::find($id);
        $data->update($request->all());
        if($data->status_node_a != $data_old->status_node_a){
            $detaila = DetailA::create($request->all());
        }
        if($data->status_node_b != $data_old->status_node_b){
            $detailb = DetailB::create($request->all());
        }
        return redirect()->route('service.index')->with('edit', 'Edit Success !!');

        // if($data->status_node_a != $data_old->status_node_a){
        //     DetailA::createLog($id, 'Mengubah Status A ' . $data->status_node_a);
        // }
        
        // if($data->status_node_b != $data_old->status_node_b){
        //     DetailB::createLog($id, 'Mengubah Status B ' . $data->status_node_b);
        // }
        // dd($request->all());
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
        return response()->json(['status' => 'Data Berhasil di hapus!']);
    }
}
