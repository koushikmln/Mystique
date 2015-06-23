<?php
include "config.php";
if (isset($_SESSION['nick'])) {
	$nick = $_POST['nick'];
	try{
		$con = new PDO('mysql:dbname='.SQL_DB.';host='.SQL_HOST,SQL_USER,SQL_PASS);
		$stmt = $con->prepare("SELECT * FROM game where nick = ?");
		$stmt->execute(array($nick));
		$row = $stmt->fetch();
		if(!$row){
			echo "Invalid Nick<br>";
			die();
		}else{
			$json = array();
			if($row['level']<=END_LEVEL){
				$stmt = $con->prepare("SELECT * FROM questions where level = ?");
				$stmt->execute(array($row['level']));
				$question = $stmt->fetch();
				if($question){
					$ques = array(
						"level"=> $question[0],
						"qtitle"=>$question[1],
						"image"=>$question[2],
						"hint"=>$question[4],
						"hint_type"=>$question[5],
						"score"=>$row['score'],
						"skip"=>(SKIP - $row['skip'])
						);
					array_push($json,$ques);
					echo json_encode($json);
				}else{
					echo "Database Error";
				}
			}else{
				$ques = array("level"=>"FINISH");
				array_push($json,$ques);
				echo json_encode($json);
			}
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