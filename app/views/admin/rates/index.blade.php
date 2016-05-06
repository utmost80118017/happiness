
@extends('layout.admin')

@section('content')



        @include("layout.comm.head")

        <div class="container-fluid">
            <div class="row-fluid">

<div class="btn-toolbar">
     <a href="/rates/create" class="btn btn-primary">新增</a>
    <!--
      <button class="btn">Import</button>
      <button class="btn">Export</button>
    -->
  <div class="btn-group">
  </div>
</div>
<div class="well">
<?php

  $rateShow=array();
  foreach($areas as $ra){
      $rateShow[$ra->id]=$ra->name;
  }

?>
    <table class="table table-striped">
      <thead>
        <tr>

          <th>案名</th>
          <th>座標</th>
          <th>區域</th>
          <th>首頁顯示</th>
          <th>排序</th>

          <th style="width: 26px;"></th>
        </tr>
      </thead>

      <tbody>
        @foreach($result as $row)

        <tr>

          <td>
            {{$row->title}}

          </td>

          <td>
            x:{{$row->latitude}}
            y:{{$row->longitude}}
          </td>

          <th>
              <?php
                echo isset($rateShow[$row->taiwanArea])?$rateShow[$row->taiwanArea]:"";
              ?>
          </th>
          <td>
            @if($row->xm==1)
              是
            @else
              否
            @endif
          </td>

          <td>
            {{$row->prim}}


          </td>
          <td>
              <a href="/rate/{{$row->id}}"><i class="icon-pencil"></i></a>
              <a href="#myModal" id="{{$row->id}}" class="del_user" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
</div>


<div class="pagination">
  <?php echo with(new CustomPresenter($result))->render(); ?>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">刪除</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>確定要刪除?</p>
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
      $('.user_id').attr('href',"/delRate/"+$('.user_id').attr('id'))
      // alert( $('.user_id').attr('href') );

  })

})
</script>

@stop
