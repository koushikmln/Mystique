<?php
include "config.php";
if(isset($_SESSION['nick'])){
	try{
		$nick = $_SESSION['nick'];
		$con = new PDO('mysql:dbname='.SQL_DB.';host='.SQL_HOST,SQL_USER,SQL_PASS);
		$stmt = $con->prepare("SELECT * FROM game where nick = ?");
		$stmt->execute(array($nick));
		$row = $stmt->fetch();
		if($row['level'] <= END_LEVEL){
			header('Location: '.SITE_URL);
		}
		else{
			?>
			<html>
			<head>
				<title>::MYSTIQUE 4.0::</title>
				<link href="css/bootstrap.css" rel="stylesheet">
				<link href="css/bootstrap-theme.min.css" rel="stylesheet">
				<style>
				body{
					padding-bottom: 40px;
					min-width: 960px;
					background: url("images/finish.jpg") no-repeat center center fixed;
					background-size: cover;
				}

				body::before {
					content: "";
					background-color: rgba(0,0,0,0.3);
					top: 0;
					left: 0;
					bottom: 0;
					right: 0;
					position: fixed;
					z-index: -1;   
				}
				#sexylogout2, #sexyforum, #sexyleader, #sexyadmin{
					color: #FFFFFF;
					font-size: 18pt;
					border-color: #CFCFCF;
					border-width: 1px;
					border-radius: 4px 4px 4px 4px;
					background-color: transparent;
					margin-right: 20px;
					margin-top: 10px;
				}
				</style>
			</head>
			<body>
				<div align="center">
					<?php
					if(in_array($_SESSION['nick'], $admins)){
						echo '<a style="float: left; position: absolute; left: 5%;" target="_blank" href="admin.php"><button id="sexyadmin" type="button" style="background:transparent;" class="btn btn-primary btn-lg">Admin</button></a>';
					}
					?>
					<a style="float: right; position: absolute; right: 25%;" target="_blank" href="https://apps.facebook.com/forumforpages/page/131461430229574"><button id="sexyforum" type="button" style="background:transparent;" class="btn btn-primary btn-lg">Forum</button></a>
					<a style="float: right; position: absolute; right: 10%;" target="_blank" href="leaderboard.php"><button id="sexyleader" type="button" style="background:transparent;" class="btn btn-primary btn-lg">Leaderboard</button></a>
					<a style="float: right; position: absolute; right: 0%;" href="logout.php"><button id="sexylogout2" type="button" style="background:transparent;" class="btn btn-primary btn-lg">Logout</button></a>
				</div>
				<div id="finish_bg">

				</div>
				<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
				<script type="text/javascript" src="js/bootstrap.js"></script>
			</body>
			</html>
			<?php
		}
	}catch(PDOException $ex){
		echo "Error!: " . $ex->getMessage() . "<br/>";
		die();
	}
}else{
	header('Location: '.SITE_URL);
}
?>