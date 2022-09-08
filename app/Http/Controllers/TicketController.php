<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

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
            $data = Ticket::where('t_ticket', 'LIKE', '%' . $request->search . '%')->orWhere('tt_stat', 'LIKE', '%' . $request->search . '%')->paginate(25);
        } else {
            $data = Ticket::paginate(25);
        }
        return view('ticket.ticket', compact('data'));
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
            'posting' => 'required',
            'tt_stat' => 'required',
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

        return redirect()->route('ticket.index')->with('edit', 'Edit Success !!');
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
        return redirect()->route('ticket.index')->with('delete', 'Delete Success !!');
    }
}
