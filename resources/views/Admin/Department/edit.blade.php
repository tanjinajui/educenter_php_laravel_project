@extends('layouts.admin.master')
@section('title','Department')
@section('content')

        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Department<b>University Management</b></h4>
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
            <div class="col-xs-12 col-md-6 offset-md-3 js-grid js-sizer">
              <div class="panel">
                <div class="panel-heading bg-faded-darken">
                  <div class="panel-title">Department Edit</div>
                </div>
                <div class="panel-body">
                	<!-- include message page -->
					@include('messages.message')
                  <!-- form starts -->
				  <!-- laravelcollected html form starts -->
    				{!! Form::open(['url' => '/departments/'.$data_show->id,'method'=>'PATCH']) !!}
				    <!-- department_name field -->
				    <div class="form-group">
				    	<label for="department_name">Department Name:</label>
				    	<input type="text" name="department_name" class="form-control" placeholder="Department name" value="{{$data_show->department_name}}">
				    </div>
				    <!-- department_code field -->
				    <div class="form-group">
				    	<label for="department_code">Department Code:</label>
				    	<input type="text" name="department_code" class="form-control" placeholder="Department code" value="{{$data_show->department_code}}">
				    </div>
            <!-- short_name field -->
            <div class="form-group">
              <label for="short_name">Short name:</label>
              <input type="text" name="short_name" class="form-control" placeholder="Short name" value="{{$data_show->short_name}}">
            </div>
				    <!-- department_btn field -->
				    <div class="form-group">
				    	<input type="submit" value="Update Department" class="btn btn-primary">
				    </div> 				    				    
				    <!-- laravelcollected html form ends -->
     				{!! Form::close() !!}               	                  
                </div>
              </div>
            </div>
            
    </div>
</div>
<!-- END PAGE CONTENT-->
@endsection