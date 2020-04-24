<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Grade;
use App\User;
use App\Group;
use App\Lecture;


class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grades = Grade::all()->toArray();
        return view('grade.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('grade.create');
    }
    public function members($id)
    {
        $grade = Grade::find($id);
        $groups = Group::all()->toArray();
        return view('grade.members', compact('grade', 'id'));
    }
    public function deans($id)
    {
        $grade = Grade::find($id);
        $groups = User::all()->toArray();
        return view('grade.deans', compact('grade', 'id'));
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
            'grade'    =>  'required',
            'student_id'    =>  'required',
            'lecture_id'    =>  'required',
            
            
        ]);
        $grade = new Grade([
            'grade'    =>  $request->get('grade'),
            'student_id'    =>  $request->get('student_id'),
            'lecture_id'    =>  $request->get('lecture_id'),
      
        ]);
        $grade->save();
        return redirect()->route('grade.index')->with('success', 'Data Added');
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
        $grade = Grade::find($id);
        return view('grade.edit', compact('grade', 'id'));
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
            'grade'    =>  'required',
 
        ]);
        $grade = Grade::find($id);
        $grade->grade = $request->get('grade');
        $grade->save();
        return redirect()->route('grade.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = Grade::find($id);
        $grade->delete();
        return redirect()->route('grade.index')->with('success', 'Data Deleted');
    }
}
