@extends('layouts.admin.master')
@section('title','District Update')
@section('content')

        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">District|<b>University Management</b></h4>
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
                  <div class="panel-title">District Update</div>
                </div>
                <div class="panel-body">
                	<div class="row">
                		<div class="col-md-3"></div>
                	<div class="col-xs-12 col-md-6 ">
                  <!-- form starts -->                 
                    <!-- laravelcollected html form starts -->
                    {!! Form::open(['url' => '/districts/'.$data_show->id,'method'=>'PATCH', 'class'=>'form-group']) !!}
                    <!-- include message page -->
                     @include('messages.message')
        				    <!-- Department name field -->                               
                    <div class="form-group">
                      <select class="form-control" name="divisions_id" id="division">                                      
                        @foreach($divisions as $data_shows)
                        @if($data_shows->id==$data_show->divisions_id)                                      
                        <option value="{{$data_shows->id}}" selected="">{{$data_shows->division_name}}</option>
                        @else
                        <option value="{{$data_shows->id}}">{{$data_shows->division_name}}</option>
                        @endif
                        @endforeach
                      </select>
                    </div>
                      
                     <!-- District_name field -->
                    <div class="form-group">                                      
                      <input type="text" name="district_name" class="form-control" id="district_name" placeholder="District Name" value="{{$data_show->district_name}}">
                    </div>                                       
              
                    <!-- teacher_btn field -->
                    <div class="form-group">
                      <input type="submit" name="create_district" class="btn btn-primary btn-user btn-block mt-5" value="District Add">
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