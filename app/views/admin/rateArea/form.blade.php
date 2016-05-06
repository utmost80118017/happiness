  <div class="tab-pane active in" id="home">
        @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </div>
        @endif



  <label>名稱</label>
  <input type="text" name="name" value="<?php echo (!empty($post))?$post->name:''?>" class="input-xlarge">

  <label>名稱(英文)</label>
  <input type="text" name="title" value="<?php echo (!empty($post))?$post->title:''?>" class="input-xlarge">

  <label>前台顯示</label>
  是
  <input type="radio" class="flag" name="flag" value="1" <?php echo (!empty($post))?($post->flag==1)?" checked":"" :''?>  >
  否
  <input type="radio" class="flag" name="flag" value="0" <?php echo (!empty($post))?($post->flag==0)?" checked":"" :''?> >


</div>


<script type="text/javascript">
  $("document").ready(function(){





  });
</script>
