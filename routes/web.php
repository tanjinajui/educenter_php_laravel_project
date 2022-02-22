<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','Frontend\FrontendController@index');
// Route::get('/','Admin\AdminController@dashboard');
//RegistrationController
Route::get('/signUp','RegistrationController@create');
Route::post('/signUp','RegistrationController@store');
//LoginController
Route::get('/loginUser','LoginController@create');
Route::post('/loginUser','LoginController@login');
Route::get('/logout','LoginController@logout');

Route::get('/blogadmin','Admin\AdminController@dashboard');
//Department Controller
 Route::resource('/departments','Admin\DepartmentController');
 //Teacher Controller
 Route::resource('/teachers','Admin\TeacherController');
 Route::get('/search','Admin\TeacherController@index');
//Course Controller
 Route::resource('/courses','Admin\CourseController');
 //Semester Controller
 Route::resource('/semesters','Admin\SemesterController');
 //Divisions Controller
 Route::resource('/divisions','Admin\DivisionController');
 //district Controller
 Route::resource('/districts','Admin\DistrictController');
 //district Controller
 Route::resource('/upozilas','Admin\UpozilaController');
 //student Controller
 Route::resource('/students','Admin\StudentController');
 //course_asign Controller
 Route::resource('/courses_asigns','Admin\CourseAsignController');
 //course_asign Controller
 Route::resource('/course_asign_multiples','Admin\CourseAsignMultipleController');
 //course_asign Controller
 Route::resource('/enrollcourses','Admin\courseEnrollController');
 //course_asign Controller
 Route::resource('/courses_asigns_teacher','Admin\CourseAsignTeacherController');
 //month Controller
 Route::resource('/month','Admin\MonthController');
 //year Controller
 Route::resource('/year','Admin\YearController');
 //shift Controller
 Route::resource('/shifts','Admin\ShiftController');
 //fee_categories Controller
 Route::resource('/fee_categories','Admin\FeeCategoryController');
 //fee_categories Controller
 Route::resource('/fee_categories_amounts','Admin\FeeCategoryAmountController');
 Route::get('/fee_categories_amounts/{id}/details','Admin\FeeCategoryAmountController@show');
 //shift Controller
 Route::resource('/exams','Admin\ExamController');
 //jsondistrict Controller
 Route::get('/jsonDistricts','Admin\AddressController@viewDistrict');
 Route::get('/jsonUpozilas','Admin\AddressController@viewUpozila');
 Route::get('/jsonCourses','Admin\AddressController@viewCourse');
 Route::get('/jsonSemestersCourses','Admin\AddressController@viewSemesterCourse');
 Route::get('/jsonTeachers','Admin\AddressController@viewTeacher');
 Route::get('/jsonCourseCodes','Admin\AddressController@viewCourseCode');
 Route::get('/jsonCourseTeachers','Admin\AddressController@viewCourseTeacher');
 Route::get('/jsonSemesters','Admin\AddressController@viewSemester');
 Route::get('/jsonMaxteacherCredit','Admin\AddressController@maxTeacherCredit');
 Route::get('/jsonCourseEnroll','Admin\AddressController@courseEnroll');
 Route::get('/jsonSelectCourseEnroll','Admin\AddressController@stdCourses');
 Route::get('/json-select_std_teacher','AddressController@stdTeacher');
	


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
