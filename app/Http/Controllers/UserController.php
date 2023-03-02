<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            // $data = Service::where('customer_id', 'LIKE', '%' . $request->search . '%')->paginate(25);
            $data = User::where('name', 'LIKE', '%' . $request->search . '%')
                        ->orWhere('username', 'LIKE' , '%' . $request->search . '%')
                        ->paginate(20);
        } else {
            $data = User::paginate(20);
        }
        return view('user.user', compact('data'));
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
        $validateData = $request->validate([
            'name'=> 'required|max:225',
            'username' => ['required', 'min:3', 'max:225', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
            'role' => 'required'
            ]);
    
        $validateData['password'] = Hash::make($validateData['password']);
            
        User::create($validateData);

        return redirect()->route('user.index')->with('success', 'Registation successfull! Please Login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::find($id);

        $this->validate($request, [
            'name'=> 'required|max:225',
            'username' => ['required', 'min:3', 'max:225'],
            'email' => 'required|email:dns',
            'role' => 'required'
        ]);

        $input = $request->only('name','username','email','role');

        $data->update($input);
        return redirect()->route('user.index')->with('edit', 'Edit Success !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function resetPassword(Request $request, $id){
        $data = User::find($id);

        $this->validate($request,[
            'password' => 'required|min:5|max:255',
            'confirm_password' => 'required|same:password|min:5|max:255'
        ]);

        $request['password'] = Hash::make($request['password']);

        $input = $request->only('password');

        $data->update($input);

        return redirect()->route('user.index')->with('change', 'Change Password Success !!');
    }
}
