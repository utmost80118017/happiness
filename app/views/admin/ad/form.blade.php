  <div class="tab-pane active in" id="home">
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif

  <?php
    $cate_array = array();
    foreach($cates as $cate){
        $cate_array[$cate['id']]=$cate['name'];
    }
  ?>

  <label>標題</label>
  <input type="text" name="title" value="<?php echo (!empty($post))?$post->title:''?>" class="input-xlarge">

  <label>排序</label>
  <input type="text" name="pr" value="<?php echo (!empty($post))?$post->pr:''?>" class="input-xlarge">


  <!--
  <label>排序</label>
  <input type="text" name="primary" value="<?php echo (!empty($post))?$post->primary:''?>" class="input-xlarge">
  -->
  <label>圖片</label>

      <font style="color:red;">
        @if($category_id==8)
          圖片檔案為_尺寸寬300px高160px
        @elseif($category_id==10)
          圖片檔案為_尺寸寬150px高120px
        @elseif($category_id==23)
          圖片檔案為_尺寸寬925px高150px
        @elseif($category_id==14)
          圖片檔案為_尺寸寬940px高400px
        @elseif($category_id==12)
          圖片檔案為_尺寸寬940px高400px
        @elseif($category_id==20)
          圖片檔案為_尺寸寬940px高400px
        @elseif($category_id==22)
          圖片檔案為_尺寸寬940px高400px
        @elseif($category_id==25)
          圖片檔案為_尺寸寬940px高400px
        @elseif($category_id==26)
          圖片檔案為_尺寸寬940px高400px
        @elseif($category_id==10)
          圖片檔案為_尺寸寬150px高120px
        @elseif($category_id==15)
          圖片檔案為_尺寸寬553px高295px
        @elseif($category_id==16)
          圖片檔案為_尺寸寬556px高320px
        @elseif($category_id==17)
          圖片檔案為_尺寸寬556px高320px
        @elseif($category_id==18)
          圖片檔案為_尺寸寬556px高320px
        @elseif($category_id==19)
          圖片檔案為_尺寸寬556px高320px
        @endif
      </font><br>


  @if(!empty($post) AND $post->image)

  <div class="col-md-1" style="wdith:200px;">



      <a href="#myModal" id="{{$post->id}}" class="del_user" alt="{{$category_id}}" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
      {{ HTML::image( "/public".$post->image ,'',array( 'class' => 'img-thumbnail',
                                          "id"    =>  $post->id ,
                                          'style' =>  "width:200px;height:190px;" ) ) }}
  </div>

  @else

    <input type="file" name="image" value="" class="input-xlarge">

  @endif

  <input type="hidden" name="category_id" value="{{$category_id}}" >


  <label>網址</label>
  <input type="text" name="url" value="<?php echo ($post)?$post->url:''?>">

  @if($category_id==10)
    <label>內文</label>
    <input type="text" name="content" value="<?php echo ($post)?$post->content:''?>" class="input-xlarge">
  @else
    <input type="hidden" name="content" value="content" class="input-xlarge">
  @endif

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

<script type="text/javascript">
  $("document").ready(function(){

      // $("button.delThisAdImage").click(function(){
      //
      //     alert($(this).attr("id"))
      //
      // });

      $("a").click(function(){
            $('.user_id').attr('id' , $(this).attr('id'));
            $('.user_id').attr('alt' , $(this).attr('alt'));
      });

      $('#myModal').on('shown.bs.modal', function () {

          // $('.modal-footer').hide()
          $('.user_id').attr('href',"/delThisAdImage/"+$('.user_id').attr('id')+"?category_id="+$('.user_id').attr('alt'))

          // alert( $('.user_id').attr('href') );
          // alert($('.user_id').attr('alt'));

      })

  });
</script>
