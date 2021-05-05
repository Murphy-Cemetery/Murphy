<?php


?>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<meta charset="utf-8">
<title>Login</title>
	<style>
		.title {
			width: 100%;
			height: 75px;
			line-height: 75px;
			font-size: 2em;
			font-weight: 500;
			text-align: center;
			color: white;
			background-color: dimgray;
		}
		#container {
			display: flex;
			flex-direction: column;
			justify-content: space-around;
			text-align: center;
			margin: 0px auto 0px auto;
			padding: 15px 0px 5px 0px;
			background-color: antiquewhite;
			width: 400px;
		}
		form div {
			display: block;
			text-align:center;
			margin: 2px auto 2px auto;

		}
		form a:link, form a:hover, form a:visited {
			margin-left: auto;
			margin-right: auto;
			width: 60%;
			border: black 2px solid;
			background-color: darkgray;
			display: block;
			color: black;
			text-decoration: none;
		}
		form a:hover {
			background-color: lightgray;
		}
		.logout {
			margin-top: 20px;
		}
	</style>
	<script>
	
	</script>
</head>

<body>
	<div class = "title">Admin Area</div>
	<div id = "container">
		<form action = "" method = "post">
		<?php if (isset($_SESSION['validUser']) && $_SESSION['validUser']){ ?>
			<h3>You are logged in as admin<h3>
			<a href = "add.php">Add a Resident</a><br>
			<a href = "search.php">Search and Edit Residents</a>
			<div>
				<input type = "submit" name = "logout" value = "Logout" class = "logout">
			</div>
		<?php } else { ?>
			<div>
				<label for = "user_name">User Name </label><br>
				<input type = "text" name = "user_name">
			</div>
			<div>
				<label for = "user_password">Password</label><br>
				<input type = "password" name = "user_password">
			</div>
			<div>
				<input type = "submit" name = "login" value = "Login">
			</div>
			<?php if (isset($resident->errMessage)){?>
				<div><?php echo $resident->errMessage; ?></div>
			<?php }?>
		<?php } ?>
		</form>
	</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>