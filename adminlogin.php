<?php
include "config.php";
include "lib/password.php";
$nick = $_POST['nick'];
$password = $_POST['password'];
if(in_array($nick, $admins)){
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
	echo "Invalid Login";
}
?>