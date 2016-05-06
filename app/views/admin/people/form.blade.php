<style media="screen">
  input{
    width: 500px;
  }
</style>

  <div class="tab-pane active in" id="home">
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif




  <label>付款方式1</label>
  <font style="color:red;">圖片檔案為_尺寸寬500px高320px</font>


  <br>
  @if(!empty($people) && $people->image)
  <div class="col-md-1" style="wdith:200px;">


      <button type="button" id="{{$people->id}}"  class="close2"  style="float:left;" >×</button>

      {{ HTML::image( "/public".$people->image ,'',array( 'class' => 'img-thumbnail',
                                          "id" => $people->id ,
                                          'style' =>  "width:200px;height:190px;")) }}
  </div>
  @else
    <input type="file" name="image" value="" class="input-xlarge">
  @endif

<br>
<br>
  <label>付款方式2</label>
  <font style="color:red;">圖片檔案為_尺寸寬282px高420px</font>
  <br>
  @if(!empty($people) && $people->image2)
  <div class="col-md-1" style="wdith:200px;">


      <button type="button" id="{{$people->id}}"  class="close3"  style="float:left;" >×</button>

      {{ HTML::image( "/public".$people->image2 ,'',array( 'class' => 'img-thumbnail',
                                          "id" => $people->id ,
                                          'style' =>  "width:200px;height:190px;")) }}
  </div>
  @else
    <input type="file" name="image2" value="" class="input-xlarge">
  @endif






 
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
      // $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd'});
      // alert('qq');
      $(".close2").click(function(){
            var html = $(this);
            var pic_id = html.attr('id') ;
            // $(this).clone().appendTo('.clone');
            // alert(pic_id);
            var r = confirm("確定刪除圖片!?");
            if (r == true) {

              $.post("/delPeopleImage1",
                    {"id":pic_id},
                    function(data){
                      // alert(data);
                      if(data==1){
                          location.reload();
                      }


                  });
            }

      });


      $(".close3").click(function(){
            var html = $(this);
            var pic_id = html.attr('id') ;
            // $(this).clone().appendTo('.clone');
            // alert(pic_id);
            var r = confirm("確定刪除圖片!?");
            if (r == true) {

              $.post("/delPeopleImage2",
                    {"id":pic_id},
                    function(data){
                      // alert(data);
                      if(data==1){
                          location.reload();
                      }


                  });
            }

      });

});
</script>
