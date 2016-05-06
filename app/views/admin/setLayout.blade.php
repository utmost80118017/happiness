
@extends('layout.admin')

@section('content')



        @include("layout.comm.head")

        <div class="container-fluid">
            <div class="row-fluid">

<div class="btn-toolbar">

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
          <th>#</th>
          <th>名稱</th>
          <th>控制</th>
          <th style="width:226px;"></th>
        </tr>
      </thead>

      <tbody>
        <?php
        $i_count=1;
        ?>
        @foreach($result as $row)

        <tr>

          <td>{{$i_count++}} </td>
          <td>{{$row->title}}</td>
          <td>
            @if($row->flag==1)
              開啟
            @else
              關閉
            @endif
          </td>

          <td>
            開啟
            <input type="radio" name="name{{$row->id}}" value="1"
            class="{{$row->id}}" id="on" alt="ctl"
            @if($row->flag==1)
              checked
            @endif
            style="margin:0px 20px 0px 5px ">

            關閉
            <input type="radio" name="name{{$row->id}}" value="0"
            class="{{$row->id}}" id="off" alt="ctl"
            @if($row->flag==0)
              checked
            @endif
             style="margin:0px 20px 0px 5px ">
          </td>

        </tr>
        @endforeach

      </tbody>
    </table>
</div>






            </div>
        </div>
<script type="text/javascript">
$("document").ready(function(){

  $("input").click(function(){
        var id    = $(this).attr("class");
        var flag  = $(this).val();
        // alert(id +flag);

        $.post("/sgggglayout",
              {
              id:id,
              flag:flag
              },
              function(data){

                alert("修改成功");
            });




  });

})
</script>

@stop
