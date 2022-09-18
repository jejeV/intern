<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCenterRequest;
use App\Http\Requests\UpdateCenterRequest;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Center::where('data_center', 'LIKE', '%' . $request->search . '%')->orWhere('area', 'LIKE', '%' . $request->search . '%')->paginate(25);
        } else {
            $data = Center::paginate(25);
        }
        return view('data-center.center', compact('data'));
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
     * @param  \App\Http\Requests\StoreCenterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'data_center' => 'required',
            'area' => 'required',
        ]);
        Log::createLog(Auth::user()->id, 'Menambah data Center');
        $data = Center::create($request->all());
        return redirect()->route('data-center.index')->with('success', 'Create Success !!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function show(Center $center)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function edit(Center $center)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCenterRequest  $request
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $data = Center::find($id);
        $data->update($request->all());

        Log::createLog(Auth::user()->id, 'Mengubah data Center');
        return redirect()->route('data-center.index')->with('edit', 'Edit Success !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Center::find($id);
        $data->delete();
        return redirect()->route('data-center.index')->with('delete', 'Delete Success !!');
    }
}
