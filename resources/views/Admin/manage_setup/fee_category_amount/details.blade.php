@extends('layouts.admin.master')
@section('title','Fee Amount Details')
@section('content')

        <!-- PAGE CONTENT HERE-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-body">
                  <h4 class="page-header-title">Fee Amount|<b>University Management</b></h4>
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
                  <div class="panel-title">Fee Category Amount Details</div>
                </div>
                <div class="panel-body">
                  <div class="row">
                    <!-- include message page -->
                    @include('messages.message')
                    <!-- <div class="col-md-2"></div> -->
                    <div class="col-xs-12 col-md-10 ">
                      <h4><strong>Fee Type: </strong></h4>
                     <!-- database table data show starts -->
                     <table class="table table-bordered  table-hover">
                      <thead class="thead-dark thead-light">
                        <tr>
                          <th scope="col">SL.</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Amount</th>
                            
                        </tr>
                      </thead>
                       
                        <!-- foreach loops database er data show -->
                       
                       
                        <tbody>
                          @foreach($fee_amounts as $key=>$fee_amount)
                          <tr>
                            <td>{{++$key}}</td>
                            <td>{{$fee_amount->semesters->semester_name}}</td>
                            <td>{{$fee_amount->amount}}</td>                 
                          </tr>
                          @endforeach
                        </tbody>
                        
                      </table>
                        <!-- database table show ends -->
                        
                    </div>  
                  </div> 
                  <a href="{{url('/fee_categories_amounts/create')}}" class="btn btn-primary">Fee Category Amount Add</a>
                  <a href="{{url('/fee_categories_amounts')}}" class="btn btn-primary"><i class="fa fa-list"></i>Fee Category Amount list</a>                                 
                </div>
              </div>
            </div>
            
    </div>
</div>
<!-- END PAGE CONTENT-->
@endsection