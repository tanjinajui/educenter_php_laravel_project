@extends('layouts.admin.master')
@section('title','Fee Category Amount')
@section('content')

        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Fee Category Amount|<b>University Management</b></h4>
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
                  <div class="panel-title">Fee Category Amount Add</div>
                </div>
                <div class="panel-body">
                  <div class="row">
                 <!-- search field -->
                <div class="col-xs-12 col-md-4">
                    <div class="form-group">
                      <input type="text" class=" student_id" id="student_id" placeholder="Search with Student Id" name="student_id" style="padding: 10px;" >
                      <button class="input-group-text" id="basic-addon1" class="search" style="padding: 10px;"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
              </div>

                <!-- form starts -->
                <form action="{{url('/fee_categories_amounts')}}" method="POST" id="myform" enctype="multipart/form-data">
                       {{csrf_field()}}
                    <!-- include message page -->
                     
                  <div class="add_item">
                    <div class="row">
                      <div class="col-md-5">
                        <!-- student_first_name field -->
                          <div class="form-group">
                            <label for="student_first_name" >Student First Name:</label>
                              <input type="text" name="student_first_name" class="form-control" id="student_first_name" placeholder="First Name">
                              <font style="color: red">{{($errors->has('student_first_name'))?($errors->first('student_first_name')):''}}</font>
                          </div> 
                          <!-- student_last_name field -->
                          <div class="form-group">
                            <label for="student_last_name" >Student Last Name:</label>
                              <input type="text" name="student_last_name" class="form-control" id="student_last_name" placeholder="Last Name">
                              <font style="color: red">{{($errors->has('student_last_name'))?($errors->first('student_last_name')):''}}</font>
                          </div>
                          <!-- student_email field -->
                          <div class="form-group">
                            <label for="student_email" >Student Email:<span style="color:red">*</span></label>
                              <input type="email" name="student_email" class="form-control" id="student_email" placeholder="Student Email" >
                              <font style="color: red">{{($errors->has('fstudent_email'))?($errors->first('student_email')):''}}</font>
                          </div>
                      </div>
                    </div>
                  	<div class="row">
                    	<div class="col-xs-12 col-md-5 ">
                        <!-- Fee category field -->                            
                         <div class="form-group">
                          <label for="fee_categories_id">Fee Category:</label>
                            <select class="form-control" name="fee_categories_id" id="fee_categories_id">
                              <option value="">Please Select Fee Category</option>
                              @foreach($fee_categories as $data_show)
                              <option value="{{$data_show->id}}">{{$data_show->fee_categories_name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <font style="color: red">{{($errors->has('fee_categories_id'))?($errors->first('fee_categories_id')):''}}</font>  
                      </div>
                      <div class="col-xs-12 col-md-5 ">
                        <div class="form-group">
                          <label for="dates">Date:</label>
                          <input type="date" class="form-control" name="dates" id="dates">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 col-md-5 ">
                        <div class="form-group">
                          <label for="month">Month:</label>
                           <select class="form-control" name="months_id" id="months_id">
                            <option value="">Please Select Month</option>
                            @foreach($months as $data_show)
                            <option value="{{$data_show->id}}">{{$data_show->month_name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-xs-12 col-md-5 ">
                        <div class="form-group">
                          <label for="year">year:</label>
                          <select class="form-control" name="years_id" id="years_id">
                            <option value="">Please Select Year</option>
                            @foreach($years as $data_show)
                            <option value="{{$data_show->id}}">{{$data_show->year_name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>  
                    <div class="row"> 
                      <div class="col-xs-12 col-md-5"> 
                        <!-- Semester name field -->  
                        <div class="form-group">
                          <label for="semesters_id">Semester:</label>
                            <select class="form-control" name="semesters_id[]" id="semesters_id[]">
                              <option value="">Please Select Semester</option>
                              @foreach($semesters as $data_show)
                              <option value="{{$data_show->id}}">{{$data_show->semester_name}}</option>
                              @endforeach
                            </select>
                        </div>
                        <font style="color: red">{{($errors->has('semesters_id[]'))?($errors->first('semesters_id[]')):''}}</font>  
                      </div>                            
                      <div class="col-xs-12 col-md-5">
                        <!-- course_code field -->
                        <div class="form-group">
                          <label for="amount">Amount:</label>
                          <input type="text" name="amount[]" class="form-control" id="amount[]" >
                        </div>
                        <font style="color: red">{{($errors->has('amount[]'))?($errors->first('amount[]')):''}}</font>
                      </div>
                      <div class="form-group col-md-1" style="padding-top: 30px;">
                        <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
                      </div>
                    </div>	
                  </div>
                  <!-- course_btn field -->
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
<div style="visibility: hidden;">
  <div class="whole_extra_item_add" id="whole_extra_item_add">
    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
      <div class="row">
        <div class="col-xs-12 col-md-5"> 
          <!-- Semester name field -->  
          <div class="form-group">
            <label for="semesters_id">Semester:</label>
              <select class="form-control" name="semesters_id[]" id="semesters_id[]">
                <option value="">Please Select Semester</option>
                @foreach($semesters as $data_show)
                <option value="{{$data_show->id}}">{{$data_show->semester_name}}</option>
                @endforeach
              </select>
          </div>  
        </div>                            
        <div class="col-xs-12 col-md-5">
          <!-- course_code field -->
          <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="text" name="amount[]" class="form-control" id="amount[]" >
          </div>
        </div>
        <div class="form-group col-md-1" style="padding-top: 30px;">
          <div class="row">
            <span class="btn btn-success addeventmore"><i class="fa fa-plus-circle"></i></span>
            <span class="btn btn-danger removeeventmore"><i class="fa fa-plus-circle"></i></span>
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
        $('#student_id').on('input',function(e){
            console.log(e);
            var student_id = e.target.value;
            
            $('#student_first_name').empty();
            $('#student_last_name').empty();
            $('#student_email').empty();
            $.get('/jsonCourseEnroll?student_id=' + student_id,function(data){
            console.log(data);
            $.each(data, function(index, studentsObj){
            var id=(data.id);
            var student_first_name =(data.student_first_name);
            var student_last_name =(data.student_last_name);
            var student_email = (data.student_email);
            $('#student_first_name').val(student_first_name);
            $('#student_last_name').val(student_last_name);
            $('#student_email').val(student_email);
            });
            });
        });
        </script>
@endsection