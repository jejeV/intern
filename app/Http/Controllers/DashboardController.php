<?php

namespace App\Http\Controllers;

use App\Models\Stasiun;
use App\Models\Customer;
use App\Models\Ticket;
use App\Models\Center;
use App\Models\Perangkat;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stasiun = Stasiun::count();
        $customer = Customer::count();
        $ticket = Ticket::count();
        $center = Center::count();
        $service = Service::count();
        $perangkat = Perangkat::count();

        return view('dashboard', compact('stasiun', 'customer', 'ticket','center','service','perangkat'));
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
     * @param  \App\Models\Stasiun  $stasiun
     * @return \Illuminate\Http\Response
     */
    public function show(Stasiun $stasiun)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stasiun  $stasiun
     * @return \Illuminate\Http\Response
     */
    public function edit(Stasiun $stasiun)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stasiun  $stasiun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stasiun $stasiun)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stasiun  $stasiun
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stasiun $stasiun)
    {
        //
    }
}
