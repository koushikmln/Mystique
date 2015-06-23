<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="refresh" content="120">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Mystique - Leaderboard</title>
	<link rel='stylesheet' href='css/style.css'>
	<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
	<link rel='stylesheet' href='//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css'>
</head>

<body>
	<center>
		<h1 id="title"><span style="color:#FFFFFF;">Leaderboard</span></h1>
		<br><br><br>
		<div id="leader" style="width:80%;">
			<table id="userData" class="responsive table table-striped table-bordered" width="100%">
				<thead>
					<tr>
						<th><strong>Nick</strong></th>
						<th><strong>Level</strong></th>
						<th><strong>Score</strong></th>
					</tr>
				</thead>
				<tfoot>
					<tr>
						<th><strong>Nick</strong></th>
						<th><strong>Level</strong></th>
						<th><strong>Score</strong></th>
					</tr>
				</tfoot>
				<tbody>
					<?php
					
					try{
						$con = new PDO('mysql:dbname='.SQL_DB.';host='.SQL_HOST,SQL_USER,SQL_PASS);
						foreach($con->query('SELECT * FROM game ORDER BY score DESC, time ASC, level DESC ') as $row) {
							echo'<tr>';
							echo'<td>'.$row[0].'</td>';
							echo'<td>'.$row[1].'</td>';
							echo'<td>'.$row[2].'</td>';
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
	<script src="//cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#userData').DataTable({
			"bSort" : false
		});
	});
	</script>
</body>

</html>