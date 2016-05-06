
@extends('layout.admin')

@section('content')



        @include("layout.comm.head")

        <div class="container-fluid">
            <div class="row-fluid">

<div class="btn-toolbar">

     <a href="/categories/create" class="btn btn-primary" >新增</a>
   <?php
   $ad_cate_list  = array( 1 => "共用",
                           2 => "米築首頁",
                           3 => "地產動態",
                           4 => "新案訊息",
                           5 => "生活美學",
                           6 => "人物觀點",
                           7 => "關於米築"
                       );
   ?>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>名稱</th>
          <th>名稱</th>
          <th>主分類</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>

      <tbody>
        @foreach($result as $row)

        <tr>

          <td>{{$row->id}}</td>
          <td>{{$row->name}}</td>
          <td>
            <span style="color:red;">
            <?php
            echo isset($ad_cate_list[$row->ad_main])?$ad_cate_list[$row->ad_main]:"";
            ?>
            </span>
          </td>
          <td>{{$row->type}}</td>

          <td>
              <a href="/category/{{$row->id}}"><i class="icon-pencil"></i></a>
              <a href="#myModal" id="{{$row->id}}" class="del_user" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
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
        <h3 id="myModalLabel">刪除分類</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>確定要刪除分類?</p>
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
      $('.user_id').attr('href',"/delCategory/"+$('.user_id').attr('id'))
      // alert( $('.user_id').attr('href') );

  })

})
</script>

@stop
