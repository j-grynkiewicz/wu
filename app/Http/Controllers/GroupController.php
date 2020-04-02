<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\User;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::all()->toArray();
        return view('group.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('group.create');
    }
    public function members($id)
    {
        $group = Group::find($id);
        $users = User::all()->toArray();
        return view('group.members', compact('group', 'id'));
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
            'name'    =>  'required|unique:groups',
            'dep_id'    =>  'required',
            
            
        ]);
        $group = new Group([
            'name'    =>  $request->get('name'),
            'dep_id'    =>  $request->get('dep_id'),
      
        ]);
        $group->save();
        return redirect()->route('group.index')->with('success', 'Data Added');
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
        $group = Group::find($id);
        return view('group.edit', compact('group', 'id'));
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
            'name'    =>  'required',
            'dep_id'    =>  'required',
 
        ]);
        $group = Group::find($id);
        $group->name = $request->get('name');
        $group->dep_id = $request->get('dep_id');
        
   
        $group->save();
        return redirect()->route('group.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
        return redirect()->route('group.index')->with('success', 'Data Deleted');
    }
}
