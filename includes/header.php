<head>
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>style.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>bootstrap.css" />
</head>
<body>
	<center>
		<div align="center" style='background:url(<?php echo IMAGE_URL . "type.png"; ?>);'>
			<a style='float: left; position: absolute; left: 0;' href="http://bitotsav.in" target="_blank"><img width="100%" style="padding:20px;" src="<?php echo IMAGE_URL; ?>bitotsav.png" /></a>
			<a style="text-decoration:none;" href="<?php echo SITE_URL; ?>" ><span style="text-decoration:underline;color:#1C2841;"><h2 id="title">mystIQue</h2></span></a>
		</div>
	</center>
	<table id="table">
		<tr>
			<td align="center" colspan="6"><div class="numbers" id="count2" style="padding: 5px 0 0 0; "></div></td>
		</tr>
		<tr id="spacer1">
			<td align="center" ><div class="numbers" ></div></td>
			<td align="center" ><div class="numbers" id="dday"></div></td>
			<td align="center" ><div class="numbers" id="dhour"></div></td>
			<td align="center" ><div class="numbers" id="dmin"></div></td>
			<td align="center" ><div class="numbers" id="dsec"></div></td>
			<td align="center" ><div class="numbers" ></div></td>
		</tr>
		<tr id="spacer2">
			<td align="center" ><div class="title" ></div></td>
			<td align="center" ><div class="title" id="days">Days</div></td>
			<td align="center" ><div class="title" id="hours">Hours</div></td>
			<td align="center" ><div class="title" id="minutes">Minutes</div></td>
			<td align="center" ><div class="title" id="seconds">Seconds</div></td>
			<td align="center" ><div class="title" ></div></td>
		</tr>
	</table>
	