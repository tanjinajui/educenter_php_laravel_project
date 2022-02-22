<!DOCTYPE html>
<html lang="en-us">
  <head>
   

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">


    <!-- lib-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic">

    <!--
    link(rel='stylesheet' href='assets/stylesheets/ionicons.css')
    link(rel='stylesheet' href='assets/stylesheets/font-awesome.css')
    link(rel='stylesheet' href='assets/stylesheets/weather-icons.min.css')
    link(rel='stylesheet' href='assets/stylesheets/animate.css')
    link(rel='stylesheet' href='assets/stylesheets/glyphicon.css')
    
    -->

    <!--
    plugin
    link(rel='stylesheet' href='assets/stylesheets/plugin/bootstrap-table.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/nifty-modal.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/jquery.bootstrap-touchspin.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/select2.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/multi-select.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/ladda.min.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/daterangepicker.css')
    link(rel='stylesheet' href='assets/stylesheets/plugin/jquery.timepicker.css')
    link(rel="stylesheet" href="assets/stylesheets/plugin/jqvmap.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-submenu.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/code.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/jquery.dataTables.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/dataTables.bootstrap.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/jquery.gridster.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/summernote.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-markdown.min.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-select.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/asColorPicker.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/bootstrap-datepicker.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/jquery-labelauty.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/owl.carousel.min.css")
    link(rel="stylesheet" href="assets/stylesheets/plugin/owl.theme.default.min.css")
    
    -->

    <!-- Theme-->
    <!-- Concat all lib & plugins css-->
    <!-- style css only-->
    <link id="mainstyle" rel="stylesheet" href="{{asset('admin/assets/stylesheets/style.css')}}">
    <link id="mainstyle" rel="stylesheet" href="{{asset('admin/assets/stylesheets/theme-libs-plugins.css')}}">
    <link id="mainstyle" rel="stylesheet" href="{{asset('admin/assets/stylesheets/skin.css')}}">

    <!-- Demo only-->
    <link id="mainstyle" rel="stylesheet" href="{{asset('admin/assets/stylesheets/demo.css')}}">
    

    <!-- This page only-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries--><!--[if lt IE 9]>
    <script src="assets/scripts/lib/html5shiv.js"></script>
    <script src="assets/scripts/lib/respond.js"></script><![endif]-->
    <script src="{{asset('admin/assets/scripts/lib/modernizr-custom.js')}}"></script>
    <script src="{{asset('admin/assets/scripts/lib/respond.js')}}"></script>
    <!-- Possible Classes
    ** Gradient style:
    * orchid
    * cadetblue
    * joomla
    * influenza
    * moss
    * mirage
    * stellar
    * servquick
    
    ** Flat style:
    * f-dark
    * f-dark-blue
    * f-blue
    * f-green
    
    ** Layout control
    * minibar
    * layout-drawer (changed the var on top)
    
    e.g
    <body class="moss layout-drawer">
    -->
    <style>
      span {
    color: red;
}
    </style>
  </head>

  <body class="orchid  ">

    <!-- #SIDEMENU-->
    <div class="mainmenu-block">
      <!-- SITE MAINMENU-->
      <nav class="menu-block">
        <ul class="nav">
          <li class="nav-item mainmenu-user-profile"><a href="user-profile.html">
              <div class="circle-box"><img src="{{asset('public/admin/assets/images/logo.png')}}" alt="">
                <div class="dot dot-success"></div>
              </div>
              <div class="menu-block-label"><b>Odalys Broussard</b><br>Managing Director</div></a></li>
        </ul>
        <div class="p-a-2"><span class="small pull-xs-right">This Month Earnings</span>
          <canvas id="demo-bar-dark-chart"></canvas>
        </div>
        <ul class="nav">
          <li class="nav-item"><a class="nav-link" href="index.html"><i class="icon ion-home"></i><div class="menu-block-label">Home</div></a></li>
         
          
          <li class="menu-block-has-sub nav-item "><a class="nav-link {{'departments'== request()->segment(1) ? 'active' : ''}}" href="#"><i class="icon ion-android-funnel"></i>
          <div class="menu-block-label">Department</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item {{'departments'== request()->segment(2) ? 'active' : ''}}"><a class=" nav-link  " href="{{url('/departments')}}"><i class="fa fa-plus-circle"></i>All Departments</a></li>            
            </ul>
          </li> 
          <li class="menu-block-has-sub nav-item"><a class="nav-link {{'semesters'== request()->segment(1) ? 'active' : ''}}" href="#"><i class="icon ion-android-funnel"></i>
          <div class="menu-block-label">Semester</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item {{'semesters'== request()->segment(2) ? 'active' : ''}}"><a class="nav-link" href="{{url('/semesters')}}">All Semesters</a></li>            
            </ul>
          </li>
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-android-funnel"></i>
              <div class="menu-block-label">Teacher</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="{{url('/teachers/create')}}">Teacher Add</a></li>            
              <li class="nav-item"><a class="nav-link" href="{{url('/teachers')}}">All Teachers</a></li>            
            </ul>
          </li>
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-android-funnel"></i>
            <div class="menu-block-label">Course</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="{{url('/courses/create')}}">Course Add</a></li>            
              <li class="nav-item"><a class="nav-link" href="{{url('/courses')}}">All Courses View</a></li>            
            </ul>
          </li> 
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-android-funnel"></i>
            <div class="menu-block-label">Student</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="{{url('/students/create')}}">Student Add</a></li>            
              <li class="nav-item"><a class="nav-link" href="{{url('/students')}}">All Student View</a></li>            
            </ul>
          </li> 
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-android-funnel"></i>
            <div class="menu-block-label">Course Asign</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="{{url('/courses_asigns/create')}}">Course Asign</a></li>  
              <li class="nav-item"><a class="nav-link" href="{{url('/courses_asigns')}}">All Course Asign View</a></li>   
            </ul>
          </li> 
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-android-funnel"></i>
            <div class="menu-block-label">Course Asign Multiple</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="{{url('/course_asign_multiples/create')}}">Course Asign Multiple</a></li>  
              <li class="nav-item"><a class="nav-link" href="{{url('/course_asign_multiples')}}">All Course Asign Multiple View</a></li>   
            </ul>
          </li> 
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-android-funnel"></i>
            <div class="menu-block-label">Course inroll</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="{{url('/enrollcourses/create')}}">Course inroll</a></li>  
              <li class="nav-item"><a class="nav-link" href="{{url('/enrollcourses')}}">All Course Asign View</a></li>   
            </ul>
          </li> 
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-android-funnel"></i>
            <div class="menu-block-label">Course Asign Teacher</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="{{url('/courses_asigns_teacher/create')}}">Course Asign Teacher</a></li>  
              <li class="nav-item"><a class="nav-link" href="{{url('/courses_asigns_teacher')}}">All Course Asign Teacher View</a></li>   
            </ul>
          </li> 
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-android-funnel"></i>
            <div class="menu-block-label">Manage Setup</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="{{url('/month')}}">Month</a></li>  
              <li class="nav-item"><a class="nav-link" href="{{url('/year')}}">Year</a></li>  
              <li class="nav-item"><a class="nav-link" href="{{url('/shifts')}}">Shift</a></li>  
              <li class="nav-item"><a class="nav-link" href="{{url('/exams')}}">Exam</a></li>  
              <li class="nav-item"><a class="nav-link" href="{{url('/fee_categories')}}">Fee Category</a></li>     
            </ul>
          </li> 
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-android-funnel"></i>
            <div class="menu-block-label">Fee Category Amount</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="{{url('/fee_categories_amounts/create')}}">Fee Category Amount Add</a></li>  
              <li class="nav-item"><a class="nav-link" href="{{url('/fee_categories_amounts')}}">Fee Category Amount view</a></li>  
                 
            </ul>
          </li> 
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-android-funnel"></i>
              <div class="menu-block-label">Address</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="{{url('/divisions')}}">Division create/view</a></li>            
              <li class="nav-item"><a class="nav-link" href="{{url('/districts')}}">District create/view</a></li>            
              <li class="nav-item"><a class="nav-link" href="{{url('/upozilas')}}">Upozila create/view</a></li>            
            </ul>
          </li>
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-android-people"></i>
              <div class="menu-block-label">User</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="user-login.html">Login</a></li>
              <li class="nav-item"><a class="nav-link" href="user-login-2.html">Login 2</a></li>
              <li class="nav-item"><a class="nav-link" href="user-login-3.html">Login 3</a></li>
              <li class="nav-item"><a class="nav-link" href="user-register.html">Register</a></li>
              <li class="nav-item"><a class="nav-link" href="user-register-2.html">Register 2</a></li>
              <li class="nav-item"><a class="nav-link" href="user-register-3.html">Register 3</a></li>
              <li class="nav-item"><a class="nav-link" href="user-register-4.html">Register 4</a></li>
              <li class="nav-item"><a class="nav-link" href="user-lists.html">Users Lists</a></li>
              <li class="nav-item"><a class="nav-link" href="user-profile.html">User Profile</a></li>
              <li class="nav-item"><a class="nav-link" href="user-profile-2.html">User Profile 2</a></li>
              <li class="nav-item"><a class="nav-link" href="user-profile-3.html">User Profile 3</a></li>
            </ul>
          </li>
          <!--li.header.nav-item user interface-->
          <li class="menu-block-has-sub nav-item"><a class="nav-link" href="#"><i class="icon ion-android-funnel"></i>
              <div class="menu-block-label">Menu Level</div></a>
            <ul class="nav menu-block-sub">
              <li class="nav-item"><a class="nav-link" href="#">Commas</a></li>
              <li class="nav-item menu-block-has-sub"><a href="#">Neversa</a>
                <ul class="nav menu-block-sub">
                  <li class="nav-item"><a class="nav-link" href="#">Incurred</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Preparation</a></li>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="#">Country</a></li>
            </ul>
          </li>
        </ul>
        <!-- END SITE MAINMENU-->
      </nav>
    </div>

     <!-- #MAIN-->
    <div class="main-wrapper">

      <!-- VIEW WRAPPER-->
      <div class="view-wrapper">

        <!-- TOP WRAPPER-->
        <div class="topbar-wrapper">

          <!-- NAV FOR MOBILE-->
          <div class="topbar-wrapper-mobile-nav"><a class="topbar-togger js-minibar-toggler" href="#"><i class="icon ion-ios-arrow-back hidden-md-down"></i><i class="icon ion-navicon-round hidden-lg-up"></i></a><a class="topbar-togger pull-xs-right hidden-lg-up js-nav-toggler" href="#"><i class="icon ion-android-person"></i></a>

            <!-- ADD YOUR LOGO HEREText logo: a.topbar-wrapper-logo(href="#") AdminHero
            --><a class="topbar-wrapper-logo demo-logo" href="/blogadmin">University</a>
          </div>
          <!-- END NAV FOR MOBILE-->

          <!-- SEARCH-->
          <div class="topbar-wrapper-search">
            <form>
              <input class="form-control" type="search" placeholder="Search"><a class="topbar-togger topbar-togger-search js-close-search" href="#"><i class="icon ion-close"></i></a>
            </form>
          </div>
          <!-- END SEARCH-->

          <!-- TOP RIGHT MENU-->
          <ul class="nav navbar-nav topbar-wrapper-nav">
            <li class="nav-item"><a class="nav-link js-search-togger" href="#"><i class="icon ion-ios-search-strong"></i></a></li>

            <!--  -->
              <!-- #RIGHT BLOCK-->
              <!--
              RIGHT PANEL
              * same dropdown-menu markup, add '.dropdown-menu-side'
              -->
              <!-- END RIGHt PANEL-->
            </li>

            <li class="nav-item dropdown"><a class="nav-link" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><span>Admin</span></a>
              <div class="dropdown-menu dropdown-menu-right">
                <a href="{{url('/logout')}}"onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><div class="dropdown-header">Logout</div></a>
                                                     <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
      
              </div>
            </li>
            
            <li class="nav-item"><a class="nav-link" href="#"><i class="icon ion-android-exit"></i></a></li>
            <li class="nav-item"><a class="nav-link close-mobile-nav js-close-mobile-nav" href="#"><i class="icon ion-close"></i></a></li>
            <!-- END TOP RIGHT MENU-->
          </ul>
        </div>
        <!--END TOP WRAPPER-->
