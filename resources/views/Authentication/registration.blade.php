<!-- header and footer file master include -->
@extends('frontend.layouts.includes.master')
<!-- title set -->
@section('title','Home')
@section('content')
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
                    <form action="/signUp" method="POST" class="row">
                       {{csrf_field()}}
                        <!-- include message page -->
                         @include('messages.message')
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="first_name" name="first_name" placeholder="First Name">
                        </div>
                        <div class="col-12">
                            <input type="text" class="form-control mb-3" id="last_name" name="last_name" placeholder="Last Name">
                        </div>
                        <div class="col-12">
                            <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="col-12">
                            <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Password" >
                        </div>
                        <div class="col-12">
                            <input type="password" class="form-control mb-3" id="confirm_password" name="confirm_password" placeholder="Confirm Password" >
                        </div>
                        <div class="col-12">
                          <input type="text" class="form-control mb-3" id="phone" name="phone" placeholder="Phone">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">SIGN UP</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection