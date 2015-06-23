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
			$stmt = $con->prepare("SELECT answer FROM questions where level = ?");
			$stmt->execute(array($row['level']));
			$question = $stmt->fetch();
			if(strcmp($question['answer'],$answer)==0){
				$row['score'] = $row['score'] + $row['level'] ;
				$row['level']++;
				$_SESSION['level'] = $row['level'];
				$stmt = $con->prepare('UPDATE game SET level=:level, score=:score WHERE nick=:nick');
				$stmt->execute( array('nick' => $nick, 'level'=>$row['level'],'score'=>$row['score']) );
				echo "TRUE";
			}else{
				echo "FALSE";
			}
			$con = null;
		}
	}catch(PDOException $ex){
		echo "Error!: " . $ex->getMessage() . "<br/>";
		die();
	}
}else{
	echo "LOGIN";
}
?>