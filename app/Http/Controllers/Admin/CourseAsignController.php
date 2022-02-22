<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Courses;
use App\Departments;
use App\Teachers;
use App\Semesters;
use App\Courses_asigns;
class CourseAsignController extends Controller
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
        $teachers = Teachers::all();
        $courses = Courses::all();
        $departments=Departments::all();
        $courses_asigns=Courses_asigns::orderBy('id','desc')->paginate(2);
        return view('Admin.course_asign.index',compact('semesters', 'teachers', 'courses', 'departments','courses_asigns'));
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
        return view('Admin.course_asign.create',compact('semesters', 'departments', 'courses', 'teachers'));
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
        'departments_id' => 'required',
        'courses_id' => 'required',
        'teachers_id' => 'required',
        // 'taken_credit' => 'required',
        'course_code' => 'required',
        'course_credit' => 'required',
        'semesters_id' => 'required',
    ]);
        $data_add=$request->all();
        if($request->course_credit){
            $teacher_id = $request->teachers_id;
            $teacher = Teachers::where('id','=',$teacher_id)->first();
            if(($teacher->taken_credit = $teacher->taken_credit + $request->course_credit)<= $teacher->max_credit ){
                $teacher->save();
            }else{
                return back()->with('error',"The Teacher Dose not Get This Course ! You have to give within $teacher->max_credit Credit !!!! ");
            }
        }
       Courses_asigns::create($data_add);
       return redirect('/courses_asigns')->with('success', 'Data inserted successfully');
        return $request->all();
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
        $data_show=Courses_asigns::where('id',$id)->first();
        $semesters = Semesters::all();
        $teachers = Teachers::all();
        $courses = Courses::all();
        $departments=Departments::all();
        return view('Admin.course_asign.edit',compact('data_show', 'semesters', 'teachers', 'courses', 'departments'));
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
        $data=Courses_asigns::find($id);
        $update_data=$request->all();
        $data->update($update_data);
        return redirect('/courses_asigns')->with('success','Courses_asigns update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_show=Courses_asigns::find($id);
        $data_show->delete();
        //return back dile delete hoye oi page thakbe
        return back()->with('success',"Delete this data");
        // redirect je page debo delete hoye se page a jabe
        return redirect('/courses_asigns')->with('success',"Delete this data");
    }
}
