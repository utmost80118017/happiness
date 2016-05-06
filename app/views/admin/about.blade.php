
@extends('layout.admin')

@section('content')
<script src="/ckeditor_base/ckeditor.js"></script>




        @include("layout.comm.head")

        <div class="container-fluid">
            <div class="row-fluid">
              {{Form::open(array('action' => 'PostController@postUpdate' ,"id"=>"tab","enctype"=>"multipart/form-data"))}}
              {{Form::hidden('id' ,$post->id ) }}
              <div class="btn-toolbar">

    <input type="submit" class="btn btn-primary"><i class="icon-save"></i> Save</button>

  <div class="btn-group">
  </div>
</div>

<div class="well">

    <div id="myTabContent" class="tab-content">

      <div class="tab-pane active in" id="home">
            @if ($errors->has())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </div>
            @endif

      <?php
      // print_r($cates);
      $cate_array = array();
      foreach($cates as $cate){
          $cate_array[$cate['id']]=$cate['name'];
      }
      ?>




                <input type="hidden" name="name" value="name" >
                <label>圖片</label>

                @if(!empty($post) && $post->image)
                <div class="col-md-1" style="wdith:200px;">

                    <a  href="#myModal" id="{{$post->id}}"  class="close2"  style="float:left;" data-toggle="modal" >×</button>

                    {{ HTML::image( "/public".$post->image , '' , array( 'class' => 'img-thumbnail',
                                                              "id" => $post->id ,
                                                              'style' =>  "width:200px;height:190px;")) }}



                @else
                  <input type="file" name="image" value="" class="input-xlarge">
                @endif




      <label>內容</label>
      <textarea name="content"   id="ckeditor" class="ckeditor" ><?php echo ($post)?$post->content:''?></textarea>

    </div>









    <script type="text/javascript">
    $("document").ready(function(){

      $("a").click(function(){

            $('.user_id').attr('id' , $(this).attr('id'));
            // alert( $('.user_id').attr("id") );
      });

      $('#myModal').on('shown.bs.modal', function () {

            $('.user_id').attr('href',"/delPostImage/"+$('.user_id').attr('id') );
      })

    })
    </script>


        {{ Form::close() }}
    </div>

</div>

<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Delete Confirmation</h3>
  </div>

  <div class="modal-body">
    <p class="error-text"><i class="icon-warning-sign modal-icon"></i>Are you sure you want to delete the user?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
    <button class="btn btn-danger" data-dismiss="modal">Delete</button>
  </div>
</div>





            </div>
        </div>


<script type="text/javascript">
         CKEDITOR.replace( 'content',
         {
          customConfig : 'config.js',
          toolbar : 'full'
          })
</script>


@stop
