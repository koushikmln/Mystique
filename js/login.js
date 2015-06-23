$(document).ready(function(){
	$("#login_alert").hide();
	$("#login_form").submit(function(event){
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: "login.php",
			data: $("#login_form").serialize()
		}).done(function(alert_msg){
			if(alert_msg.localeCompare("TRUE") == 0){
				window.location.replace("./game.php");
			}else{
				$("#login_alert").html(alert_msg);
				$("#login_alert").show();
			}
		});
	});
});