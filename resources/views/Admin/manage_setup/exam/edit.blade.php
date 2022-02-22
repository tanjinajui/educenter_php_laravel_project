@extends('layouts.admin.master')
@section('title','Exam')
@section('content')

        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Exam<b>University Management</b></h4>
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
                  <div class="panel-title">Exam Edit</div>
                </div>
                <div class="panel-body">
                	<!-- include message page -->
					@include('messages.message')
                  <!-- form starts -->
				  <!-- laravelcollected html form starts -->
    				{!! Form::open(['url' => '/exams/'.$data_show->id,'method'=>'PATCH']) !!}
				    <!-- year_name field -->
				    <div class="form-group">
				    	<label for="exam_name">Exam Name:</label>
				    	<input type="text" name="exam_name" class="form-control" placeholder="Exam name" value="{{$data_show->exam_name}}">
				    </div>
				    
				    <!-- department_btn field -->
				    <div class="form-group">
				    	<input type="submit" value="Update Exam" class="btn btn-primary">
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