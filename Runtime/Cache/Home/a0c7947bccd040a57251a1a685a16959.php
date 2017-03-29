<?php if (!defined('THINK_PATH')) exit(); if ($addresses) { ?>
<ul class="clearfix">
<li class="col-sm-3 text-center" style="padding-top:20px;"><input type="radio" name="shipping_address" value="existing" id="shipping-address-existing" checked="checked" /></li>
<li class="col-sm-9"><label for="shipping-address-existing"><h3 style="color:#019ee3;">发票邮寄地址</h3></label></li>
</ul>
<div id="shipping-existing">
  <!-- selected="selected" -->
  <select name="address_id" style="width: 100%; margin-bottom: 15px;" size="5">
    <?php foreach ($addresses as $address) { ?>
    <?php if ($address['address_id'] == $address_id) { ?>
    <option value="<?php echo $address['address_id']; ?>">姓名：<?php echo $address['name']; ?>, 电话：<?php echo $address['telephone']; ?>,邮寄地址：<?php echo $address['address']; ?>,发票抬头：<?php echo $address['invoice']; ?></option>
    <?php } else { ?>
    <option value="<?php echo $address['address_id']; ?>">姓名：<?php echo $address['name']; ?>, 电话：<?php echo $address['telephone']; ?>, 邮寄地址： <?php echo $address['address']; ?> ,发票抬头：<?php echo $address['invoice']; ?></option>
    <?php } ?>
    <?php } ?>
  </select>
</div>
<ul class="clearfix">
    <li class="col-sm-3 text-center" style="padding-top:20px;"><input type="radio" name="shipping_address" value="new" id="shipping-address-new" /></li>
    <li class="col-sm-9"><label for="shipping-address-new"><h3 style="color:#019ee3;">新增修改发票抬头及地址</h3></label></li>
</ul>
<?php }else{ ?>
<input type="hidden" name="shipping_address" value="new" />
<?php } ?>
<div id="shipping-new" style="display: <?php echo ($addresses ? 'none' : 'block'); ?>; width:80%;margin:0 auto;">
  <table class="form">
      <div  class="form-group clearfix shipp-address-new">
          <li class="col-sm-2"><label>姓名</label></li>
          <li class="col-sm-4"><input type="text" name="name" value="" class="form-control" /></li>
      </div >

      <div  class="form-group clearfix">
          <li class="col-sm-2"><label>电话</label></li>
          <li class="col-sm-4"><input type="text" name="telephone" value="" class="form-control" /></li>
      </div >

      <div  class="form-group clearfix">
          <li class="col-sm-2"><label>邮寄地址</label></li>
          <li class="col-sm-4"><input type="text" name="address" value="" class="form-control" /></li>
      </div >

      <div  class="form-group clearfix">
          <li class="col-sm-2"><label>发票抬头</label></li>
          <li class="col-sm-4"><input type="text" name="invoice" value="" class="form-control" /></li>
      </div >
  </table>
</div>
<br />
<div class="buttons clearfix">
  <div class="center text-center" style="padding-bottom:10px;">
    <input type="button" value="继续" id="button-shipping-address" class="btn btn-primary" />
    <input type="button" value="跳过(不需要发票)" id="button-shipping-onaddress" class="btn btn-danger" />
  </div>
</div>
<script type="text/javascript">
$('#shipping-address input[name=\'shipping_address\']').live('change', function() {
	if (this.value == 'new') {
		$('#shipping-existing').hide();
		$('#shipping-new').show();
	} else {
		$('#shipping-existing').show();
		$('#shipping-new').hide();
	}
});
</script>