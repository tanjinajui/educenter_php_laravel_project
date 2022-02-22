<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departments;
use App\Semesters;
use App\Courses;
class CourseController extends Controller
{
    //Authentication use Register chara login er jonno
    public function __construct()
{
    $this->middleware('admin');
}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semesters::all();
        $departments=Departments::all();
        $courses=Courses::orderBy('id','desc')->paginate(5);
        return view('Admin.Course.index',compact('semesters','departments','courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $departments=Departments::all();
         $semesters = Semesters::all();
        return view('Admin.Course.create',compact('departments', 'semesters'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //form validation
        $request->validate([
        'course_name' => 'required',
        'course_code' => 'required',
        'course_credit' => 'required',
        'departments_id' => 'required',
        'semesters_id' => 'required',
    ]);
        $data_add=$request->all();
       Courses::create($data_add);
       return redirect('/courses')->with('success', 'Data inserted successfully');
         // return $request->all();
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
        $data_show=Courses::where('id',$id)->first();
        $semesters = Semesters::all();
        $departments=Departments::all();
        return view('Admin.Course.edit',compact('data_show', 'semesters', 'departments'));
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
        $data=Courses::find($id);
        $update_data=$request->all();
        $data->update($update_data);
        return redirect('/courses')->with('success','Course update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_show=Courses::find($id);
        $data_show->delete();
        //return back dile delete hoye oi page thakbe
        return back()->with('success',"Delete this data");
        // redirect je page debo delete hoye se page a jabe
        return redirect('/courses')->with('success',"Delete this data");
    }
}
