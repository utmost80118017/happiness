  <div class="tab-pane active in" id="home">
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif





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

  <label>標題</label>
  <input type="text" name="name" value="<?php echo (!empty($post))?$post->name:''?>" class="input-xlarge">

  <label>分類</label>
  <input type="text" name="type" value="<?php echo (!empty($post))?$post->type:''?>" class="input-xlarge">

<br>
      <label>前台顯示</label>
      是
      <input type="radio" class="flag" name="flag" value="1" <?php echo (!empty($post))?($post->flag==1)?" checked":"" :''?>  >
      否
      <input type="radio" class="flag" name="flag" value="0" <?php echo (!empty($post))?($post->flag==0)?" checked":"" :''?> >
<br><br>
  <label >排序</label>
  <input type="text" name="prim"     value="<?php echo (!empty($post))?$post->prim:''?>" class="input-xlarge">

            <label>圖片</label>
            <font style="color:red;">圖片檔案為_尺寸寬900px高400px</font>
            <br>
            @if(!empty($post) && $post->image)


                <button  href="#myModal" id="{{$post->id}}"  class="close2"  style="float:left;" data-toggle="modal" >×</button>

                {{ HTML::image( "/public".$post->image , '' , array( 'class' => 'img-thumbnail',
                                                          "id" => $post->id ,
                                                          'style' =>  "width:200px;height:190px;")) }}





            @else
              <input type="file" name="image" value="" class="input-xlarge">
            @endif

  <input type="hidden" name="category_id" value="4" >




  <div class="row" style="margin:10px;">

    <div class="col-md-12" style="width:100%;float:left;">
    <?php
    $fields=array(
                  // 'lineLink'=>"line鏈結",
                  'videoLink'=>"影片鏈結",'vr360Link'=>"360鏈結",
                );

    foreach($fields as $key => $value ){
      ?>
       <div class="col-md-3" style="width:30%;float:left;margin:0px 0px 0px 10px;">
         <label>{{$value}}</label>
        <input type="text" name="{{$key}}" value="<?php echo (!empty($post))?$post->$key:''?>"  >
       </div>
   <?php } ?>
   </div>

  </div>


  <label>內容</label>
  <textarea name="content" rows="8" cols="40" id="ckeditor" class="ckeditor" ><?php echo ($post)?$post->content:''?></textarea>

</div>






<style media="screen">
  label{
    font-size: 20px;
    font-weight: 600;
    margin: 8px 0px 8px 0px;
  }
</style>


<script type="text/javascript">
$("document").ready(function(){

  $("button.close2").click(function(){

        $('.user_id').attr('id' , $(this).attr('id'));
        // alert( $('.user_id').attr("id") );
  });




  $('#myModal').on('shown.bs.modal', function () {

        $('.user_id').attr('href',"/delDecoImage/"+$('.user_id').attr('id') );
  })

})
</script>
