<?php
include "config.php";
include "lib/password.php";
$nick = $_POST['nick'];
$password = $_POST['password'];
date_default_timezone_set ( 'Asia/Kolkata' );
$date = localtime();
$flag = false;

if($date[5]<START_YEAR){
	echo "Contest Has not Started.<br>";
	die();
}else if($date[5]>START_YEAR){
	$flag = true;
}else if($date[4]<START_MONTH){
	echo "Contest Has not Started.<br>";
	die();
}else if($date[4]>START_MONTH){
	$flag = true;
}else if($date[3]<START_DAY){
	echo "Contest Has not Started.<br>";
	die();
}else if($date[3]>START_DAY){
	$flag = true;
}else if($date[2]<START_HOUR){
	echo "Contest Has not Started.<br>";
	die();
}else if($date[2]>START_HOUR){
	$flag = true;
}else if($date[1]<START_MINUTES){
	echo "Contest Has not Started.<br>";
	die();
}else if($date[1]>START_MINUTES){
	$flag = true;
}else{
	$flag = true;
}

if($flag){
	try{
		$con = new PDO('mysql:dbname='.SQL_DB.';host='.SQL_HOST, SQL_USER, SQL_PASS);
		//Check if Nick is Exists
		$stmt = $con->prepare("SELECT * FROM registration where nick = ?");
		$stmt->execute(array($nick));
		$row = $stmt->fetch();
		if(!$row){
			echo "Invalid Nick<br>";
			die();
		}else{
		//Verify Password
			if(password_verify($password,$row[2])){
				$_SESSION['nick'] = $nick;
				$stmt2 = $con->prepare("SELECT level FROM game where nick = ?");
				$stmt2->execute(array($nick));
				$row2 = $stmt2->fetch();
				if(!$row2){
					$stmt3 = $con->prepare("INSERT INTO game (nick) VALUES (?)");
					$stmt3->execute(array($nick));
					$_SESSION['level'] = 1;
				}else{
					$_SESSION['level'] = $row2['level'];
				}
				echo "TRUE";
			}else{
				echo "Invalid Password";
				die();
			}
			$con = null;
		}
	}catch(PDOException $ex){
		echo "Error!: " . $ex->getMessage() . "<br/>";
		die();
	}
}else{
	echo "Contest Has not Started.<br>";
	die();
}
?>