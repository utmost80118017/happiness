@extends('layout.admin')
@section('content')
        @include("layout.comm.head")
        <div class="container-fluid">
            <div class="row-fluid">

<div class="btn-toolbar">
  {{$category_id}}
    <?php
    // $ad_cas = Ad::all();
    // echo $result->count();
    if(  $result->count() >5 AND $category_id==23){
    ?>

     <?php
    }else{
     ?>
     <a href="/ads/create/{{$category_id}}" class="btn btn-primary" >新增</a>
     <?php
    }
     ?>
  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table table-striped">
      <thead>
        <tr>

          <th>名稱 </th>
          <th>排序</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>

      <tbody>
        @foreach($result as $row)

        <tr>


          <td>{{$row->title}}</td>
          <td>{{$row->pr}}</td>

          <td>
              <a href="/ads/{{$row->id}}?category_id={{$category_id}}"><i class="icon-pencil"></i></a>
              <a href="#myModal" id="{{$row->id}}" class="del_user" alt="{{$row->category_id}}" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
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
      $('.user_id').attr('href',"/delAd/"+$('.user_id').attr('id')+"?category_id="+$('.user_id').attr('alt'))
  })

})
</script>

@stop
