
@extends('layout.admin')

@section('content')



        @include("layout.comm.head")

        <div class="container-fluid">
            <div class="row-fluid">

<div class="btn-toolbar">
    <!-- <button class="btn btn-primary"><i class="icon-plus"></i> <a href="/mailcontents/create">新增</a></button> -->
    <!--
      <button class="btn">Import</button>
      <button class="btn">Export</button>
    -->
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table table-striped">
      <thead>
        <tr>

          <th>名稱</th>
          <!-- <th>內容</th> -->
          <th>寄給</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>

      <tbody>
        @foreach($result as $row)

        <tr>


          <td>{{$row->title}}</td>

          <td>{{$row->mailto}}</td>
          <td>
              <a href="/mailcontent/{{$row->id}}"><i class="icon-pencil"></i></a>
              
          </td>

        </tr>
        @endforeach

      </tbody>
    </table>
</div>


<div class="pagination">
  {{$result->links() }}
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">刪除郵件內容</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>確定要刪除郵件內容?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <a  class="btn btn-danger user_id" >Delete</a>
    </div>
</div>





            </div>
        </div>
<script type="text/javascript">
$("document").ready(function(){

  $("a").click(function(){
        $('.user_id').attr('id' , $(this).attr('id'));
  });

  $('#myModal').on('shown.bs.modal', function () {

      // $('.modal-footer').hide()
      $('.user_id').attr('href',"/delmailcontent/"+$('.user_id').attr('id'))
      // alert( $('.user_id').attr('href') );

  })

})
</script>

@stop
