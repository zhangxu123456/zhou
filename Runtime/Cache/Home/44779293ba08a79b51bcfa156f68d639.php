<?php if (!defined('THINK_PATH')) exit(); if(isset($sm['error'])) { ?>
<div class="warning"><?php echo $sm['error']; ?></div>
<?php } ?>
<div class="container">


<h1>添加订单备注</h1>
<textarea name="comment" class="form-control"  rows="8" style="width: 98%;"><?php echo ((isset($comment) && ($comment !== ""))?($comment):""); ?></textarea>
<br />
<br />
<?php if (!isset($sm['error'])) { ?>
<div class="buttons">
  <div class="left text-center" style="padding-bottom:10px;">
    <input type="button" value="继续" id="button-shipping-method" class="btn btn-primary btn-continue" />
  </div>
</div>
<?php } ?>
</div>