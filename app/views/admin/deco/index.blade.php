
@extends('layout.admin')

@section('content')



        @include("layout.comm.head")

        <div class="container-fluid">
            <div class="row-fluid">

  <?php
  // if($result->count()< 6){
  ?>
  <div class="btn-toolbar">
       <a href="/deco/create" class="btn btn-primary" >新增</a>
      <div class="btn-group">
      </div>
  </div>
  <?php
  // }
  ?>
<div class="well">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>#</th>
          <th>名稱</th>
          <th>分類</th>
          <th>前台是否顯示</th>
          <th>排序</th>
          <th style="width: 26px;"></th>
        </tr>
      </thead>

      <tbody>
        <?php
        $i_count=1;
        ?>
        @foreach($result as $row)

        <tr>

          <td>{{$i_count++}} </td>
          <td>{{$row->name}}</td>
          <td>{{$row->type}}</td>
          <td>
            @if($row->flag==1)
             是
            @else
             否
            @endif
          </td>
          <td>{{$row->prim}}</td>

          <td>
              <a href="/deco/{{$row->id}}"><i class="icon-pencil"></i></a>
              <a href="#myModal" id="{{$row->id}}" class="del_user" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
          </td>

        </tr>
        @endforeach

      </tbody>
    </table>
</div>


<div class="pagination">

  <p id="page">

    <?php echo with(new CustomPresenter($result))->render(); ?>

  </p>

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
      $('.user_id').attr('href',"/delDeco/"+$('.user_id').attr('id') );
  })

})
</script>

@stop
