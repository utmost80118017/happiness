<div class="tab-pane active in" id="home">
  @if ($errors->has())
  <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
          {{ $error }}<br>
      @endforeach
  </div>
  @endif

  <label>標題</label>
  <input type="text" name="name" value="<?php echo (!empty($post))?$post->name:''?>" class="input-xlarge">

  <label>前台分類</label>
  <?php

  $ad_cate_list  = array( 1 => "共用",
                          2 => "米築首頁",
                          3 => "地產動態",
                          4 => "新案訊息",
                          5 => "生活美學",
                          6 => "人物觀點",
                          7 => "關於米築"
                      );

  ?>
  <select class="form-group" name="ad_main">
    @foreach($ad_cate_list as $key=> $lname)
      <option value="{{$key}}" <?php echo (!empty($post))?( $post->ad_main==$key ?' selected ':'') :''?>>{{$lname}}</option>
    @endforeach

  </select>

  <label>主分類</label>

  <select class="form-group" name="type">
      <option value="廣告" <?php echo (!empty($post))?($post->type=="廣告"?' selected ':'') :''?>>廣告</option>
      <option value="最新消息" <?php echo (!empty($post))?($post->type=="最新消息"?' selected ':'') :''?>>最新消息</option>
  </select>



</div>
