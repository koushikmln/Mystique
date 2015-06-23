$(document).ready(function(){
	$("#reg_alert").hide();
	$("#register_form").submit(function(event){
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: "register.php",
			data: $("#register_form").serialize()
		}).done(function(alert_msg){
			$("#reg_alert").html(alert_msg);
			$("#reg_alert").show();
		});
	});
});