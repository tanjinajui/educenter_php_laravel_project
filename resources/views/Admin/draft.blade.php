@extends('layouts.admin.master')
@section('title','Fee Category Amount Update')
@section('content')
<h4><strong>Fee Type: </strong>{{$data_show['0']['fee_categories']['fee_categories_name']}}</h4>
        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Fee Category Amount Update|<b>University Management</b></h4>
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
                  <div class="panel-title">Fee Category Amount Update</div>
                </div>
                <div class="panel-body">
                <!-- form starts -->
                <!-- laravelcollected html form starts -->
            {!! Form::open(['url' => '/fee_categories_amounts/'.$data_show[0]->fee_categories_id,'method'=>'PATCH']) !!}
                    <!-- include message page -->
                     @include('messages.message')
                  <div class="add_item">
                    <!-- <div class="row">
                      <div class="col-md-5">
                        student_first_name field
                          <div class="form-group">
                            <label for="student_first_name" >Student First Name:</label>
                              <input type="text" name="student_first_name" class="form-control" id="student_first_name" placeholder="First Name">
                          </div> 
                      </div>
                    </div> -->
                  <div class="row">
                    <div class="col-xs-12 col-md-5 ">
                      <!-- Fee category field -->                            
                       <div class="form-group">
                        <label for="fee_categories_id">Fee Category:</label>
                          <select class="form-control" name="fee_categories_id" id="fee_categories_id">
                            @foreach($fee_categories as $data_shows)
                            
                            <option value="{{$data_shows->id}}" {{($data_show["0"]->fee_categories_id==$data_shows->id)?"selected":""}}>{{$data_shows->fee_categories_name}}</option>
                            @endforeach
                          </select>
                      </div>
                    </div>
                  </div>  
                  @foreach($data_show as $edit)
                  <div class="row"> 
                    <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                    <div class="col-xs-12 col-md-5"> 
                    <!-- Semester name field -->  
                      <div class="form-group">
                        <label for="semesters_id">Semester:</label>
                          <select class="form-control" name="semesters_id[]" id="semesters_id[]">
                            <option value="">Please Select Semester</option>
                            @foreach($semesters as $data_shows)
                            <option value="{{$data_shows->id}}" {{($edit->semesters_id==$data_shows->id)?"selected":""}}>{{$data_shows->semester_name}}</option>
                            @endforeach
                          </select>
                      </div> 
                    </div>                            
                    <div class="col-xs-12 col-md-5">
                      <!-- course_code field -->
                      <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="text" name="amount[]" class="form-control" id="amount[]" value="{{$edit->amount}}" >
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
                  @endforeach 
                  </div>
                  <!-- course_btn field -->
                    <div class="form-group">
                      <input type="submit" value="Update" class="btn btn-primary">
                      <a href="{{url('/fee_categories_amounts')}}" class="btn btn-primary">Fee Category Amount list</a>
                    </div> 
                <!-- laravelcollected html form ends -->
            {!! Form::close() !!}
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
           
            $.get('/jsonCourseEnroll?student_id=' + student_id,function(data){
            console.log(data);
            $.each(data, function(index, studentsObj){
            var id=(data.id);
            var student_first_name =(data.student_first_name);
            
            $('#student_first_name').val(student_first_name);
            
            });
            });
        });
        </script>
@endsection
@extends('layouts.admin.master')
@section('title','Dashboard')
@section('content')
<!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Online Store Visitors</h3>
                  <a href="javascript:void(0);">View Report</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                  </span>
                </div>
              </div>
            </div>
            <!-- /.card -->
            
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


        

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')|School Management</title>

   <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/admin/assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/admin/assets/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('public/admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('public/admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('public/admin/assets/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/admin/assets/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('public/admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('public/admin/assets/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('public/admin/assets/plugins/summernote/summernote-bs4.min.css')}}">
</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          
          <span class="badge ">Admin</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="{{url('/logout')}}"onclick="event.preventDefault();
           document.getElementById('logout-form').submit();"><span class="dropdown-item dropdown-header">Logout</span></a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>       
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('public/admin/assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('public/admin/assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <!-- menu-item -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Manage users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Users</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- menu-item -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Department
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/departments')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Departments</p>
                </a>
              </li>
            </ul>
          </li>
           <!-- menu-item -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Semester
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/semesters')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Semesters</p>
                </a>
              </li>
            </ul>
          </li><!-- menu-item -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Teacher
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/teachers/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Teacher Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/teachers')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Teachers</p>
                </a>
              </li>
            </ul>
          </li><!-- menu-item -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
               Course
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/courses/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/courses')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Courses View</p>
                </a>
              </li>
            </ul>
          </li><!-- menu-item -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Student
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/students/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Student Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/students')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Student View</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- menu-item -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Course Asign
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/courses_asigns/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Asign Add</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/courses_asigns')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Course Asign View</p>
                </a>
              </li>
            </ul>
          </li><!-- menu-item -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Course inroll
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/enrollcourses/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course inroll</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/enrollcourses')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Course Asign View</p>
                </a>
              </li>
            </ul>
          </li><!-- menu-item -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Course Asign Teacher
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/courses_asigns_teacher/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Asign Teacher</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/courses_asigns_teacher')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Course Asign Teacher View</p>
                </a>
              </li>
            </ul>
          </li><!-- menu-item -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Address
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/divisions')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Division create/view</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/districts')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>District create/view</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/upozilas')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Upozila create/view</p>
                </a>
              </li>
            </ul>
          </li><!-- menu-item -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Course Asign
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/courses_asigns/create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Course Asign</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/courses_asigns')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Course Asign View</p>
                </a>
              </li>
            </ul>
          </li>
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<!-- footer start -->
        <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="www.tanjina.ml">Developed by Tanjina </a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Developed by</b> Tanjina
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('public/admin/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('public/admin/assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('public/admin/assets/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('public/admin/assets/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('public/admin/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('public/admin/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('public/admin/assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('public/admin/assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/admin/assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/admin/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('public/admin/assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('public/admin/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/admin/assets/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/admin/assets/dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/admin/assets/dist/js/pages/dashboard.js')}}"></script>
</body>
</html>



                   