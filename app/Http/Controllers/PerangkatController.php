<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use App\Models\Perangkat;
use Illuminate\Support\Facades\Auth;

class PerangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Perangkat::where('lokasi', 'LIKE', '%' . $request->search . '%')->paginate(25);
        } else {
            $data = Perangkat::paginate(25);
        }
        return view('perangkat.perangkat', compact('data'));
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
            'lokasi' => 'required',
            'perangkat' => 'required',
        ]);
        Log::createLog(Auth::user()->id, 'Menambah Perangkat');
        $data = Perangkat::create($request->all());
        return redirect()->route('perangkat.index')->with('success', 'Create Success !!');
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
        $data = Perangkat::find($id);
        $data->update($request->all());
        Log::createLog(Auth::user()->id, 'Mengubah Perangkat');
        return redirect()->route('perangkat.index')->with('edit', 'Edit Success !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Perangkat::find($id);
        $data->delete();
        Log::createLog(Auth::user()->id, 'Menghapus Perangkat');
        return redirect()->route('perangkat.index')->with('delete', 'Delete Success !!');
    }
}
