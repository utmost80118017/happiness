<div class="sidebar-nav">
    <!-- <form class="search form-inline">
        <input type="text" placeholder="Search...">
    </form> -->

    <a href="#dashboard-menu" class="nav-header" data-toggle="collapse"><i class="icon-dashboard"></i>Dashboard</a>

    <ul id="dashboard-menu" class="nav nav-list collapse in">


        <li  @if($active=="工程進度")   class="active" @endif ><a href="/posts">工程進度</a></li>

        <li  style="display:none;" @if($active=="rates")  class="active" @endif ><a href="/rates">新案訊息</a></li>
        <li  style="display:none;" @if($active=="rateArea")   class="active" @endif ><a href="/rateAreas">新案分區選單</a></li>
        <li  style="display:none;" @if($active=="layout")   class="active" @endif ><a href="/layout">新案分區選單</a></li>



        <li   style="display:none;" @if($active=="生活美學")   class="active" @endif ><a href="/decos">付款方式</a></li>
        <li  @if($active=="apeople")   class="active" @endif ><a href="/people/1">付款方式</a></li>
        <li style="display:none;"  @if($active=="關於米築")   class="active" @endif ><a href="/post/3?category_id=24">關於米築</a></li>
        <li   style="display:none;" @if($active=="廣告")   class="active" @endif ><a href="/adlist">廣告</a></li>

        <li  @if($active=="users") class="active" @endif ><a href="/users">使用者</a></li>



        <?php
        $cates=DB::table("categories")->where("type","最新消息")->get();
        ?>
        @foreach($cates as $case)
          @if($case->id ==99999)
              <li  @if($active==$case->name) class="active" @endif ><a href="/posts/{{$case->id}}">{{$case->name}}</a></li>
          @endif
        @endforeach







        <li  @if($active=="cates") class="active" @endif  style="display:none;"><a href="/categories">分類</a></li>
        <li  @if($active=="admin_news") class="active" @endif style="display:none;" ><a href="/rates">地產動態</a></li>
        <li  @if($active=="mail") class="active" @endif style="display:none;" ><a href="/mailcontents">設定郵件</a></li>
        <li  @if($active=="explode") class="active" @endif style="display:none;" ><a href="/explode">瀏覧人數</a></li>
    </ul>
<!--
    <a href="#accounts-menu" class="nav-header" data-toggle="collapse"><i class="icon-briefcase"></i>Account<span class="label label-info">+3</span></a>
    <ul id="accounts-menu" class="nav nav-list collapse">
        <li ><a href="sign-in.html">Sign In</a></li>
        <li ><a href="sign-up.html">Sign Up</a></li>
        <li ><a href="reset-password.html">Reset Password</a></li>
    </ul>

    <a href="#error-menu" class="nav-header collapsed" data-toggle="collapse"><i class="icon-exclamation-sign"></i>Error Pages <i class="icon-chevron-up"></i></a>
    <ul id="error-menu" class="nav nav-list collapse">
        <li ><a href="403.html">403 page</a></li>
        <li ><a href="404.html">404 page</a></li>
        <li ><a href="500.html">500 page</a></li>
        <li ><a href="503.html">503 page</a></li>
    </ul>

    <a href="#legal-menu" class="nav-header" data-toggle="collapse"><i class="icon-legal"></i>Legal</a>
    <ul id="legal-menu" class="nav nav-list collapse">
        <li ><a href="privacy-policy.html">Privacy Policy</a></li>
        <li ><a href="terms-and-conditions.html">Terms and Conditions</a></li>
    </ul>

    <a href="help.html" class="nav-header" ><i class="icon-question-sign"></i>Help</a>
    <a href="faq.html" class="nav-header" ><i class="icon-comment"></i>Faq</a>
  -->
</div>
