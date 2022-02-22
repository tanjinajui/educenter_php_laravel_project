
@extends('layouts.admin.master')
@section('title','Dashboard')
@section('content')
<!-- PAGE CONTENT HERE-->
        <!-- #PAGE HEADER-->
        <!-- PAGE HEADER-->
        <div class="page-header">
          <div class="row">
            <div class="col-md-4">
              <div class="media">
                <div class="media-left media-middle"><i class="ion-edit fa-2x"></i></div>
                <div class="media-body">
                  <div class="display-6">Editor</div>
                  <div class="small text-muted">
                     Summernote, markdown</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="panel-wrapper">
            <!-- #SUMMERNOTE-->
            <div class="panel">
              <div class="panel-heading">
                <h6 class="panel-title">
                   Summernote<a class="small" href="http://summernote.org/" target="_blank">official website</a></h6>
              </div>
              <div class="panel-body">
                <textarea id="summernote" data-plugin="summernote">Stands century wanted up, presentations. Is but to place big the phase. The simple, in its at not invitation not or contribution the nor cost. Of contract, lifted trial. His working please picked understanding of entered have the avoid interaction the were release off rationally and a their rolled my.</textarea>
              </div>
            </div>
            <!-- #MARKDOWN-->
            <div class="panel">
              <div class="panel-heading">
                <h6 class="panel-title">
                   Bootstrap Markdown<a class="small" href="http://www.codingdrama.com/bootstrap-markdown/" target="_blank">official website</a></h6>
              </div>
              <div class="panel-body">
                <textarea id="markdown" data-provide="markdown" name="content" rows="10">century wanted up, presentations. Is but to place big the phase. The simple, in its at not invitat</textarea>
              </div>
            </div>
          </div>
        </div>
        <!-- END PAGE CONTENT-->

      </div>
      <!-- END VIEW WAPPER-->

    </div>
    <!-- END MAIN WRAPPER-->
    

  @endsection
