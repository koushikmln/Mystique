<?php
include "config.php";
include "lib/password.php";
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
	$stmt->bind_result($result_id);
	$stmt->fetch();
	$id = $result_id + 10000;
	$txt = '<html><body>';
	$txt .= "Hello <b>".$name."</b>.";
	$txt .= "<p> Your Registration for Mystique 4.0 has been successfully completed.";
	$txt .= "<p> Your Registration ID is MYS15".$id;
	$txt .= "<p>May the Force Be With You.";
	$txt .= "<p>Regards,<br>Webmaster";
	$txt .= "</body></html>";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= "From: mystique@bitotsav.in";
	if(mail($to, $subject, $txt, $headers)){
		echo 'Your mail has been sent successfully.';
	} else{
		echo 'Unable to send email. Please try again.';
	}

	//Closing Connection
	$con = null;
}
?>