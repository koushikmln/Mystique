<?php include INCLUDE_PATH . "registration_modal.php"; ?>
<div id='footer'><div class='container' style='text-align: center'>&copy; Mystique 4.0, 2015</div></div>
<script src="<?php echo JS_URL; ?>jquery-1.9.1.min.js"></script>
<script src="<?php echo JS_URL; ?>bootstrap.js"></script>
<script src="<?php echo JS_URL; ?>timer.js"></script>
<script src="<?php echo JS_URL; ?>register.js"></script>
<script>
$(document).ready(function initializer () {
	countdown(year,month,day,hour,minute);
});
</script>
