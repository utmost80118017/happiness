
@extends('layout.admin')

@section('content')



        @include("layout.comm.head")

        <div class="container-fluid">
            <div class="row-fluid">

<div class="btn-toolbar">
  <!--
     <a href="/ads/create" class="btn btn-primary" >新增</a>

      <button class="btn">Import</button>
      <button class="btn">Export</button>
    -->
  <div class="btn-group">
  </div>
</div>
<div class="well">
  <?php

$ad_cate_list= array( 1 => "共用",
                      2 => "米築首頁",
                      3 => "地產動態",
                      4 => "新案訊息",
                      5 => "生活美學",
                      6 => "人物觀點",
                      7 => "關於米築"
                    );
foreach($ad_cate_list as $key => $value){


  ?>
    <table class="table table-striped">
      <thead>
        <tr>
          <th><span style="color:red;">{{$value}}</span></th>
          <th style="width: 66px;"></th>
        </tr>
      </thead>

      <tbody>
        <?php
        $ad_res=DB::table('categories')->where('ad_main',$key)->get();
        foreach($ad_res as $row){
        ?>

        <tr>
          <td>{{$row->name}}</td>
          <td> </td>
          <td>
              <a href="/ads/index/{{$row->id}}" >
                進入廣告列表
              </a>
          </td>
        </tr>
        <?php
        }
        ?>
      </tbody>
    </table>

    <hr>
    <br>
    <br>
<?php
}
?>
</div>


<div class="pagination">
  {{$result->links() }}
</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">刪除地產新聞</h3>
    </div>
    <div class="modal-body">
        <p class="error-text"><i class="icon-warning-sign modal-icon"></i>確定要刪除!?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <a  class="btn btn-danger user_id" alt="">Delete</a>
    </div>
</div>





            </div>
        </div>
<script type="text/javascript">
$("document").ready(function(){

  $("a").click(function(){
        $('.user_id').attr('id' , $(this).attr('id'));
        $('.user_id').attr('alt' , $(this).attr('alt'));
  });

  $('#myModal').on('shown.bs.modal', function () {

      // $('.modal-footer').hide()
      $('.user_id').attr('href',"/delPost/"+$('.user_id').attr('id')+"?category_id="+$('.user_id').attr('alt'))

      // alert( $('.user_id').attr('href') );
      // alert($('.user_id').attr('alt'));

  })

})
</script>

@stop
