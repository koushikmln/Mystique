<?php
include 'config.php';
if(in_array($_SESSION['nick'], $admins)){
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta http-equiv="refresh" content="120">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mystique - Admins</title>
		<link rel='stylesheet' href='css/style.css'>
		<link rel='stylesheet' href='css/bootstrap.min.css'>
		<link rel='stylesheet' href='js/dataTables.bootstrap.css'>
	</head>

	<body>
		<div align="center">
			<a style="float: right; position: absolute; right: 10%;" href="logout.php"><button id="sexylogout2" type="button" style="background:transparent;" class="btn btn-primary btn-lg">Logout</button></a>
			<a style="float: right; position: absolute; right: 0;" href="<?php echo SITE_URL?>"><button id="sexyrules" type="button" style="background:transparent;" class="btn btn-primary btn-lg">Game</button></a>
		</div>
		<center>
			<h1 id="title"><span style="color:#FFFFFF;">Admin Panel</span></h1>
			<br><br><br>
			<div id="leader" style="width:80%;">
				Flash Message:&nbsp;&nbsp;<input style="color:#000000;" type="text" id="msg" name="msg" class="form-control input-md"><button style="color:#000000;" id="send_flash" name="flash" class="btn btn-default">Flash Message</button>
				<br><br><br>
				<table id="userData" class="responsive table table-striped table-bordered" width="100%">
					<thead>
						<tr>
							<th><strong>Name</strong></th>
							<th><strong>Nick</strong></th>
							<th><strong>Level</strong></th>
							<th><strong>Answer</strong></th>
							<th><strong>Time Attempted</strong></th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th><strong>Name</strong></th>
							<th><strong>Nick</strong></th>
							<th><strong>Level</strong></th>
							<th><strong>Answer</strong></th>
							<th><strong>Time Attempted</strong></th>
						</tr>
					</tfoot>
					<tbody>
						<?php
						include 'config.php';
						try{
							$con = new PDO('mysql:dbname='.SQL_DB.';host='.SQL_HOST,SQL_USER,SQL_PASS);
							foreach($con->query(' SELECT registration.name, logs.nick, logs.level, logs.answer, logs.time FROM logs INNER JOIN registration on logs.nick=registration.nick ORDER BY time DESC') as $row) {
								echo'<tr>';
								echo'<td>'.$row[0].'</td>';
								echo'<td>'.$row[1].'</td>';
								echo'<td>'.$row[2].'</td>';
								echo'<td>'.$row[3].'</td>';
								echo'<td>'.$row[4].'</td>';
								echo'</tr>';
							}
						}catch(PDOException $ex){
							echo "Error!: " . $ex->getMessage() . "<br/>";
							die();
						}
						?>
					</tbody>
				</table>
			</div>
		</center>
		<script src="js/jquery-1.9.1.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/dataTables.bootstrap.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			$('#userData').DataTable({
			});

			$('#send_flash').click(function(){
				data="msg=" + $("#msg").val();
				var conf = confirm("Are you sure you want to flash" + $("#msg").val() + "?");
				if (conf == true) {
					$.ajax({
						type: "POST",
						url: "set_flasher.php",
						data: data
					});
					$("#msg").val("");
				}
			});
		});
		</script>
	</body>
	</html>
	<?php
}else{
	header('Location: '.SITE_URL);
}
?>