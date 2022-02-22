@extends('layouts.admin.master')
@section('title','Upozila Update')
@section('content')

        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Upozila|<b>University Management</b></h4>
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
                  <div class="panel-title">Upozila Update</div>
                </div>
                <div class="panel-body">
                	<div class="row">
                		<div class="col-md-3"></div>
                	<div class="col-xs-12 col-md-6 ">
                  <!-- form starts -->                 
                    <!-- laravelcollected html form starts -->
                    {!! Form::open(['url' => '/upozilas/'.$data_show->id,'method'=>'PATCH', 'class'=>'form-group']) !!}
                    <!-- include message page -->
                     @include('messages.message')
        				    <!-- Division name field -->                               
                    <div class="form-group">
                      <label for="division_name">Division:</label>
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
                    <label for="district_name">District:</label>                                     
                      <select name="districts_id" id="district" class="form-control">
                      
                      @foreach($districts as $data_shows)
                        @if($data_shows->id==$data_show->districts_id)                                      
                        <option value="{{$data_shows->id}}" selected="">{{$data_shows->district_name}}</option>
                        @else
                        <option value="{{$data_shows->id}}">{{$data_shows->district_name}}</option>
                        @endif
                        @endforeach
                    </select>
                    </div> 
                    <!-- Upozila_name field -->
                    <div class="form-group">   
                    <label for="upozila_name">Upozila:</label>                                   
                      <input type="text" name="upozila_name" class="form-control" id="upozila" placeholder="Upozila Name" value="{{$data_show->upozila_name}}">
                    </div>     
                                                         
              
                    <!-- teacher_btn field -->
                    <div class="form-group">
                      <input type="submit" name="create_district" class="btn btn-primary btn-user btn-block mt-5" value="Upozila Update">
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
<!-- Ajax/Javascript code add -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript">                            
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