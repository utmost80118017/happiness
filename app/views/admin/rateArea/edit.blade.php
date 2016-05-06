
@extends('layout.admin')

@section('content')




        @include("layout.comm.head")

        <div class="container-fluid">
            <div class="row-fluid">
              {{Form::open(array('action' => 'RateAreaController@update' ,"id"=>"tab","enctype"=>"multipart/form-data", 'files' => true  ))}}
              {{Form::hidden('id' ,$post->id ) }}
              <div class="btn-toolbar">

    <input type="submit" class="btn btn-primary"><i class="icon-save"></i> Save</button>

  <div class="btn-group">
  </div>
</div>

<div class="well">

    <div id="myTabContent" class="tab-content">

        @include("admin.rateArea.form" )

        {{ Form::close() }}
    </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>

  <div class="modal-body">
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>





            </div>
        </div>




@stop
