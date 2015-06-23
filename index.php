<?php include 'config.php'; ?>
<html>
<?php include INCLUDE_PATH . "header.php"; ?>

<br>
<center>
	<?php
	if(isset($_SESSION['nick'])){
		echo '<a href="game.php"><button id="sexycontinue" type="button" class="btn btn-primary btn-lg">Continue</button></a>';
		echo '<a href="logout.php"><button id="sexylogout" type="button" class="btn btn-primary btn-lg">Logout</button></a>';
	}else{
		echo '<button id="sexyregistration" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#reg_modal"> Register Now</button>';
		echo '<button id="sexylogin" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#login_modal"> Login</button>';
	}
	?>
</center>
<?php include INCLUDE_PATH . "footer.php"; ?>
</body>
</html>