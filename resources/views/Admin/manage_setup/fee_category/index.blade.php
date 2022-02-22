@extends('layouts.admin.master')
@section('title','Fee Category')
@section('content')

        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Fee Category|<b>University Management</b></h4>
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
            <div class="col-xs-12 col-md-4 js-grid js-sizer">
              <div class="panel">
                <div class="panel-heading bg-faded-darken">
                  <div class="panel-title">Fee Category Add</div>
                </div>
                <div class="panel-body">
                  <!-- form starts -->
				  <form action="{{url('/fee_categories')}}" method="POST">
				    {{csrf_field()}}
				    <!-- include message page -->
					@include('messages.message')
				    <!-- department_name field -->
				    <div class="form-group">
				    	<label for="fee_categories_name">Fee Category:</label>
				    	<input type="text" name="fee_categories_name" class="form-control" placeholder="Fee Category name">
				    </div>
				    
				    <!-- department_btn field -->
				    <div class="form-group">
				    	<input type="submit" value="Add" class="btn btn-primary">
				    </div> 
				    
				  </form>
  					<!-- form ends -->                    	                  
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-8 js-grid">
              <div class="panel">
                <div class="panel-heading bg-faded-darken">
                  <div class="panel-title">All Fee Category View</div>
                </div>
                <div class="panel-body">
		              <!-- database table data show starts -->
					  <table class="table table-bordered  table-hover">
					  <thead class="thead-dark thead-light">
					    <tr>
					      <th scope="col">SL.</th>
      					  <th scope="col">Fee Category</th>
      					  <th scope="col">Edit</th>
      					  <th scope="col">Delete</th>
					    </tr>
						</thead>
						  <?php //paginate
						  $i= $fee_categories->perPage()*($fee_categories->currentPage()-1); ?>
						  <!-- foreach loops database er data show -->
						  @foreach($fee_categories as $key=>$data_show)
						  <tbody>
						    <tr>
						      <td>{{++$i}}</td>
						      <td>{{$data_show->fee_categories_name}}</td>
						      
						      <td><a href="{{url('fee_categories/'.$data_show->id.'/edit')}}" class="btn btn-success"><i class="fa fa-edit"></i></a></td>
						      <td>{!! Form::open(['url' => '/fee_categories/'.$data_show->id,'method'=>'Delete']) !!}
						      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
						      {!! Form::close() !!}</td>
						    </tr>
						  </tbody>
						  @endforeach
						</table>
						  <!-- database table show ends -->
						  {{$fee_categories->links()}}                 
                </div>
              </div>
            </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
@endsection