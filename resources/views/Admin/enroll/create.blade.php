@extends('layouts.admin.master')
@section('title','Enroll A New Course')
@section('content')

        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Course inroll|<b>University Management</b></h4>
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
                  <div class="panel-title">Enroll A New Course</div>
                </div>
               
            <div class="panel-body">
              <div class="row">
                 <!-- search field -->
                <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                      <input type="text" class=" student_id" id="student_id" placeholder="Search with Student Id" name="student_id" style="padding: 10px;" >
                      <button class="input-group-text" id="basic-addon1" class="search" style="padding: 10px;"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
              </div>
              <div class="row">  
                           		
                  <!-- form starts -->
        				  <form action="{{url('/enrollcourses')}}" method="POST" >
        				    {{csrf_field()}}
        				    <!-- include message page -->
        					   @include('messages.message')
                  <div class="col-xs-12 col-md-6">
          				   
                    <!-- <div class="card-body">
                      <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1" class="search"><i class="fa fa-search"></i></span>
                          </div>
                          <input type="text" class="form-control student_id" id="student_id" placeholder="Search with Student Id" aria-label="Search with Student Id" aria-describedby="basic-addon1" name="student_id">
                        </div>
                      </div> -->
                     <!-- student_first_name field -->
                    <div class="form-group">
                      <label for="student_first_name" >Student First Name:</label>
                        <input type="text" name="student_first_name" class="form-control" id="student_first_name" placeholder="First Name">
                    </div> 
                    <!-- student_last_name field -->
                    <div class="form-group">
                      <label for="student_last_name" >Student Last Name:</label>
                        <input type="text" name="student_last_name" class="form-control" id="student_last_name" placeholder="Last Name">
                    </div>
                    <!-- student_email field -->
                    <div class="form-group">
                      <label for="student_email" >Student Email:<span style="color:red">*</span></label>
                        <input type="email" name="student_email" class="form-control" id="student_email" placeholder="Student Email" >
                    </div>
                   <!-- Department name field -->                               
                    <div class="form-group">
                      <label for="department_name">Department:</label>
                      <input type="text" id="department_name" class="form-control" name ="department_name">
                    </div> 
                  </div>
                    <div class="col-xs-12 col-md-6">
                     <!-- teacher name field -->                               
                    <div class="form-group">
                      <label for="teacher_id">Teacher:</label>
                      <select name="teachers_id" id="teacher" class="form-control">
                        <option value="">Please select a teacher</option>
                      </select>
                    </div>
                    <!-- District_name field -->
                    <div class="form-group"> 
                    <label for="course" >Course:</label>
                      <select name="courses_id" id="course" class="form-control">
                        <option value="">Please select a course</option>
                      </select>
                    </div>
                    <!-- course_code field -->
                    <div class="form-group">
                      <label for="course_code">Course Code:</label>
                      <input type="text" name="course_code" class="form-control" id="course_code" >
                    </div>
                    <!-- course field -->
                    <div class="form-group">
                      <label for="course_credit">Course credit:</label>
                      <input type="text" name="course_credit" class="form-control" id="course_credit" >
                    </div>
                     <!-- teacher_btn field -->
                      <div class="form-group">
                        <input type="submit" value="course enroll" class="btn btn-primary">
                      </div>  
  					    </div> <!-- col-6-end -->
                </form>
                  <!-- form ends -->
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
        $('#student_id').on('input',function(e){
            console.log(e);
            var student_id = e.target.value;
            
            $('#student_first_name').empty();
            $('#student_last_name').empty();
            $('#student_email').empty();
            $.get('/jsonCourseEnroll?student_id=' + student_id,function(data){
            console.log(data);
            $.each(data, function(index, studentsObj){
            var id=(data.id);
            var student_first_name =(data.student_first_name);
            var student_last_name =(data.student_last_name);
            var student_email = (data.student_email);
            var departments_id = (data.departments_id);
            var department_name = (data.department_name);
            $('#student_first_name').val(student_first_name);
            $('#student_last_name').val(student_last_name);
            $('#student_email').val(student_email);
            $('#departments_id').val(departments_id);
            $('#department_name').val(department_name); 
            $('#course').append('<option value="0" disable="true" selected="true">=== Select course === </option>');
            });
            });
        });

        $('#student_id').on('input',function(e){
            console.log(e);
            var student_id = e.target.value;
            $.get('/jsonSelectCourseEnroll?student_id=' + student_id,function(data){
            console.log(data);
            $.each(data, function(index, coursesObj){
            var id=(data.id);
            var course_name = (data.course_name);
            });
            $('#course').empty();
                $('#course').append('<option value="0" disable="true" selected="true">=== Select course === </option>');

                $.each(data, function(index, coursesObj){
                    $('#course').append('<option value="'+ coursesObj.id +'">'+ coursesObj.course_name +'</option>');
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
        // Select course Teacher 
        $('#course').on('change',function(e){
            console.log(e);
            var courses_id = e.target.value;
            $.get('/json-select_std_teacher?courses_id=' + courses_id,function(data){
            console.log(data);
            $('#teacher_id').empty();
                $('#teacher_id').append('<option value="0" disable="true" selected="true">=== Select teacher === </option>');

                $.each(data, function(index, coursesObj){
                    $('#teacher_id').append('<option value="'+ coursesObj.id +'">'+ coursesObj.teacher_name +'</option>');
            });

            });
        });
        // $('#teacher_id').on('change',function(e){
        //     console.log(e);
        //     var teachers_id = e.target.value;
        //     $.get('/json-select_teacher?teachers_id=' + teachers_id,function(data){
        //     console.log(data);
            
        //     $.each(data, function(index, districtsObj){
        //     var id=(data.id);
        //     var t_credit=(data.t_credit);

        //     $('#t_credit').val(t_credit);
            
        //     });

        //     });
        // });
       
        
</script>
@endsection