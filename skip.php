<?php
include "config.php";
if(isset($_SESSION['nick'])){
	$nick = $_POST['nick'];
	try{
		$con = new PDO('mysql:dbname='.SQL_DB.';host='.SQL_HOST,SQL_USER,SQL_PASS);
		$stmt = $con->prepare("SELECT * FROM game where nick = ?");
		$stmt->execute(array($nick));
		$row = $stmt->fetch();
		if(!$row){
			echo "Invalid Nick<br>";
		}else{
			if($row['skip']<SKIP && $row['level']<=MAX_SKIP_LEVEL){
				$row['skip']++;
				$row['level']++;
				$_SESSION['level'] = $row['level'];
				$stmt = $con->prepare('UPDATE game SET level=:level, skip=:skip WHERE nick=:nick');
				$stmt->execute( array('nick' => $nick, 'level'=>$row['level'],'skip'=>$row['skip']) );
			}else{
				echo "Skips Exceeded";
			}
			$con = null;
		}
	}catch(PDOException $ex){
		echo "Error!: " . $ex->getMessage() . "<br/>";
		$con = null;
		die();
	}
}else{
	echo "LOGIN";
}
?>