<?php if (!defined('THINK_PATH')) exit();?><div class="left col-md-6 col-sm-6 col-xs-12">
  <h2 style="color:#337ab7">新顾客</h2>
  <h2 style="font-size:16px;">如没有登录账号,请先注册，如果已经注册，右边登录</h2>
  <label for="register">
    <input type="radio" name="account" value="register" id="register" checked="checked" />
    <b>注册购买</b></label>
  <br />
  <input type="button" value="点击注册" id="button-account" class="btn btn-primary" />
  <br />
  <br />
</div>
<div id="login" class="right col-md-6 col-sm-6 col-xs-12">
  <h2 style="color:#337ab7">登录</h2>
  <ul class="clearfix">
     <li class="col-sm-3"><h4 class="h4">用户名：</h4></li>
     <li class="col-sm-8"><input type="text" name="uname" value="" class="text form-control"></li>
  </ul>
  <ul class="clearfix">
    <li class="col-sm-3"><h4 class="h4">密码：</h4></li>
    <li class="col-sm-8"><input type="password" name="password" value="" class="text form-control"></li>
  </ul>
  <ul class="clearfix">
    <li class="col-sm-3"><h4 class="h4">验证码：</h4></li>
    <li class="col-sm-4"><input type="text" name="code" class="form-control" id="inputEmail3" placeholder="验证码"></li>
    <li class="col-sm-4"><img class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('Public/verify');?>" width="120"></li>
  </ul>
  <br/>
  <ul class="clearfix">
    <li class="col-sm-3"><a class="forgotten" href="<?php echo U('/forgot');?>" style="color:#337ab7"><h4>忘记密码</h4></a></li>
    <li class="col-sm-3"></li>
    <li class="col-sm-3"><input type="button" value="登录" id="button-login" class="btn btn-primary" /></li>
  </ul>

</div>
<style>
  .verifyimg{cursor:pointer;}
</style>
<script>
  //刷新验证码
  var verifyimg = $(".verifyimg").attr("src");
    $(".reloadverify").click(function(){
        if( verifyimg.indexOf('?')>0){
            $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
        }else{
            $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
        }
    }); 
</script>