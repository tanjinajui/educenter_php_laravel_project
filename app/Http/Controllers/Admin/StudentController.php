<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departments;
use App\Divisions;
use App\Districts;
use App\Upozilas;
use App\Courses;
use App\Semesters;
use App\Students;
use Image;
class StudentController extends Controller
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
        $divisions=Divisions::all();
        $districts = Districts::all();
        $upozilas = Upozilas::all();
        $courses = Courses::all();
        $departments=Departments::all();
        $semesters = Semesters::all();
        $students=Students::orderBy('id','desc')->paginate(3);
        return view('Admin.student.index',compact('divisions', 'districts', 'upozilas', 'courses', 'semesters', 'departments','students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $divisions=Divisions::all();
        $districts = Districts::all();
        $upozilas = Upozilas::all();
        $departments=Departments::all();
        $semesters = Semesters::all();
        return view('Admin.student.create',compact('divisions', 'districts', 'upozilas' ,'departments', 'semesters'));
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
        'student_first_name' => 'required',
        'student_last_name' => 'required',
        'username' => 'required',
        'password' => 'required',
        'departments_id' => 'required',
        'courses_id' => 'required',
        'semesters_id' => 'required',
        'divisions_id' => 'required',
        'districts_id' => 'required',
        'upozilas_id' => 'required',
        'village_name' => 'required',
        'student_email' => 'required|unique:students',
        'student_mobile' => 'required|unique:students',
    ]);
         $data_show=new Students;
        if ($request->hasfile('student_picture')) {
           $student_picture=$request->file('student_picture');
           
           $file_name=time().'.'.$student_picture->getClientOriginalExtension();
           // $request->teacher_picture->move('images/teacher_picture/', $file_name);
           //image_resize_compose_code
           $image_resize = Image::make($student_picture->getRealPath());              
           $image_resize->resize(300,300);

           $image_resize->save('images/student_picture/'.$file_name);          
           $data_show->student_picture=$file_name;
          //return $file_name;
        }
        $department=Departments::where('id',$request->departments_id)->first();
        $student=Students::where('departments_id',$request->departments_id)->get();
        $nubRow=count($student)+1;
        if ($nubRow <10) {
            $student_id=$department->short_name.'-'.date('Y').'-'."00" . $nubRow;
        }
        elseif ($nubRow >=10 && $nubRow<=99) {
            $student_id=$department->short_name.'-'.date('Y').'-'."0" . $nubRow;
        }
        elseif ($nubRow<=100) {
            $student_id=$department->short_name.'-'.date('Y').'-'. $nubRow;
        }
       
        $data_show->student_first_name=$request->student_first_name;
        $data_show->student_last_name=$request->student_last_name;
        $data_show->student_id=$student_id;
        $data_show->username=$request->username;
        $data_show->password=$request->password;
        $data_show->departments_id=$request->departments_id;
        $data_show->courses_id=$request->courses_id;
        $data_show->semesters_id=$request->semesters_id;
        $data_show->divisions_id=$request->divisions_id;
        $data_show->districts_id=$request->districts_id;
        $data_show->upozilas_id=$request->upozilas_id;
        $data_show->village_name=$request->village_name;
        $data_show->student_email=$request->student_email;
        $data_show->student_mobile=$request->student_mobile;
        $data_show->save();
        return redirect('/students')->with('success', 'Data inserted successfully');
         //return $request->all();
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
        $data_show=Students::where('id',$id)->first();
        $divisions=Divisions::all();
        $districts = Districts::all();
        $upozilas = Upozilas::all();
        $departments=Departments::all();
        return view('Admin.student.edit',compact('data_show', 'divisions', 'districts', 'upozilas', 'departments'));
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
        $data_show=Students::find($id);
        if ($request->hasfile('student_picture')) {
           $student_picture=$request->file('student_picture');
           
           $file_name=time().'.'.$student_picture->getClientOriginalExtension();
           //old img file
           $old_file=$data_show->student_picture;
           //image_resize_compose_code
           $image_resize = Image::make($student_picture->getRealPath());              
           $image_resize->resize(300,300);
           // if (!empty($old_file)) {
           //      $path=("images/student_picture/$old_file");
           //      unlink($path);
           // }
           //image upload na thake emty thakle
           if ($old_file!="") {
               $path=("images/student_picture/$old_file");
               unlink($path);
           }
           $image_resize->save('images/student_picture/'.$file_name);          
           $data_show->student_picture=$file_name;
          //return $file_name;
        }
        $data_show->student_first_name=$request->student_first_name;
        $data_show->student_last_name=$request->student_last_name;
        $data_show->divisions_id=$request->divisions_id;
        $data_show->districts_id=$request->districts_id;
        $data_show->upozilas_id=$request->upozilas_id;
        $data_show->village_name=$request->village_name;
        $data_show->student_email=$request->student_email;
        $data_show->student_mobile=$request->student_mobile;
        $data_show->save();
        
        return redirect('/students')->with('success','Students information upndate successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_show=Students::find($id);
        $data_show-> delete();
        //old img file
        $old_file=$data_show->student_picture;
        if ($old_file!="") {
               $path=("images/student_picture/$old_file");
               unlink($path);
           }
        //return back dile delete hoye oi page thakbe
        return back()->with('success',"Delete this data");
        // redirect je page debo delete hoye se page a jabe
        return redirect('/students')->with('success',"Delete this data");
    }
}
