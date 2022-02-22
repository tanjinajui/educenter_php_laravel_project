@extends('layouts.admin.master')
@section('title','Course Asign')
@section('content')

        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Course Asign|<b>University Management</b></h4>
                  <div class="small text-muted">Make it Better</div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="pull-xs-right">
                <div class="small text-muted m-b-1">Live Data</div><span data-plugin="peityBar" data-peity="{ &quot;fill&quot;: [&quot;#ccc&quot;], &quot;width&quot;: 50 }">0,3,6,5,2,3,7,3,5,2</span>
              </div>
            </div>
          </div>
        </div>

	<div class="container-fluid">
    	<div class="row panel-wrapper js-grid-wrapper">                                                                          
            <div class="col-xs-12 col-md-12 js-grid js-sizer">
              <div class="panel">
                <div class="panel-heading bg-faded-darken">
                  <div class="panel-title">Course Asign Update</div>
                </div>
                <div class="panel-body">
                	<div class="row">
                		<div class="col-md-3"></div>
                	<div class="col-xs-12 col-md-6 ">
                  <!-- form starts -->
        				   <!-- laravelcollected html form starts -->
                     {!! Form::open(['url' => '/courses_asigns/'.$data_show->id,'method'=>'PATCH', 'class'=>'form-group']) !!}
        				    <!-- include message page -->
        					   @include('messages.message')
                     <!-- Department name field -->                               
                    <div class="form-group">
                      <select class="form-control" name="departments_id" id="department">          
                        @foreach($departments as $data_shows)
                        @if($data_shows->id==$data_show->departments_id)
                        <option value="{{$data_shows->id}}" selected="">{{$data_shows->department_name}}</option>
                        @else
                        <option value="{{$data_shows->id}}">{{$data_shows->department_name}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                    <!-- District_name field -->
                    <div class="form-group"> 
                    <label for="course" >Course:</label>
                      <select name="courses_id" id="course" class="form-control">
                        @foreach($courses as $data_shows)
                        @if($data_shows->id==$data_show->courses_id)
                        <option value="{{$data_shows->id}}" selected="">{{$data_shows->course_name}}</option>
                        @else
                        <option value="{{$data_shows->id}}">{{$data_shows->course_name}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                    <!-- Department name field -->                               
                    <div class="form-group">
                      <label for="teacher">Teacher:</label>
                      <select name="teachers_id" id="teacher" class="form-control">
                        @foreach($teachers as $data_shows)
                        @if($data_shows->id==$data_show->teachers_id)
                        <option value="{{$data_shows->id}}" selected="">{{$data_shows->teacher_name}}</option>
                        @else
                        <option value="{{$data_shows->id}}">{{$data_shows->teacher_name}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
        				    <!-- teacher_code field -->
        				    <div class="form-group">
        				    	<label for="course_code">Course Code:</label>
                      <input type="text" name="course_code" class="form-control" id="course_code" >
        				    	<!-- <select name="course_code" id="course_code" class="form-control">
                        <option value="">Please select a course</option>
                      </select> -->
        				    </div>
        				    <!-- course field -->
                    <div class="form-group">
                      <label for="course_credit">Course credit:</label>
                      <input type="text" name="course_credit" class="form-control" id="course_credit" >
                        <!-- <select name="course_credit" id="course_credit" class="form-control">
                        <option value="">Please select a course</option>
                      </select> -->
                    </div>
                    <!-- Semester name field -->                               
                    <div class="form-group">
                      <label for="semesters_id">Semester:</label>
                        <select class="form-control" name="semesters_id" id="semester">
                        @foreach($semesters as $data_shows)
                        @if($data_shows->id==$data_show->semesters_id)
                        <option value="{{$data_shows->id}}" selected="">{{$data_shows->semester_name}}</option>
                        @else
                        <option value="{{$data_shows->id}}">{{$data_shows->semester_name}}</option>
                        @endif
                        @endforeach
                        </select>
                    </div>
        				    <!-- teacher_btn field -->
        				    <div class="form-group">
        				    	<input type="submit" value="Course Asign update" class="btn btn-primary">
        				    </div> 				    				    
        				  <!-- laravelcollected html form ends -->
                        {!! Form::close() !!}
  					<!-- form ends --> 
  					</div>  
  					</div>                 	                  
                </div>
              </div>
            </div>
            
    </div>
</div>
<!-- END PAGE CONTENT-->
<!-- Ajax/Javascript code add -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            <script type="text/javascript">
                      
        $('#department').on('change',function(e){
          //alert('yes');
            console.log(e);
            var departments_id= e.target.value;
            
            $.get('/jsonCourses?departments_id=' + departments_id,function(data){
                console.log(data);
                $('#course').empty();
                $('#course').append('<option value="" disable="true" selected="true">=== Select Course === </option>');
                $.each(data, function(index, coursesObj){
                    $('#course').append('<option value="'+ coursesObj.id +'">'+ coursesObj.course_name +'</option>');
                });
            });
        });
        $('#department').on('change',function(e){
            console.log(e);
            var departments_id= e.target.value;
            $.get('/jsonTeachers?departments_id=' + departments_id,function(data){
                console.log(data);
                $('#teacher').empty();
                $('#teacher').append('<option value="" disable="true" selected="true">=== Select teacher ===</option>');
                $.each(data, function(index, teachersObj){
                    $('#teacher').append('<option value="'+ teachersObj.id +'">'+ teachersObj.teacher_name +'</option>');
                });
            });
        });
$('#course').on('input',function(e){
console.log(e);
var courses_id= e.target.value;
$.get('/jsonCourseCodes?courses_id=' + courses_id,function(data){
console.log(data);
$.each(data, function(index, coursesObj){
var course_code=(data.course_code);
var course_credit=(data.course_credit);

$('#course_code').val(course_code);
$('#course_credit').val(course_credit);
});
});
});
        
    </script>
@endsection