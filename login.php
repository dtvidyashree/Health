<?php
session_start();
include_once 'connection.php';


if(isset($_SESSION['user'])!="")
{
    //logout
	header("Location: home/logout.php?logout");
}

if(isset($_POST['login']))
{
        /////////////////login////////////////

	$UName = mysqli_real_escape_string($conn, $_POST['UName']);
	$UPass = mysqli_real_escape_string($conn, $_POST['UPass']);
	$UName = trim($UName);
	$UPass = trim($UPass);
    //store uname in $Uname variable
	$Name = $_POST['UName'];
    
    
       //////////////////find user in database//////////////
	$query = "SELECT login.CounselorID
				from login , counselor
				where login.CounselorID =counselor.CounselorID";
	$result = mysqli_query($conn,$query);
	print($CounselorID);
    
    if (!$result) 
	{
    printf("Error: %s\n", mysqli_error($conn));
    exit();
	}
    
	$row=mysqli_fetch_array($result);
    //make sure only one user is fetched for security purposes(dont open another customers page)
	$count = mysqli_num_rows($result);
    //now check all data is correct to proceed to home page
    	if($count == 1 && $row['password']==$UPass)
	{
		$CID = $Name;
        //ses sql = store customer info here
		$ses_sql=mysqli_query($conn,"select * from login where CounselorID='$CID'");
		$row_sql=mysqli_fetch_array($ses_sql);
        //return number of rows if 1 start session
		$count_sql = mysqli_num_rows($ses_sql);
        //start session
		if($count_sql == 1)
		{
			$_SESSION['CounselorFirstName'] = $row_sql['CounselorFirstName'];
		}
	
		$_SESSION['counselor'] = $CID;
        //echo $CID;
		header("Location: Thankyousupport.php");
	}
	else
	{
		?>
			<script>alert('Username or Password is incorrect!');</script>
        <?php
	}

}


    /////////////////////signup//////////////////////////

if(isset($_POST['signup']))
{
    header("Location: signup.php");

}

    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>login page</title>
	<link rel="stylesheet" type="text/css" href="cssTemplate.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:700">
	<body>

		<div class="output-sizer">
			<div id="result_div" class="result">
				<iframe id="iFrameKey-43f1bfd6-440f-a7df-7f64-8b46d71638e2" src="https://s.codepen.io/boomerang/iFrameKey-43f1bfd6-440f-a7df-7f64-8b46d71638e2/index.html" name="CodePen" allowfullscreen="true" sandbox="allow-scripts allow-pointer-lock allow-same-origin allow-popups allow-modals allow-forms" allow="geolocation; microphone; camera; midi; vr" allowtransparency="true" class="result-iframe">
				</iframe>

				<!DOCTYPE html>
				<html lang="en" class="-webkit-">
				<head>
					<script src="//production-assets.codepen.io/assets/editor/live/console_runner-079c09a0e3b9ff743e39ee2d5637b9216b3545af0de366d4b9aad9dc87e26bfd.js"></script>
					<script src="//production-assets.codepen.io/assets/editor/live/events_runner-73716630c22bbc8cff4bd0f07b135f00a0bdc5d14629260c3ec49e5606f98fdd.js"></script>
					<script src="//production-assets.codepen.io/assets/editor/live/css_live_reload_init-2c0dc5167d60a5af3ee189d570b1835129687ea2a61bee3513dee3a50c115a77.js"></script>
					<meta charset="UTF-8">
					<meta name="robots" content="noindex">
					<link rel="shortcut icon" type="image/x-icon" href="//production-assets.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico">
					<link rel="mask-icon" type="" href="//production-assets.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111">
					<link rel="canonical" href="https://codepen.io/innerstorm/pen/nagFi">
					<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
					<style class="cp-pen-styles">
				</style>
			</head>
			<body>
				<div id="bg"></div>
				<form action>
					<label for= "UName"><b> UserID </b></label>
					<input type ="text" name id placeholder="CounselorID" class = "CounselorID" required>
					<label for= "UPass"><b> Password </b></label>
					<input type="password" name="" id="" placeholder="password" class="pass" style="cursor: auto;" required>
					<a href="Thankyousupport.php" class="button">login</a>
					<a href="signup.php" class="button">signup</a>
					</form>
				</div>
		</div>

		
	</body>
	</head>
	</html>