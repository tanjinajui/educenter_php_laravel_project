@extends('layouts.admin.master')
@section('title','Teacher Update')
@section('content')

        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Teacher|<b>University Management</b></h4>
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
                  <div class="panel-title">Update Teacher Information</div>
                </div>
                <div class="panel-body">
                	<div class="row">
                		<div class="col-md-3"></div>
                	<div class="col-xs-12 col-md-6 ">
                  <!-- form starts -->        				 
                    <!-- laravelcollected html form starts -->
                    {!! Form::open(['url' => '/teachers/'.$data_show->id,'method'=>'PATCH', 'class'=>'form-group','enctype'=>'multipart/form-data']) !!}
        				    <!-- include message page -->
        					   @include('messages.message')
        				    <!-- teacher_name field -->
        				    <div class="form-group">
        				    	<label for="teacher_name">Teacher Name:</label>
        				    	<input type="text" name="teacher_name" class="form-control" placeholder="Teacher name" value="{{$data_show->teacher_name}}" readonly="">
        				    </div>
        				    <!-- teacher_code field -->
        				    <div class="form-group">
        				    	<label for="teacher_code">Teacher Code:</label>
        				    	<input type="text" name="teacher_code" class="form-control" placeholder="Teacher code" value="{{$data_show->teacher_code}}" readonly="">
        				    </div>
        				    <!-- teacher_email field -->
                    <div class="form-group">
                      <label for="teacher_email">Teacher Email:</label>
                        <input type="email" name="teacher_email" class="form-control" id="teacher_email" placeholder="Teacher Email" value="{{$data_show->teacher_email}}">
                    </div>
                    <!-- teacher_mobile field -->
                    <div class="form-group">
                      <label for="teacher_mobile">Teacher Mobile:</label>
                        <input type="text" name="teacher_mobile" class="form-control" placeholder="Teacher Mobile" value="{{$data_show->teacher_mobile}}">
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
                     <!-- student_picture field -->
                    <div class="form-group">
                      <label for="teacher_picture">Teacher Picture:</label>
                        <input type="file" name="teacher_picture" class="form-control-file" id="teacher_picture">
                        <img src="{{asset('images/teacher_picture/'.$data_show->teacher_picture)}}" alt="teacher_picture" height="100" >
                    </div>  
        				    <!-- teacher_btn field -->
        				    <div class="form-group">
        				    	<input type="submit" value="Update teachers" class="btn btn-primary">
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