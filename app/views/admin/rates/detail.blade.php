
@extends('layout.admin')

@section('content')
<script src="/ckeditor/ckeditor.js"></script>




        @include("layout.comm.head")

        <div class="container-fluid">
            <div class="row-fluid">
{{Form::open(array('action' => 'RateController@detailStore' ,"id"=>"tab","enctype"=>"multipart/form-data" ))}}
<div class="btn-toolbar">

    <input type="submit" class="btn btn-primary"><i class="icon-save"></i> Save</button>

  <div class="btn-group">
  </div>
</div>

<div class="well">

    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">


        <label>工程名稱</label>
        <?php echo (!empty($result))?$result->title:''?>

        <label>圖片上傳</label>
        {{ Form::file('images[]', array('multiple'=>true)) }}
        {{Form::hidden('rate_id' ,$rate_id ) }}

        <label>分類</label>
        <?php
        $types=DB::table('categories')->where('type','工程進度')->get();
        ?>
        <select class="form-group" name="category_id">
            @foreach($types as $type)
              <option value="{{$type->id}}"  >{{$type->name}}</option>
            @endforeach
        </select>






      </div>


{{ Form::close() }}





    <?php
      foreach($types as $type){
    ?>


        <?php
          $rate_pics = DB::table("rate_pics")->where(array("rate_id"=>$rate_id , "category_id"=>$type->id ) )->get();
        ?>
       <div class="row">


             <div class="col-md-12"   style="@if($type->name == "圖面下載") background:#f8f8f8; @endif">
               <hr>
                 <p style="color:#000000;">
                   <?php echo $type->name; ?>
                     @if($type->name == "圖面下載")
                        <font style="color:red">設定密碼 </font> : <input type="text" name="sercert" alt="<?php echo (!empty($result))?$result->id:''?>"  id="sercert" value="<?php echo (!empty($result))?$result->secret:''?>" >
                     @endif
                </p>
                <hr>
            </div>




        <div class="col-xs-12 col-sm-6 col-md-12"  style="float:left;padding:10px;border-top:2px ;">



                      @foreach($rate_pics as $pic)
                        <div class="col-md-2" style="float:left;margin:10px;" id="oside" >

                            <div class="col-md-12" >
                                  標題 : <input type="text" name="name" alt="{{$pic->id}}"    value="{{$pic->name}}" >
                            </div>

                            <div class="col-md-12" style="    padding: 0px 0px 0px 41px;">
                                <button type="button" id="{{$pic->id}}"  class="close2"  style="float:right;" >×</button>
                                <a id="example1" href="{{$pic->image}}">
                                {{ HTML::image( $pic->image ,'',array( 'class' => 'img-thumbnail',
                                                                    "id" => $pic->id ,
                                                                    'style' =>  "width:200px;height:190px;")) }}
                                </a>
                            </div>

                            @if($type->name == "圖面下載")
                            <div class="col-md-12" style="margin:7px 0px 0px 0px;">
                                  內容 : <input type="text" name="content"  alt="{{$pic->id}}"    value="{{$pic->content}}" >
                            </div>
                            @endif

                        </div>
                      @endforeach


</div>
</div>

        <?php
        }
    ?>




  </div>

</div>






            </div>
        </div>

<style media="screen">
  button.close2 {
    padding: 0;
    cursor: pointer;
    background: transparent;
    border: 0;
    -webkit-appearance: none;
  }

  .close2 {
      float: right;
      font-size: 20px;
      font-weight: bold;
      line-height: 20px;
      color: #000000;
      text-shadow: 0 1px 0 #ffffff;
      opacity: 0.2;
      filter: alpha(opacity=20);
  }
  .row {
    margin-left: 0;
  }

  #this_name{
    width:170px;
  }

  #this_content{
    width:170px;
  }

</style>
<script type="text/javascript">

  $("document").ready(function(){

        //設定標題＆內容
        $("#sercert").change(function(){

            var _val = $(this).val();
            var _id = $(this).attr('alt');

            $.post("/setDownloadPas",
                  { val:_val,
                    rate_id:_id},
                  function(data){
                    alert('更新成功');

                });

        });

        //設定標題＆內容
        $("input").change(function(){

            var this_id = $(this).attr('alt');
            var this_name = $(this).attr('name');
            var this_val = $(this).val();

            // alert(this_id+'/'+this_name+'/'+this_val+'/');
            $.post("/changePicContent",
                  { this_id:this_id,
                    this_name:this_name,
                    this_val:this_val},
                  function(data){
                    // alert(data);


                });

        });

        $("button").click(function(){
              var html = $(this);
              var pic_id = html.attr('id') ;
              // $(this).clone().appendTo('.clone');

              var r = confirm("確定刪除圖片!?");
              if (r == true) {
                $.post("/delImage",
                      {"pic_id":pic_id},
                      function(data){
                        // alert(data);
                        html.parent().parent().hide();
                        html.next().hide();
                        html.hide();

                    });
              }

        });
  });

</script>


<script type="text/javascript">
    $(document).ready(function() {

          $("a#example1").fancybox({
    				'transitionIn'		: 'none',
    				'transitionOut'		: 'none',
    				'titlePosition' 	: 'over'
    			});

    });
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script>
  !window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
</script>
<script type="text/javascript" src="/plugin/fancybox/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="/plugin/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="/plugin/fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />

@stop
