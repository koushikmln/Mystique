<?php
$targetYear = 2015;
$targetMonth = 3;
$targetDay = 14;
$targetHour = 19;
$targetMinute = 00;
$targetSecond = 00;
$dateFormat = "Y-m-d H:i:s";
$targetDate = mktime($targetHour, $targetMinute, $targetSecond, $targetMonth, $targetDay, $targetYear);
$actualDate = time();
$secondsDiff = $targetDate - $actualDate;
$remainingDay = floor($secondsDiff / 60 / 60 / 24);
$remainingHour = floor(($secondsDiff - ($remainingDay * 60 * 60 * 24)) / 60 / 60);
$remainingMinutes = floor(($secondsDiff - ($remainingDay * 60 * 60 * 24) - ($remainingHour * 60 * 60)) / 60);
$remainingSeconds = floor(($secondsDiff - ($remainingDay * 60 * 60 * 24) - ($remainingHour * 60 * 60)) - ($remainingMinutes * 60));
$targetDateDisplay = date($dateFormat, $targetDate);
$actualDateDisplay = date($dateFormat, $actualDate);
$dayName = date('l', $targetDate);
$monthName = date('F', $targetDate);

function displayTimer() {
  global $remainingDay, $remainingHour, $remainingMinutes, $remainingSeconds;
  echo "<div class='timer'><span id='days'>$remainingDay</span>Days</div><div class='vbar'></div>
			<div class='timer'><span id='hours'>$remainingHour</span>Hours</div><div class='vbar'></div>
			<div class='timer'><span id='minutes'>$remainingMinutes</span>Minutes</div><div class='vbar'></div>
			<div class='timer'><span id='seconds'>$remainingSeconds</span>Seconds</div>";
  ?>
  <script type="text/javascript">
    var days = <?php echo $remainingDay; ?>;
    var hours = <?php echo $remainingHour; ?>;
    var minutes = <?php echo $remainingMinutes; ?>;
    var seconds = <?php echo $remainingSeconds; ?>;
    function setCountDown()
    {
      seconds--;
      if (seconds < 0) {
        minutes--;
        seconds = 59;
      }
      if (minutes < 0) {
        hours--;
        minutes = 59;
      }
      if (hours < 0) {
        days--;
        hours = 23;
      }
      if (days == 0 && hours == 0 && minutes == 0 & seconds == 0)
      {
        document.getElementById("remain").innerHTML = "<div class='timer' style='width:100%;padding-top:50px;'><span style='font-size: 80px;'>Refresh to Login!</span></div>";

      }
      else
      {
		if($("#days").html() != days)
			$("#days").fadeOut(300,function (){
				$("#days").html(days).slideDown(300);
			});
        if($("#hours").html() != hours)
			$("#hours").fadeOut(300,function (){
				$("#hours").html(hours).slideDown(300);
			});
		if($("#minutes").html() != minutes)
			$("#minutes").fadeOut(300,function (){
				$("#minutes").html(minutes).slideDown(300);
			});
		if($("#seconds").html() != seconds)
			$("#seconds").fadeOut(300,function (){
				$("#seconds").html(seconds).slideDown(300);
			});
        setTimeout("setCountDown()", 1000);
      }

    }
    setCountDown();
  </script>
  <?php
}
