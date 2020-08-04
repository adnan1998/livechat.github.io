<?php
	session_start();
?> 
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="homee.css">
	<title>Welcome to chatroom</title>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#ChatText").keyup(function(e){
				//when we press enter do
				if(e.keyCode==13){
					var ChatText=$("#ChatText").val();
					$.ajax({
						type: 'POST',
						url: 'InsertMessage.php',
						data:{ChatText:ChatText},
						success: function(){
							$("#ChatMessages").load("DisplayMessages.php");
							$("#ChatText").val("");
						}
					});
				}
			});
		
			setInterval(function(){  //refresh after 1500ms
			$("#ChatMessages").load("DisplayMessages.php");
			},1500);

			$("#ChatMessages").load("DisplayMessages.php");
		});
	</script>
</head>
<body>
	<center><h2 style="color: orange; font-family: tahoma; font-size: 30px;">Welcome <span><?php echo $_SESSION['UserName'];?></span></h2></center>
	<br><br>

	<div id="block">
		<div id="video">
			<iframe src="https://www.youtube.com/embed/tv" width="850" height="450">
				<p>your browser does not support iframe</p>
			</iframe> 
				
		</div>
		<div>
			<div id="ChatBig">
				<div id="ChatMessages" class="scrollbar">
				</div>
			</div>
			<div class="scrollbar" id="style1">
				<div class="force-overflow"></div>
			</div>
			<textarea id="ChatText" name="ChatText" placeholder="Type Message..."></textarea>
		</div>
	</div>
</body>
</html>