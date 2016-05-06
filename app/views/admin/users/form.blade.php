<div class="tab-pane active in" id="home">

  @if ($errors->has())
  <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
          {{ $error }}<br>
      @endforeach
  </div>
  @endif

  
  <label>使用者名稱</label>
  <input type="text" name="username" value="<?php echo (!empty($user) )?$user->username:''; ?>" class="input-xlarge">

  <label>Email</label>
  <input type="text" name="email" value="<?php echo (!empty($user) )?$user->email:''; ?>" class="input-xlarge"

  <?php echo (!empty($user) )?'disabled="disabled" ':''; ?>
  >


   <?php if(empty($user) ){ ?>

      <label>密碼</label>
      <input type="password" name="password"    class="input-xlarge">

      <label>確認密碼</label>
      <input type="password" name="password2"  class="input-xlarge">
  <?php }?>


</div>
