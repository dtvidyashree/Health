<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>HungerPoint</title>
		<link rel="stylesheet" href="styles/style.css" media="all"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">

  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	</head>

<body>
	<!Main Container Starts here--->
	<div class="container">
  <img src="images/Help.jpg" alt="logo" style="width:100%;">
  <div class="bottom-left"></div>
  	<div class="top-left">
		</div>
  <div class="top-right">
				<a href="needHelp.php" class="button">Need Help!!!</a>
				<a href="login.php" class="button">I am a Counseller!!!</a>
	</div>
  <div class="bottom-right"></div>
  <div class="centered">

</div>
	<!Main Container Ends here--->
</body>
</html>
