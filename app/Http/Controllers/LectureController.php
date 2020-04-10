<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecture;
use App\User;


class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lectures = Lecture::all()->toArray();
        return view('lecture.index', compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecture.create');
    }
    public function members($id)
    {
        $lecture = Lecture::find($id);
        $users = User::all()->toArray();
        return view('lecture.members', compact('lecture', 'id'));
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
            'name'    =>  'required',
            'type'    =>  'required',
            'ects'    =>  'required',
            'group_id'    =>  'required',
            
            
        ]);
        $lecture = new Lecture([
            'name'    =>  $request->get('name'),
            'type'    =>  $request->get('type'),
            'ects'    =>  $request->get('ects'),
            'group_id'    =>  $request->get('group_id'),
      
        ]);
        $lecture->save();
        return redirect()->route('lecture.index')->with('success', 'Data Added');
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
        $lecture = Lecture::find($id);
        return view('lecture.edit', compact('lecture', 'id'));
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
            'type'    =>  'required',
            'ects'    =>  'required',
            'group_id'    =>  'required',
 
        ]);
        $lecture = Lecture::find($id);
        $lecture->name = $request->get('name');
        $lecture->type  = $request->get('type');
        $lecture->ects = $request->get('ects');
        $lecture->group_id = $request->get('group_id');
        
   
        $lecture->save();
        return redirect()->route('lecture.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lecture = Lecture::find($id);
        $lecture->delete();
        return redirect()->route('lecture.index')->with('success', 'Data Deleted');
    }
}
