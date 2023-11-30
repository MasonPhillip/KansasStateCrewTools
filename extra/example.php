<?php





echo $response;

?>

<style>

	body{
		background-color: #512888;
	}

	.centerBox{
		margin: auto;
		border: 3px solid #000;
		height: 200px;
		width: 375px;
		text-align: center;
		font-size: 30px;    
		font-weight: bold;                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       %;
	}

	.loginButton{
		margin-top:2%;
		font-weight: bold;
		height: 30px;
		width: 70px;
		background-color: #967bb6
	}
	.header{
		font-weight:bold;
		font-size:50px;
		font-family: "Times New Roman", Times, serif;
		text-align: center;
	}
</style>
<head>
		<title>Login</title>
</head>
			
<body>
	<div class="header">Kansas State Crew Utils App</div>
	<div class="centerBox">
		<div style="margin-top: 12%;">
			Name
			<input type="textbox" style="margin: auto; height: 30px;" id="nameBox" name="nameBox"> </input>
		</div>
		<div style = "margin-top:2% ;">
			Password
			<input type="password" style="height: 30px;" id="passwordBox" name="passwordBox"> </input>
		</div>
		<input type="button" class= "loginButton" value = "Login" onClick='loginAttempt()'> </input>
	</div>

</body>
<script>
	function loginAttempt(){
		var xhttp = new XMLHttpRequest();
		var password = document.getElementById("passwordBox").value;
		var name = document.getElementById("nameBox").value;
		var attempted = 0;
		xhttp.open("POST", "attemptLogin.php");
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhttp.onreadystatechange = () =>{
			if(xhttp.status === 200 && attempted < 2){
				alert(xhttp.responseText);
				attempted++;
				if(xhttp.responseText == "valid"){
					console.log('logged in');
				}
			}
		}
		xhttp.send("name="+name+"&password="+password);
		alert("1");
		
	}
</script>