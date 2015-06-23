<script type="text/javascript">
var interval;
var insults = ["Go ahead, tell them everything you know. It'll only take 10 seconds. ",
	"This is no battle of wits between you and me. I never pick on an unarmed man.",
	"I hope you step on a Lego!",
	"Let's play horse. I'll be the front end and you be yourself. ",
	"You seem to be a precociously boorish narcissist.",
	"Sometimes I don't know whether to laugh at you or pity you.",
	"You taking steroids?",
	"It's okay to feel what you are.",
	"It's okay, you're a joke all by yourself.",
	"Looks like I overestimated the number of your brain cells.",
	"Beta, tumse na ho paayega.",
	"I do have a life too, you know.",
	"With your IQ, I don't think you can understand.",
	"You're so dumb your IQ and shoe size are the same.",
	"Maybe it's in your genes.",
	"Are you sure you can type?"
	];
function set_hint(hint, type){
	if(type == 1){
		$("#comment_hint").html("<!--" + hint + " -->");
		$("#comment_hint").hide();
	}else if(type == 2){
		$("#hidden_hint").html(hint);
	}else{
		$("#comment_hint").html(" ");
		$("#comment_hint").hide();
		$("#hidden_hint").html(" ");

	}
};

function setUI(){
	var nick_session = "nick=<?php echo $_SESSION['nick']; ?>";
	$.ajax({
		type: "POST",
		url: "./get_question.php",
		data: nick_session,
		dataType:"json"
	}).done(function(msg) {
		if(msg[0].level.localeCompare("FINISH")==0){
			window.location = "./finish.php"
		}else{
			$("#level_status").html(msg[0].level);
			document.title = "<?php echo $_SESSION['nick']; ?> - Level " + msg[0].level;
			$("#qtitle").html(msg[0].qtitle);
			$("#image").attr("src","<?php echo IMG_PATH; ?>" + msg[0].image);
			set_hint(msg[0].hint,msg[0].hint_type);
			$("#score_status").html(msg[0].score);
			if(msg[0].skip == 0 || msg[0].level>20){
				$("#skip_status").html(msg[0].skip);
				$("#skip_submit").hide();
			}else{
				$("#skip_submit").show();
				$("#skip_status").html(msg[0].skip);
			}
		}
	});
};

function check_ans(answer){
	var data = "nick=<?php echo $_SESSION['nick']; ?>&" + "answer=" + answer;
	$.ajax({
		type: "POST",
		url: "./answer.php",
		data: data
	}).done(function(msg) {
		if(msg.localeCompare("TRUE") == 0){
			setUI();
		}else if(msg.localeCompare("FALSE") == 0){
			$("#answer_alert").html(insults[Math.floor((Math.random() * 15) + 0)]);
			$("#answer_alert").show();
		}else if(msg.localeCompare("LOGIN") == 0){
			window.location =  "./logout.php";
		}
	});
};

function log_ans(answer){
	var data = "nick=<?php echo $_SESSION['nick']; ?>&" + "answer=" + answer;
	$.ajax({
		type: "POST",
		url: "./log.php",
		data: data
	});
};


function skip(){
	$.ajax({
		type: "POST",
		url: "./skip.php",
		data: "nick=<?php echo $_SESSION['nick']; ?>"
	}).done(function(msg){
		if(msg.localeCompare("LOGIN") == 0){
			window.location =  "./logout.php";
		}else{
			setUI();
		}
	});
}

$(window).ready(function(){
	flasher();
	flash_msg();
	$("#answer_alert").hide();
	setUI();
	$("#answer_submit").click(function(){
		$("#answer_alert").hide();
		check_ans($("#ans").val());
		log_ans($("#ans").val());
		document.getElementById("ans").value="";
	});

	$("#skip_submit").click(function(){
		var conf = confirm("Are you sure you want to skip this question?");
		if (conf == true) {
			skip();
		}
	});

	$("#ans").keydown(function(event){
		if(event.keyCode == 13){
			event.preventDefault();
			$("#answer_submit").click();
		}
	});
});

function flasher(){
	$.ajax({
		type: "POST",
		url: "./flasher.php",
	}).done(function(msg){
		$("#flash_msg").html(msg);
	});
}

function flash_msg(msg){
	clearInterval(interval);
	interval = setInterval(function() {
		flasher();
	}, 20000);
}
</script>