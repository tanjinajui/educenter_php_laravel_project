@extends('layouts.admin.master')
@section('title','District Create\View')
@section('content')
<!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">District<b>University Management</b></h4>
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
            <div class="col-xs-12 col-md-3 js-grid js-sizer">
              <div class="panel">
                <div class="panel-heading bg-faded-darken">
                  <div class="panel-title">District Add</div>
                </div>
                <div class="panel-body">
                 <!-- form starts -->
                  <form action="/districts" method="POST">
                    {{csrf_field()}}
                    <!-- include message page -->
                     @include('messages.message')
                    <!-- Department name field -->                               
                    <div class="form-group">
                      <label for="division_name">Division:</label>
                        <select class="form-control" name="divisions_id">
                          <option value="">Please Select Division</option>
                          @foreach($divisions as $data_show)
                          <option value="{{$data_show->id}}">{{$data_show->division_name}}</option>
                          @endforeach
                        </select>
                      </div>
                     <!-- District_name field -->
                    <div class="form-group">                                      
                      <input type="text" name="district_name" class="form-control" id="district_name" placeholder="District Name">
                    </div>                                       
              
                    <!-- teacher_btn field -->
                    <div class="form-group">
                      <input type="submit" name="create_district" class="btn btn-primary btn-user btn-block mt-5" value="District Add">
                    </div>                        
                  </form>
            <!-- form ends -->                                       
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-8 js-grid">
              <div class="panel">
                <div class="panel-heading bg-faded-darken">
                  <div class="panel-title">All District View</div>
                </div>
                <div class="panel-body">
                  <!-- database table data show starts -->
                      <table class="table table-bordered  table-hover">
                      <thead class="thead-dark thead-light">
                        <tr>
                          <th scope="col">SL.</th>
                            <th scope="col">Division Name</th>                           
                            <th scope="col">District Name</th>                           
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                      </thead>
                        <?php //paginate
                        $i= $districts->perPage()*($districts->currentPage()-1); ?>
                        <!-- foreach loops database er data show -->
                        @foreach($districts as $key=>$data_show)
                        <tbody>
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$data_show->divisions->division_name}}</td>                          
                            <td>{{$data_show->district_name}}</td>                           
                            <td><a href="/districts/{{$data_show->id}}/edit" class="btn btn-success">Edit</a></td>
                            <td>{!! Form::open(['url' => '/districts/'.$data_show->id,'method'=>'Delete']) !!}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            {!! Form::close() !!}</td>
                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                        <!-- database table show ends -->
                        {{$districts->links()}}                   
                </div>
              </div>
            </div>
    </div>
</div>
<!-- END PAGE CONTENT-->
        
@endsection