
@extends('layout.admin')

@section('content')



        @include("layout.comm.head")

        <div class="container-fluid">
            <div class="row-fluid">

<div class="btn-toolbar">

  <div class="btn-group">
  </div>
</div>
<div class="well">
    <table class="table table-striped">
      <thead>
        <tr>
            <th>日期</th>
            <!-- <th>來自</th> -->
            <th>人數</th>
        </tr>
      </thead>


      <tbody>

        @foreach($result as $row)
            <?php
            // echo $row->created_at;
            $dates = DB::table("explode")->where('created_at',$row->created_at)->get();
            // $forms = DB::table("explode")->where('created_at',$row->created_at)->groupBy("title")->get();
            ?>


                <tr>
                    <th>{{$row->created_at}}</th>

                    <!-- <th>

                    </th> -->

                    <th>{{count($dates)}}</th>
                </tr>



            <?php

            ?>
        @endforeach

      </tbody>
    </table>
    <div class="pagination">
      {{ $result->links()}}
    </div>
</div>










@stop
