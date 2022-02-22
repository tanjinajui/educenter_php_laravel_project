@extends('layouts.admin.master')
@section('title','Course')
@section('content')

        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Course|<b>University Management</b></h4>
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
                  <div class="panel-title">Course Add</div>
                </div>
                <div class="panel-body">
                	<div class="row">
                		<div class="col-md-3"></div>
                	<div class="col-xs-12 col-md-6 ">
                  <!-- form starts -->
        				  <form action="{{url('/courses')}}" method="POST">
        				    {{csrf_field()}}
        				    <!-- include message page -->
        					   @include('messages.message')
        				    <!-- course_name field -->
        				    <div class="form-group">
        				    	<label for="course_name">Course Name:</label>
        				    	<input type="text" name="course_name" class="form-control" placeholder="course name">
        				    </div>
        				    <!-- teacher_code field -->
        				    <div class="form-group">
        				    	<label for="course_code">Course Code:</label>
        				    	<input type="text" name="course_code" class="form-control" placeholder="course code">
        				    </div>
        				    <!-- course field -->
                    <div class="form-group">
                      <label for="course_credit">Course credit:</label>
                        <input type="text" name="course_credit" class="form-control" id="course_credit" placeholder="Course Credit" >
                    </div>
                   
                    <!-- Department name field -->                               
                    <div class="form-group">
                      <label for="teacher_mobile">Department:</label>
                        <select class="form-control" name="departments_id">
                          <option value="">Please Select Department</option>
                          @foreach($departments as $data_show)
                          <option value="{{$data_show->id}}">{{$data_show->department_name}}</option>
                          @endforeach
                        </select>
                    </div>
                     <!-- Semester name field -->                               
                    <div class="form-group">
                      <label for="semesters_id">Semester:</label>
                        <select class="form-control" name="semesters_id" id="semester">
                          <option value="">Please Select Semester</option>
                          @foreach($semesters as $data_show)
                          <option value="{{$data_show->id}}">{{$data_show->semester_name}}</option>
                          @endforeach
                        </select>
                    </div>
        				    <!-- course_btn field -->
        				    <div class="form-group">
        				    	<input type="submit" value="Add" class="btn btn-primary">
        				    </div> 				    				    
        				  </form>
  					<!-- form ends --> 
  					</div>  
  					</div>                 	                  
                </div>
              </div>
            </div>
            
    </div>
</div>
<!-- END PAGE CONTENT-->
@endsection