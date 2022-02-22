<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Students;
use App\Semesters;
use App\Courses;
use App\Departments;
use App\CourseAsignMultiple;
use App\Teachers;
class CourseAsignMultipleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semesters::all();
        $teachers = Teachers::all();
        $courses = Courses::all();
        $departments=Departments::all();
        $course_asign_multiple=CourseAsignMultiple::orderBy('id','desc')->paginate(2);
        return view('Admin.course_asign_multiple.index',compact('semesters', 'teachers', 'courses', 'departments','course_asign_multiple'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Departments::all();
        $courses = Courses::all();
        $teachers = Teachers::all();
        $semesters = Semesters::all();
        return view('Admin.course_asign_multiple.create',compact('semesters', 'departments', 'courses', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
