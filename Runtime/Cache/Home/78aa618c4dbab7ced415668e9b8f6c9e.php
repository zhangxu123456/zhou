<?php if (!defined('THINK_PATH')) exit(); if (isset($error_warning)) { ?>
<div class="warning"><?php echo $error_warning; ?></div>
<?php } ?>
<div class="container">
<h1>选择支付方式</h1>

<div class="radio">
  <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$payment): $mod = ($i % 2 );++$i;?><ul class="clearfix text-center">
        <li class="col-sm-2 clearfix">
          <input type="radio" name="payment_method" value="<?php echo ($payment["payment_code"]); ?>" checked="checked" />
          <?php echo ($payment["payment_name"]); ?>
        </li>
        <li class="col-sm-2"> </li>
    </ul><?php endforeach; endif; else: echo "" ;endif; ?>
</div>

<div class="buttons text-center" style="padding-bottom:20px;">

    <input type="button" value="继续" id="button-payment-method" class="btn btn-primary btn-continue" />

</div>
</div>