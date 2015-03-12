<?php
include "config.php";
$name = $_POST['name'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$nick = $_POST['nick'];
$email = $_POST['email'];
$college = $_POST['college'];
$con = new mysqli(SQL_HOST, SQL_USER, SQL_PASS, SQL_DB);
	//Check if Nick is Taken
$stmt = $con->prepare("SELECT nick FROM registration where nick = ?");
$stmt->bind_param("s", $nick);
$stmt->execute();
$stmt->bind_result($result_nick);
$stmt->fetch();
if($result_nick){
	echo "Nick <b>".$result_nick."</b> has Already Been taken.<br>Please Enter an Different Nick.";
	die();
}else{
	//Insert into DB
	$stmt = $con->prepare('INSERT into registration(name,nick,password,email,college) VALUES(?,?,?,?,?)');
	$stmt->bind_param("sssss", $name, $nick, $password, $email, $college);
	$stmt->execute();
	echo "Registration Successful. Please Check Email For Confirmation.";
	//Mailer
	$stmt = $con->prepare("SELECT id FROM registration where nick = ?");
	$stmt->bind_param("s", $nick);
	$result = $stmt->execute();
	$to = $email;
	$subject = "Mystique Registration";
	$stmt->fetch();
	$stmt->bind_result($result_id);
	$id = 10000+$result_id;
	$txt = "Hello ".$name."<br> Your Registration for Mystique has been successfully Completed.<br>Your Registration ID is MYS15".$id.
	"<br>May the Force Be With You.<br>Regards,<br>Webmaster";
	$headers = "From: mystique@bitotsav.in";
	mail($to,$subject,$txt,$headers);
	//Closing Connection
	$con = null;
}
?>