<?php

namespace App\Http\Controllers;

use App\Models\Stasiun;
use Illuminate\Http\Request;

class StasiunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Stasiun::all();
        return view('stasiun.stasiun', compact('data'));
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
            'daop' => 'required',
            'nama_stasiun' => 'required',
            'kodkod' => 'required',
            'kmtsta' => 'required',
            'line' => 'required',
            'remark' => 'required',
            'rel_aktif_no_bb' => 'required',
            'ring' => 'required',
            'segmen' => 'required',
        ]);
        $data = Stasiun::create($request->all());
        return redirect()->route('stasiun.index');
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
    public function update(Request $request, $id)
    {
        $data = Stasiun::find($id);
        $data->update($request->all());

        return redirect()->route('stasiun.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stasiun  $stasiun
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Stasiun::find($id);
        $data->delete();
        return redirect()->route('stasiun.index');
    }
}
