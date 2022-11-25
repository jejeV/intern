<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Komentar;
use App\Models\LogTicket;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Ticket::where('customer', 'LIKE', '%' . $request->search . '%')->paginate(25);
        } else {
            $data = Ticket::orderBy('created_at','desc')->paginate(25);
            $customer = Customer::all();

            $ti = DB::table('tickets')->select(DB::raw('MAX(RIGHT(t_ticket,7)) as kode'));
            $tt = "";
            if($ti->count()>0){
                foreach($ti->get() as $t){
                    $tkt = ((int)$t->kode)+1;
                    $tt = sprintf("%07s", $tkt);
                }
            }else{
                $tt = "0000001";
            }
        }
        return view('ticket.ticket', compact('data','tt','customer'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            't_ticket' => 'required',
            'status' => 'required',
            'customer_id' => 'required',
        ]);
        $data = Ticket::create($request->all());
        return redirect()->route('ticket.index')->with('success', 'Create Success !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Ticket::find($id);
        $logs = [];
        $logQuery = LogTicket::where('ticket_id', $id)->get();

        foreach ($logQuery as $key => $log) {
            $logs[] = [
                'name' => User::where('id', $log->users_id)->get()[0]->name,
                'keterangan' => $log->keterangan,
                't_ticket' => Ticket::where('id', $log->ticket_id)->get()[0]->t_ticket,
                'created_at' => $log->created_at
            ];
        }
        return view('ticket.showticket', compact('data','logs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $data = Ticket::find($id);
        $data->update($request->all());
        if($request->status){
            LogTicket::createLogTicket(Auth::user()->id, 'Status ' . $data->status,$id);
        }

        return redirect('ticket/'.$id)->with('edit', 'Edit Success !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Ticket::find($id);
        $data->delete();
        return response()->json(['status' => 'Data Berhasil di hapus!']);
    }

    public function post(Request $request){
        $request->request->add(['user_id' => auth()->user()->id]);
        $komentar = Komentar::create($request->all());
        return redirect()->back()->with('success', 'Create Success !!');
        // dd($request->all());
    }
}
