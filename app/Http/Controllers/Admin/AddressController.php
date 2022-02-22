<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Divisions;
use App\Districts;
use App\Upozilas;
use App\Departments;
use App\Courses;
use App\Teachers;
use App\Courses_asigns;
use App\Semesters;
use App\Students;
class AddressController extends Controller
{
  //Authentication use Register chara login er jonno
    public function __construct()
{
    $this->middleware('admin');
}
    public function viewDistrict(Request $request)
    {
        $divisions_id=$request->input('divisions_id');
        $district=Districts::where('divisions_id','=', $divisions_id)->get();
        return response()->json($district);
    }
    public function viewUpozila(Request $request)
    {
        $districts_id=$request->input('districts_id');
        $upozila=Upozilas::where('districts_id','=', $districts_id)->get();
        return response()->json($upozila);
    }
    public function viewCourse(Request $request)
    {
        $departments_id=$request->Input('departments_id');
        $course=Courses::where('departments_id','=', $departments_id)->get();
        return response()->json($course);
    }
     public function viewSemesterCourse(Request $request)
    {
        $semesters_id=$request->Input('semesters_id');
        $course=Courses::where('semesters_id','=', $semesters_id)->get();
        return response()->json($course);
    }
    public function viewTeacher(Request $request)
    {
        $departments_id=$request->input('departments_id');
        $teacher=Teachers::where('departments_id','=', $departments_id)->get();
        return response()->json($teacher);
    }
    public function viewCourseTeacher(Request $request)
    {
        $teachers_id=$request->input('teachers_id');
        $course_asign=Courses_asigns::where('teachers_id','=', $teachers_id)->get();
        return response()->json($course_asign);
    }
     public function viewSemester(Request $request)
    {
        $teachers_id=$request->input('teachers_id');
        $semester=Courses_asigns::where('teachers_id','=', $teachers_id)->get();
        return response()->json($semester);
    }
    public function viewCourseCode(Request $request)
    {
        $courses_id=$request->input('courses_id');
        $viewCourseCode=Courses::where('id','=', $courses_id)->first();
        return response()->json($viewCourseCode);
    }
    public function maxTeacherCredit(Request $request){
      $teachers_id = $request->Input('teachers_id');
      $teacher = Teachers::where('id','=', $teachers_id)->first();
      return response()->json($teacher);
    }
    public function courseEnroll(Request $request){
      $student_id = $request->Input('student_id');
      $enrol = Students::join('departments','students.departments_id','=','departments.id')
      ->select('students.*','departments.department_name')->where('student_id', '=', $student_id)->first();
      return response()->json($enrol);
    }
    public function stdCourses(Request $request){
      $students_id = $request->Input('student_id');
      $find_dpt = Students::where('student_id', '=', $students_id)->first()->departments_id;
      $course = Courses::where('departments_id','=', $find_dpt)->get();
      return response()->json($course);
    }
   // public function courseEnrollTeacher(Request $request){
   //    $course = $request->Input('courses_id');
   //    $teacher_id = Courses::where('course', '=', $courses_id)->first()->departments_id;
   //    $teacher = Teachers::where('departments_id','=', $teacher_id)->get();
   //    return response()->json($teacher);
   //  }

    public function stdTeacher(Request $request){
      $courses_id = $request->Input('courses_id');
      $teacher_id = Courses::where('id', '=', $courses_id)->first()->departments_id;
      $teacher = Teachers::where('departments_id','=', $teacher_id)->get();
      return response()->json($teacher);
    }
}
