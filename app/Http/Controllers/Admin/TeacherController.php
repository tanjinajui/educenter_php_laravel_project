<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Departments;
use App\Teachers;
use Image;
use DB;
class TeacherController extends Controller
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
    public function index(Request $request)
    {
      if (empty($request->all())) {
        $departments=Departments::all();
        $teachers=Teachers::orderBy('id','desc')->paginate(2);
        return view('Admin.Teacher.index',compact('departments','teachers'));
        }
        else{
          $departments=Departments::all();
          $teachers=Teachers::Where('teacher_name','LIKE','%'.$request->search.'%')->orWhere('teacher_email','LIKE','%'.$request->search.'%')->orWhere('teacher_mobile','LIKE','%'.$request->search.'%')->paginate(2);
          return view('Admin.Teacher.index',compact('departments','teachers'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments=Departments::all();
        return view('Admin.Teacher.create',compact('departments'));
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
        'teacher_name' => 'required',
        'teacher_code' => 'required',
        'max_credit' => 'required',
        'teacher_email' => 'required|unique:teachers',
        'teacher_mobile' => 'required|unique:teachers',
        'departments_id' => 'required',
        'teacher_picture' => 'required',
        
    ]);

        $data_show=new Teachers;
        if ($request->hasfile('teacher_picture')) {
           $teacher_picture=$request->file('teacher_picture');
           
           $file_name=time().'.'.$teacher_picture->getClientOriginalExtension();
           // $request->teacher_picture->move('images/teacher_picture/', $file_name);
           //image_resize_compose_code
           $image_resize = Image::make($teacher_picture->getRealPath());              
           $image_resize->resize(300,300);

           $image_resize->save('images/teacher_picture/'.$file_name);          
           $data_show->teacher_picture=$file_name;
          //return $file_name;
        }
                
        $data_show->teacher_name=$request->teacher_name;
        $data_show->teacher_code=$request->teacher_code;
        $data_show->max_credit=$request->max_credit;
        $data_show->teacher_email=$request->teacher_email;
        $data_show->teacher_mobile=$request->teacher_mobile;
        $data_show->departments_id=$request->departments_id;
        // $data_show->teacher_picture=$request->teacher_picture;
       
        $data_show->save();
        return redirect('/teachers')->with('success', 'Data inserted successfully');
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
        //$data_show=Admissions::find($id);
        //database theke data find kora
        $data_show=Teachers::where('id',$id)->first();
        $departments=Departments::all();
        return view('Admin.Teacher.edit',compact('data_show', 'departments'));
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
        $data_show=Teachers::find($id);
        if ($request->hasfile('teacher_picture')) {
           $teacher_picture=$request->file('teacher_picture');
           
           $file_name=time().'.'.$teacher_picture->getClientOriginalExtension();
           //old img file
           $old_file=$data_show->teacher_picture;
           //image_resize_compose_code
           $image_resize = Image::make($teacher_picture->getRealPath());              
           $image_resize->resize(300,300);
           // if (!empty($old_file)) {
           //      $path=("images/student_picture/$old_file");
           //      unlink($path);
           // }
           //image upload na thake emty thakle
           if ($old_file!="") {
               $path=("images/teacher_picture/$old_file");
               unlink($path);
           }
           $image_resize->save('images/teacher_picture/'.$file_name);          
           $data_show->teacher_picture=$file_name;
          //return $file_name;
        }
        $data_show->teacher_name=$request->teacher_name;
        $data_show->teacher_name=$request->teacher_code;
        $data_show->teacher_name=$request->teacher_email;
        $data_show->teacher_name=$request->teacher_mobile;
        $data_show->departments_id=$request->departments_id;
        $data_show->save();
        
        return redirect('/teachers')->with('success','Teachers information upndate successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_show=Teachers::find($id);
        $data_show-> delete();
        //old img file
        $old_file=$data_show->teacher_picture;
        if ($old_file!="") {
               $path=("images/teacher_picture/$old_file");
               unlink($path);
           }
        //return back dile delete hoye oi page thakbe
        return back()->with('success',"Delete this data");
        // redirect je page debo delete hoye se page a jabe
        return redirect('/teachers')->with('success',"Delete this data");
    }
}
