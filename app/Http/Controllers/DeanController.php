<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class DeanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->toArray();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.createDeans');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = 2;
        $this->validate($request, [
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'username'     =>  'required|unique:users',
            'email'     =>  'required|unique:users',
            'password'     =>  'required',
            'dep_id'     =>  'required',
            
        ]);
        $user = new User([
            'first_name'    =>  $request->get('first_name'),
            'last_name'     =>  $request->get('last_name'),
            'username'     =>  $request->get('username'),
            'email'     =>  $request->get('email'),
            'password'     =>  Hash::make($request['password']),
            'dep_id'     =>  $request->get('dep_id'),
            'type'     =>  $type
            
        

        ]);
        $user->save();
        return redirect()->route('user.index')->with('success', 'Data Added');
    }

   
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
        $user = User::find($id);
        return view('user.editDeans', compact('user', 'id'));
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
        $this->validate($request, [
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'email'     =>  'required',
            'dep_id'     =>  'required',
           
        ]);
        $user = User::find($id);
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->dep_id = $request->get('dep_id');
        $user->save();
        return redirect()->route('user.index')->with('success', 'Data Updated');
    }


    public function editDeans($id)
    {
        $user = User::find($id);
        return view('user.editDeans');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateDeans(Request $request, $id)
    {
        $this->validate($request, [
            'first_name'    =>  'required',
            'last_name'     =>  'required',
            'email'     =>  'required',
            'group_id'     =>  'required',
           
        ]);
        $user = User::find($id);
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->group_id = $request->get('group_id');
        $user->save();
        return redirect()->route('user.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data Deleted');
    }
}
