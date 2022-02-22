@extends('layouts.admin.master')
@section('title','Upozila Create\View')
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
            <div class="col-xs-12 col-md-3 js-grid js-sizer">
              <div class="panel">
                <div class="panel-heading bg-faded-darken">
                  <div class="panel-title">Upozila Add</div>
                </div>
                <div class="panel-body">
                 <!-- form starts -->
                  <form action="/upozilas" method="POST">
                    {{csrf_field()}}
                    <!-- include message page -->
                     @include('messages.message')
                    <!-- Division name field -->                               
                    <div class="form-group">
                      <label for="division_name">Division:</label>
                        <select class="form-control" name="divisions_id" id="division">
                          <option value="">Please Select Division</option>
                          @foreach($divisions as $data_show)
                          <option value="{{$data_show->id}}">{{$data_show->division_name}}</option>
                          @endforeach
                        </select>
                      </div>
                     <!-- District_name field -->
                    <div class="form-group">                                      
                      <select name="districts_id" id="district" class="form-control">
                      <option value="">Please select a district</option>
                    </select>
                    </div> 
                    <!-- Upozila_name field -->
                    <div class="form-group">                                      
                      <input type="text" name="upozila_name" class="form-control" id="upozila" placeholder="Upozila Name">
                    </div>                                       
              
                    <!-- teacher_btn field -->
                    <div class="form-group">
                      <input type="submit" name="create_upozila" class="btn btn-primary btn-user btn-block mt-5" value="Upozila Add">
                    </div>                        
                  </form>
            <!-- form ends -->                                       
                </div>
              </div>
            </div>
            <div class="col-xs-12 col-md-8 js-grid">
              <div class="panel">
                <div class="panel-heading bg-faded-darken">
                  <div class="panel-title">All Upozila View</div>
                </div>
                <div class="panel-body">
                  <!-- database table data show starts -->
                      <table class="table table-bordered  table-hover">
                      <thead class="thead-dark thead-light">
                        <tr>
                          <th scope="col">SL.</th>
                            <th scope="col">Division Name</th>                         
                            <th scope="col">District Name</th>                         
                            <th scope="col">Upozila Name</th>                         
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                      </thead>
                        <?php //paginate
                        $i= $upozilas->perPage()*($upozilas->currentPage()-1); ?>
                        <!-- foreach loops database er data show -->
                        @foreach($upozilas as $key=>$data_show)
                        <tbody>
                          <tr>
                            <td>{{++$i}}</td>
                            <td>{{$data_show->divisions->division_name}}</td>                    
                            <td>{{$data_show->districts->district_name}}</td>                    
                            <td>{{$data_show->upozila_name}}</td>                           
                            <td><a href="/upozilas/{{$data_show->id}}/edit" class="btn btn-success">Edit</a></td>
                            <td>{!! Form::open(['url' => '/upozilas/'.$data_show->id,'method'=>'Delete']) !!}
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            {!! Form::close() !!}</td>
                          </tr>
                        </tbody>
                        @endforeach
                      </table>
                        <!-- database table show ends -->
                        {{$upozilas->links()}}                   
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
    </script>
@endsection