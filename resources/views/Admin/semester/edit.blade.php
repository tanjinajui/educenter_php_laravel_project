@extends('layouts.admin.master')
@section('title','Semester Update')
@section('content')

        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Semester|<b>University Management</b></h4>
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
                  <div class="panel-title">Semester Update</div>
                </div>
                <div class="panel-body">
                	<div class="row">
                		<div class="col-md-3"></div>
                	<div class="col-xs-12 col-md-6 ">
                  <!-- form starts -->                 
                    <!-- laravelcollected html form starts -->
                    {!! Form::open(['url' => '/semesters/'.$data_show->id,'method'=>'PATCH', 'class'=>'form-group']) !!}
                    <!-- include message page -->
                     @include('messages.message')
        				    <!-- Semester_name field -->
                    <div class="form-group">                                      
                      <input type="text" name="semester_name" class="form-control" id="semester_name" placeholder="Semester Name" value="{{$data_show->semester_name}}">
                    </div>                                       
              
                    <!-- teacher_btn field -->
                    <div class="form-group">
                      <input type="submit" name="update_semester" class="btn btn-primary btn-user btn-block mt-5" value="Semester Update">
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