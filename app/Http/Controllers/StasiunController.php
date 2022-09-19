<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Stasiun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StasiunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search')){
            $data = Stasiun::where('nama_stasiun','LIKE', '%' . $request->search. '%')->orWhere('kodkod', 'LIKE', '%' . $request->search . '%')->paginate(25);
        }else{
            $data = Stasiun::paginate(25);
        }
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
        Log::createLog(Auth::user()->id, 'Menambah Stasiun');
        $data = Stasiun::create($request->all());
        return redirect()->route('stasiun.index')->with('success', 'Create Success !!');
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
        Log::createLog(Auth::user()->id, 'Mengubah Stasiun');
        return redirect()->route('stasiun.index')->with('edit', 'Edit Success !!');
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
        Log::createLog(Auth::user()->id, 'Menghapus Stasiun');
        return redirect()->route('stasiun.index')->with('delete', 'Delete Success !!');
    }
}
