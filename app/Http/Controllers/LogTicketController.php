<?php

namespace App\Http\Controllers;

use App\Models\LogTicket;
use Illuminate\Http\Request;

class LogTicketController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:view_logs|add_logs|edit_logs|delete_logs', ['only' => ['index', 'show ']]);
        $this->middleware('permission:add_logs', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit_logs', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete_logs', ['only' => ['destroy']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LogTicket  $logTicket
     * @return \Illuminate\Http\Response
     */
    public function show(LogTicket $logTicket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LogTicket  $logTicket
     * @return \Illuminate\Http\Response
     */
    public function edit(LogTicket $logTicket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LogTicket  $logTicket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogTicket $logTicket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LogTicket  $logTicket
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogTicket $logTicket)
    {
        //
    }
}
