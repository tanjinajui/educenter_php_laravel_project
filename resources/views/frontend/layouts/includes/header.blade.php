<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>@yield('title')|Educenter</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('frontend/plugins/bootstrap/bootstrap.min.css')}}">
  <!-- slick slider -->
  <link rel="stylesheet" href="{{asset('frontend/plugins/slick/slick.css')}}">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="{{asset('frontend/plugins/themify-icons/themify-icons.css')}}">
  <!-- animation css -->
  <link rel="stylesheet" href="{{asset('frontend/plugins/animate/animate.css')}}">
  <!-- aos -->
  <link rel="stylesheet" href="{{asset('frontend/plugins/aos/aos.css')}}">
  <!-- venobox popup -->
  <link rel="stylesheet" href="{{asset('frontend/plugins/venobox/venobox.css')}}">

  <!-- Main Stylesheet -->
  <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="{{asset('frontend/images/favicon.png')}}" type="image/x-icon">
  <link rel="icon" href="{{asset('frontend/images/favicon.png')}}" type="image/x-icon">

</head>

<body>
  <!-- preloader start -->
  <div class="preloader">
    <img src="{{asset('frontend/images/preloader.gif')}}" alt="preloader">
  </div>
  <!-- preloader end -->

<!-- header -->
<header class="fixed-top header">
  <!-- top header -->
  <div class="top-header py-2 bg-white">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-lg-4 text-center text-lg-left">
          <a class="text-color mr-3" href="callto:+443003030266"><strong>CALL</strong> +44 300 303 0266</a>
          <ul class="list-inline d-inline">
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-facebook"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-twitter-alt"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-linkedin"></i></a></li>
            <li class="list-inline-item mx-0"><a class="d-inline-block p-2 text-color" href="#"><i class="ti-instagram"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
          <ul class="list-inline">
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="notice.html">notice</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="research.html">research</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="scholarship.html">SCHOLARSHIP</a></li>
            @if(Sentinel::check())
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="/logout">Logout</a></li>
            @else
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="{{url('/loginUser')}}" data-toggle="modal" data-target="#loginModal">login</a></li>
            <li class="list-inline-item"><a class="text-uppercase text-color p-sm-2 py-2 px-0 d-inline-block" href="/signUp" data-toggle="modal" data-target="#signupModal">register</a></li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- navbar -->
  <div class="navigation w-100">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-dark p-0">
        <a class="navbar-brand" href="index.html"><img src="{{asset('frontend/images/logo.png')}}" alt="logo"></a>
        <button class="navbar-toggler rounded-0" type="button" data-toggle="collapse" data-target="#navigation"
          aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navigation">
          <ul class="navbar-nav ml-auto text-center">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item @@about">
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item @@courses">
              <a class="nav-link" href="courses.html">COURSES</a>
            </li>
            <li class="nav-item @@events">
              <a class="nav-link" href="events.html">EVENTS</a>
            </li>
            <li class="nav-item @@blog">
              <a class="nav-link" href="blog.html">BLOG</a>
            </li>
            <li class="nav-item dropdown view">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Pages
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="teacher.html">Teacher</a>
                <a class="dropdown-item" href="teacher-single.html">Teacher Single</a>
                <a class="dropdown-item" href="notice.html">Notice</a>
                <a class="dropdown-item" href="notice-single.html">Notice Details</a>
                <a class="dropdown-item" href="research.html">Research</a>
                <a class="dropdown-item" href="scholarship.html">Scholarship</a>
                <a class="dropdown-item" href="course-single.html">Course Details</a>
                <a class="dropdown-item" href="event-single.html">Event Details</a>
                <a class="dropdown-item" href="blog-single.html">Blog Details</a>
              </div>
            </li>
            <li class="nav-item @@contact">
              <a class="nav-link" href="contact.html">CONTACT</a>
            </li>
            <!--  @if(Sentinel::check())
            <li class="nav-item @@register">
              <a class="nav-link" href="/logout">Registration</a>
            </li>
            @else
            <li class="nav-item @@register">
              <a class="nav-link" href="/signUp">Registration</a>
            </li>
            <li class="nav-item @@login">
              <a class="nav-link" href="/loginUser">LOGIN</a>
            </li>
            @endif -->
          </ul>
        </div>
      </nav>
    </div>
  </div>
</header>
<!-- /header -->
<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Register</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="login">
                    <form action="{{url('/signUp')}}" method="POST" class="row" id="myform">
                       {{csrf_field()}}
                        <!-- include message page -->
                        

                        <div class="form-group col-12">
                            <input type="text" class="form-control mb-3" id="first_name" name="first_name" placeholder="First Name" required="">
                            <font style="color: red">{{($errors->has('first_name'))?($errors->first('first_name')):''}}</font>  
                        </div>
                        <div class="form-group col-12">
                            <input type="text" class="form-control mb-3" id="last_name" name="last_name" placeholder="Last Name">
                            <font style="color: red">{{($errors->has('last_name'))?($errors->first('last_name')):''}}</font>
                        </div>
                        <div class="form-group col-12">
                            <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Email">
                            <font style="color: red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                        </div>
                        <div class="form-group col-12">
                            <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Password" >
                            <font style="color: red">{{($errors->has('password'))?($errors->first('password')):''}}</font>
                        </div>
                        <div class="form-group col-12">
                            <input type="password" class="form-control mb-3" id="confirm_password" name="confirm_password" placeholder="Confirm Password" >
                            <font style="color: red">{{($errors->has('confirm_password'))?($errors->first('confirm_password')):''}}</font>
                        </div>
                        <div class="form-group col-12">
                          <input type="number" class="form-control mb-3" id="mobile" name="mobile" placeholder="Mobile No">
                          <font style="color: red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary">SIGN UP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Login</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{url('/loginUser')}}" method="POST" class="row">
                   {{csrf_field()}}
                        <!-- include message page -->
                         @include('messages.message')
                    <!-- email-field -->
                    <div class="col-12">
                        <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Email">
                    </div>
                    <!-- password-field -->
                    <div class="col-12">
                        <input type="password" class="form-control mb-3" id="inputpassword" name="password" placeholder="Password" >
                        <button id="eyeopen" onclick="showpassword()"><span class="glyphicon glyphicon-eye-open"></span></button>
                  <button id="eyeclose" style="display: none;" onclick="showpassword()"><span class="glyphicon glyphicon-eye-close"></span></button>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
 
 <script type="text/javascript">
   function showpassword(){
    var data=document.getElementById('inputpassword');
    if (data.type=='password') {
      data.type='text';
      eyeopen.style.display="none";
      eyeclose.style.display="block";
    }else{
      data.type='password';
      eyeopen.style.display="block";
      eyeclose.style.display="none";
    }
   }
 </script>