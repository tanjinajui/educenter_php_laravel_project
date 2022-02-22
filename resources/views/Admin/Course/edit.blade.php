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
                  <div class="panel-title">Course Update</div>
                </div>
                <div class="panel-body">
                	<div class="row">
                		<div class="col-md-3"></div>
                	<div class="col-xs-12 col-md-6 ">
                  <!-- form starts -->                 
                    <!-- laravelcollected html form starts -->
                    {!! Form::open(['url' => '/courses/'.$data_show->id,'method'=>'PATCH', 'class'=>'form-group','enctype'=>'multipart/form-data']) !!}
                    <!-- include message page -->
                     @include('messages.message')
        				    <!-- course_name field -->
        				    <div class="form-group">
        				    	<label for="course_name">Course Name:</label>
        				    	<input type="text" name="course_name" class="form-control" placeholder="course name" value="{{$data_show->course_name}}">
        				    </div>
        				    <!-- teacher_code field -->
        				    <div class="form-group">
        				    	<label for="course_code">Course Code:</label>
        				    	<input type="text" name="course_code" class="form-control" placeholder="course code" value="{{$data_show->course_code}}">
        				    </div>
        				    <!-- course field -->
                    <div class="form-group">
                      <label for="course_credit">Course credit:</label>
                        <input type="text" name="course_credit" class="form-control" id="course_credit" placeholder="Course Credit" value="{{$data_show->course_credit}}">
                    </div>
                    <!-- Department name field -->                               
                    <div class="form-group">
                      <select class="form-control" name="departments_id">                                      
                        @foreach($departments as $data_shows)
                        @if($data_shows->id==$data_show->departments_id)                                      
                        <option value="{{$data_shows->id}}" selected="">{{$data_shows->department_name}}</option>
                        @else
                        <option value="{{$data_shows->id}}">{{$data_shows->department_name}}</option>
                        @endif
                        @endforeach
                      </select>
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
        				    	<input type="submit" value="Course Update" class="btn btn-primary">
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
@endsection