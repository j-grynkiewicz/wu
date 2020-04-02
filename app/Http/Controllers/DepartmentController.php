<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\User;
use App\Group;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all()->toArray();
        return view('department.index', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('department.create');
    }
    public function members($id)
    {
        $department = Department::find($id);
        $groups = Group::all()->toArray();
        return view('department.members', compact('department', 'id'));
    }
    public function deans($id)
    {
        $department = Department::find($id);
        $groups = User::all()->toArray();
        return view('department.deans', compact('department', 'id'));
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
            'name'    =>  'required|unique:departments',
            'dep_id'    =>  'required',
            
            
        ]);
        $department = new Department([
            'name'    =>  $request->get('name'),
            'dep_id'    =>  $request->get('dep_id'),
      
        ]);
        $department->save();
        return redirect()->route('department.index')->with('success', 'Data Added');
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
        $department = Department::find($id);
        return view('department.edit', compact('department', 'id'));
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
 
        ]);
        $department = Department::find($id);
        $department->name = $request->get('name');
   
        $department->save();
        return redirect()->route('department.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('department.index')->with('success', 'Data Deleted');
    }
}
