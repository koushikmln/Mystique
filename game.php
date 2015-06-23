<?php
include 'config.php';
if(!isset($_SESSION['nick'])){
	header("Location: index.php");
}
else if(in_array($_SESSION['nick'], $bans)){
	echo "<script> alert('You have been banned. Please contact adm_nightstalker @ +91-8051119404 for further details');";
	echo "window.location = './logout.php';</script>";
}
?>
<html>
<head>
	<title><?php echo $_SESSION['nick']; ?> - Level <?php echo $_SESSION['level']; ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Mystique 4.0 2015">
	<meta name="author" content="Kanishka Ganguly, Koushik MLN">
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<?php include INCLUDE_PATH . "rules_modal.php"; ?>
</head>
<body>
	<div align="center">
		<?php
		if(in_array($_SESSION['nick'], $admins)){
			echo '<a style="float: left; position: absolute; left: 5%;" target="_blank" href="admin.php"><button id="sexyadmin" type="button" style="background:transparent;" class="btn btn-primary btn-lg">Admin</button></a>';
		}
		?>
		<a style="float: right; position: absolute; right: 35%;" target="_blank" href="https://apps.facebook.com/forumforpages/page/131461430229574"><button id="sexyforum" type="button" style="background:transparent;" class="btn btn-primary btn-lg">Forum</button></a>
		<a style="float: right; position: absolute; right: 20%;" target="_blank" href="leaderboard.php"><button id="sexyleader" type="button" style="background:transparent;" class="btn btn-primary btn-lg">Leaderboard</button></a>
		<a style="float: right; position: absolute; right: 10%;" href="logout.php"><button id="sexylogout2" type="button" style="background:transparent;" class="btn btn-primary btn-lg">Logout</button></a>
		<a style="float: right; position: absolute; right: 0;"><button id="sexyrules" type="button" style="background:transparent;" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#rules_modal">Rules</button></a>
	</div>
	<div class="container">
		<br><br><br><br><br><br>
		<div class="row clearfix">
			<div class="col-md-8 column">
				<div id="answer_alert" class="alert alert-danger" role="alert"></div>
				<div class="jumbotron" id = "main-box">
					<h1>
						<span id="qtitle"></span>
					</h1>
					<p>
						<center><img class="game-img" id="image" alt="Question" src="" style="max-width:100%;"></center>
					</p>
					<br>
					<p>
						<center>
							<input id="ans" name="ans" type="text" placeholder="Enter Answer" class="form-control input-md" required>
							<br>
							<button type="button" id="answer_submit" class="btn btn-primary">Submit Answer</button>
							<button type="button" id="skip_submit" class="btn btn-primary">Skip Question</button>
						</center>
					</p>
					<div id="hidden_hint" style="color:#EEEEEE;"></div>
				</div>
			</div>
			<div class="col-md-4 column">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							<strong>Now Playing</strong>
						</h3>
					</div>
					<div class="panel-body">
						Current Level: <strong><span style="color:#C51F1F; font-size:20pt;" id="level_status"></span></strong>
						<br>
						Score: <strong><span style="color:#C51F1F; font-size:20pt;" id="score_status"></span></strong>
						<br>
						Skips Left: <strong><span style="color:#C51F1F; font-size:20pt;" id="skip_status"></span></strong>
					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">
							<strong>A Word To The Wise</strong>
						</h3>
					</div>
					<div class="panel-body" id="flash" style="height:250px; overflow-y:scroll;">
						<strong><span id="flash_msg"></span></strong>
					</div>
				</div>		
			</div>		
		</div>
	</div>
	<div id="comment_hint"></div>
	<div id='footer'><div class='container' style='text-align: center'>&copy; Mystique 4.0, 2015</div></div>

	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/scaler.js"></script>
	<?php include 'js/set_question.php' ?>
</body>
</html>