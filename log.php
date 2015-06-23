<?php
include "config.php";
if(isset($_SESSION['nick'])){
	$nick = $_POST['nick'];
	$answer = $_POST['answer'];
	try{
		$con = new PDO('mysql:dbname='.SQL_DB.';host='.SQL_HOST,SQL_USER,SQL_PASS);
	//Check if Nick Exists
		$stmt = $con->prepare("SELECT * FROM game where nick = ?");
		$stmt->execute(array($nick));
		$row = $stmt->fetch();
		if(!$row){
			echo "Invalid Nick<br>";
		}else{
			$stmt = $con->prepare("INSERT INTO logs(nick,level,answer) VALUES(:nick, :level, :answer)");
			$stmt->execute(array('nick' => $nick, 'level'=>$row['level'],'answer'=>$answer));
			$con = null;
		}
	}catch(PDOException $ex){
		echo "Error!: " . $ex->getMessage() . "<br/>";
		die();
	}
}else{
	echo "Please Login";
}
?>