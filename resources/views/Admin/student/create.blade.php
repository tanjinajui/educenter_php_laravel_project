@extends('layouts.admin.master')
@section('title','Student Information Create')
@section('content')

        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Student|<b>University Management</b></h4>
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
                  <div class="panel-title">Student Add</div>
                </div>
            <div class="panel-body">
              <div class="row">                		
                
                  <!-- form starts -->
        				  <form action="{{url('/students')}}" method="POST" enctype="multipart/form-data">
        				    {{csrf_field()}}
        				    <!-- include message page -->
        					   @include('messages.message')
                  <div class="col-xs-12 col-md-6 ">
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
                    <!-- username field -->
                    <div class="form-group">
                      <label for="username">Username:</label>
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username">
                    </div>
                    <!-- password field -->
                    <div class="form-group">
                      <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div> 
                   <!-- Department name field -->                               
                    <div class="form-group">
                      <label for="teacher_mobile">Department:</label>
                        <select class="form-control" name="departments_id" id="department">
                          <option value="">Please Select Department</option>
                          @foreach($departments as $data_show)
                          <option value="{{$data_show->id}}">{{$data_show->department_name}}</option>
                          @endforeach
                        </select>
                    </div> 
                    <!-- District_name field -->
                    <div class="form-group"> 
                    <label for="course" >Course:</label>
                      <select name="courses_id" id="course" class="form-control">
                        <option value="">Please select a course</option>
                      </select>
                    </div>
                     <!-- Semester name field -->                               
                    <div class="form-group">
                      <label for="semesters_id">Semester:</label>
                        <select class="form-control" name="semesters_id" id="semester">
                         <!--  <option value="">Please Select Semester</option> -->
                          @foreach($semesters->take(1) as $data_show)
                          <option value="{{$data_show->id}}">{{$data_show->semester_name}}</option>
                          @endforeach
                        </select>
                    </div>
  					    </div> <!-- col-6-end -->
                <div class="col-xs-12 col-md-6">
                   <!-- Division name field -->                               
                    <div class="form-group">
                      <label for="division_name">Division:</label>
                        <select class="form-control" name="divisions_id" id="division">
                          <option value="">Please Select Division</option>
                          @foreach($divisions as $data_show)
                          <option value="{{$data_show->id}}">{{$data_show->division_name}}</option>
                          @endforeach
                        </select>
                      </div> 
                    <!-- District_name field -->
                    <div class="form-group"> 
                    <label for="district_name">District:</label>                    
                      <select name="districts_id" id="district" class="form-control">
                        <option value="">Please select a district</option>
                      </select>
                    </div> 
                    <!-- Upozila_name field -->
                    <div class="form-group"> 
                    <label for="upozila_name">Upozila:</label>               
                      <select name="upozilas_id" id="upozila" class="form-control">
                      <option value="">Please select a upozila</option>
                    </select>
                    </div> 
                    <!-- village_name field -->
                    <div class="form-group">
                    <label for="village_name">Village:</label>          
                      <input type="text" name="village_name" class="form-control" id="village" placeholder="Village Name">
                    </div>        
                   <!-- student_email field -->
                    <div class="form-group">
                      <label for="student_email" >Student Email:<span style="color:red">*</span></label>
                        <input type="email" name="student_email" class="form-control" id="student_email" placeholder="Student Email" >
                    </div>
                    <!-- student_mobile field -->
                    <div class="form-group">
                      <label for="student_mobile" >Student Mobile:<span style="color:red">*</span></label>
                        <input type="text" name="student_mobile" class="form-control" placeholder="Student Mobile">
                    </div>                  
                       <!-- student_picture field -->
                      <div class="form-group">
                        <label for="student_picture">Student Picture:</label>
                          <input type="file" name="student_picture" class="form-control-file" id="student_picture">
                      </div>  
                      <!-- teacher_btn field -->
                      <div class="form-group">
                        <input type="submit" value="Student Add" class="btn btn-primary">
                      </div>      
                </div>
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
        $('#division').on('change',function(e){
          //alert('yes');
            console.log(e);
            var divisions_id= e.target.value;
            
            $.get('/jsonDistricts?divisions_id=' + divisions_id,function(data){
                console.log(data);
                $('#district').empty();
                $('#district').append('<option value="" disable="true" selected="true">=== Select District === </option>');
                $.each(data, function(index, districtObj){
                    $('#district').append('<option value="'+ districtObj.id +'">'+ districtObj.district_name +'</option>');
                });
            });
        });
        $('#district').on('change',function(e){
            console.log(e);
            //alert('yes');
            var districts_id= e.target.value;

            $.get('/jsonUpozilas?districts_id=' + districts_id,function(data){
                console.log(data);

                $('#upozila').empty();
                $('#upozila').append('<option value="" disable="true" selected="true">=== Select upozila ===</option>');

                $.each(data, function(index, districtsObj){
                    $('#upozila').append('<option value="'+ districtsObj.id +'">'+ districtsObj.upozila_name +'</option>');
                });

            });
        });
        
    </script>
@endsection