<?php

namespace App\Http\Controllers;

use App\Models\DetailA;
use App\Http\Requests\StoreDetailARequest;
use App\Http\Requests\UpdateDetailARequest;
use Illuminate\Http\Request;

class DetailAController extends Controller
{
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
     * @param  \App\Http\Requests\StoreDetailARequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $detaila = DetailA::create($request->all());
        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailA  $detailA
     * @return \Illuminate\Http\Response
     */
    public function show(DetailA $detailA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailA  $detailA
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailA $detailA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailARequest  $request
     * @param  \App\Models\DetailA  $detailA
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailARequest $request, DetailA $detailA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailA  $detailA
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailA $detailA)
    {
        //
    }
}
