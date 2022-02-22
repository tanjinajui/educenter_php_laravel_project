@extends('layouts.admin.master')
@section('title','Student View')
@section('content')

        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Student|<b>University Management</b></h4>
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
                  <div class="panel-title">All Students View</div>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <!-- include message page -->
                    @include('messages.message')
                    <!-- <div class="col-md-2"></div> -->
                  <div class="col-xs-12  ">
                     <!-- database table data show starts -->
                      <table class="table table-bordered  table-hover">
                      <thead class="thead-dark thead-light">
                        <tr>
                          <th scope="col">SL.</th>
                            <th scope="col">Student First Name</th>
                            <th scope="col">Student Last Name</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">Department</th>
                            <th scope="col">Course</th>
                            <th scope="col">Division</th>                         
                            <th scope="col">District</th>                         
                            <th scope="col">Student Email</th>
                            <th scope="col">Student Mobile</th>
                            <th scope="col">Student Picture</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                      </thead>
                        <?php //paginate
                        $i= $students->perPage()*($students->currentPage()-1); ?>
                        <!-- foreach loops database er data show -->
                        @foreach($students as $key=>$data_show)
                        <tbody>
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$data_show->student_first_name}}</td>
                            <td>{{$data_show->student_last_name}}</td>
                            <td>{{$data_show->student_id}}</td>
                            <td>{{$data_show->departments->department_name}}</td>
                            <td>{{$data_show->courses->course_name}}</td>
                            <td>{{$data_show->divisions->division_name}}</td>          
                            <td>{{$data_show->districts->district_name}}</td>       
                            <td>{{$data_show->student_email}}</td>
                            <td>{{$data_show->student_mobile}}</td>
                            <td><img src="{{url('images/student_picture/'.$data_show->student_picture)}}" width="100"></td>
                            <td><a href="{{url('students/'.$data_show->id.'/edit')}}" class="btn btn-success">Edit</a></td>
                            <td>{!! Form::open(['url' => '/students/'.$data_show->id,'method'=>'Delete']) !!}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            {!! Form::close() !!}</td>
                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                        <!-- database table show ends -->
                        {{$students->links()}}       
                  </div>  
                  </div> 
                  <a href="{{url('/students/create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i>Student Add</a>                                   
                </div>
              </div>
            </div>
            
    </div>
</div>
<!-- END PAGE CONTENT-->
@endsection