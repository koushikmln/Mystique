<?php
include 'config.php';
$name = $_POST['name'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$nick = $_POST['nick'];
$email = $_POST['email'];
$college = $_POST['college'];

try{
	$con = new PDO('mysql:dbname=SQL_DB;host=SQL_HOST', SQL_USER, SQL_PASS);
	//Check if Nick is Taken
	$stmt = $con->prepare("SELECT * FROM registration where nick = ?");
	$stmt->execute(array($nick))
	$row = $stmt->fetch();
	if($row){
		echo "Nick has Already Been taken.<br>Please Enter an Different Nick.";
		die();
	}else{
	//Insert into DB
	$stmt = $con->prepare('INSERT into registration(name,nick,password,email,college) VALUES(:name,:nick,:password,:email,:college');
	$stmt->execute( array('name' => $name, 'nick' => $nick, 'password'=>$password,'email'=>$email, 'college'=>$college) );
	echo "Registration Successful";

	//Mailer
	$stmt = $con->prepare("SELECT * FROM registration where nick = ?");
	$stmt->execute(array($nick))
	$row = $stmt->fetch();
	$to = $email;
	$subject = "Mystique Registration";
	$id = 10000+$row[0];
	$txt = "Hello".$name.<br>."Your Registration for Mystique has been successfully Completed.<br>Your Registration ID is MYS15".$id.
		   "<br>May the Force Be With You.<br>Regards,<br>Webmaster";
	$headers = "From: mystique@bitotsav.in";
	mail($to,$subject,$txt,$headers);
	//Closing Connection
	$con = null;
	}
}catch(PDOException $ex){
	echo "Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>