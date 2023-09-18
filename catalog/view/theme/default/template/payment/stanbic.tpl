<form action="<?php echo $action; ?>" method="post" id="upay_form" name="upay_form">
  <input type="hidden" name="mercId" value="<?php echo $mercId; ?>">
  <input type="hidden" name="currCode" value="566">
  <input type="hidden" name="amt" value="<?php echo $amount ; ?>">
  <input type="hidden" name="orderId" value="<?php echo $orderid ; ?>">
  <input type="hidden" name="prod" value="<?php echo $prod ; ?>">
  <input type="hidden" name="email" value="<?php echo $email ; ?>">
  <div class="buttons">
    <div class="right">
      <input type="button" value="<?php echo $button_confirm; ?>" id="button-confirm" class="button" />
    </div>
  </div>
</form>
<script type="text/javascript"><!--
$('#button-confirm').bind('click', function() {
	$.ajax({ 
		type: 'get',
		url: 'index.php?route=payment/stanbic/confirm',
		success: function() {
			document.forms["upay_form"].submit();
		}		
	});
});
//--></script> 
