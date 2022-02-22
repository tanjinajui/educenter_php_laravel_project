@extends('layouts.admin.master')
@section('title','Teacher Create')
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
                  <div class="panel-title">Teacher Add</div>
                </div>
                <div class="panel-body">
                	<div class="row">
                		<div class="col-md-3"></div>
                	<div class="col-xs-12 col-md-6 ">
                  <!-- form starts -->
        				  <form action="{{url('/teachers')}}" method="POST" enctype="multipart/form-data">
        				    {{csrf_field()}}
        				    <!-- include message page -->
        					   @include('messages.message')
        				    <!-- teacher_name field -->
        				    <div class="form-group">
        				    	<label for="teacher_name">Teacher Name:</label>
        				    	<input type="text" name="teacher_name" class="form-control" placeholder="Teacher name">
        				    </div>
        				    <!-- teacher_code field -->
        				    <div class="form-group">
        				    	<label for="teacher_code">Teacher Code:</label>
        				    	<input type="text" name="teacher_code" class="form-control" placeholder="Teacher code">
        				    </div>
                    <!-- teacher_code field -->
                    <div class="form-group">
                      <label for="taken_credit">Maximum Credit:</label>
                       <input type="number" id="taken_credit" class="form-control" placeholder="Maximum Credit" name="max_credit">
                    </div>
        				    <!-- teacher_email field -->
                    <div class="form-group">
                      <label for="teacher_email">Teacher Email:</label>
                        <input type="email" name="teacher_email" class="form-control" id="teacher_email" placeholder="Teacher Email" >
                    </div>
                    <!-- teacher_mobile field -->
                    <div class="form-group">
                      <label for="teacher_mobile">Teacher Mobile:</label>
                        <input type="text" name="teacher_mobile" class="form-control" placeholder="Teacher Mobile">
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
                     <!-- student_picture field -->
                    <div class="form-group">
                      <label for="teacher_picture">Teacher Picture:</label>
                        <input type="file" name="teacher_picture" class="form-control-file" id="teacher_picture">
                    </div>  
        				    <!-- teacher_btn field -->
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