<?php
session_start();
include("includes/db.php");
include_once 'connection.php';
include("functions/functions.php");
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>HungerPoint</title>
		<link rel="stylesheet" href="styles/style.css" media="all"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
<script type="text/javascript">
function checkLength(el) {
var W = document.forms[0]["msg"].value;
var regExp = new RegExp('^[0-9]+$');
var ret=true;
  if(!regExp.test(W) || W<50 || W>1000){
								document.getElementById('msg').style.visibility="visible";
								msg.innerHTML= 	";&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;!!!!Weight should be numeric value in Range 20 to 1000";
								ret=false;
	}else{
							document.getElementById('messageW').style.visibility="hidden";
      }
      return ret;

}

</script>
  <!-- Compiled and minified JavaScript -->

  <!-- HTML5 Speech Recognition API -->
  </head>

<body>
	
<?php

// Required if your environment does not handle autoloading
require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

if(isset($_POST["submit"]))
	{
  $msg = $_POST["msg"];
  $phonenum=$_POST["phn"];
  echo $msg,$phonenum ;

  // Your Account SID and Auth Token from twilio.com/console
  $sid = 'ACe5820459e2764f4339beedd5a1497d77';
  $token = 'dd47a315b5888f1e4f8655f1e17bddb8';
  $client = new Client($sid, $token);

  // Use the client to do fun stuff like send text messages!
  $client->messages->create(
      // the number you'd like to send the message to
    "'".$phonenum."'",
      array(
          // A Twilio phone number you purchased at twilio.com/console
          'from' => '+19529559853',
          // the body of the text message you'd like to send
          'body' => $msg
      )
  );
  $file = fopen("data.dat", "a") or die("Unable to open file!");
  $data = 'MSG :'.$msg.PHP_EOL ;
  echo $data."<br>";
  fwrite($file,$data);
  fclose($file);
  header("Location:helpLocations.php");
  exit();
  }

else{
?>
	<div class="container">
  <img src="images/Help.jpg" alt="logo" style="width:100%;">
  <div class="bottom-left">Bottom Left</div>
  	<div class="top-left">
		</div>
  <div class="top-right">
    <form action="" onsubmit="return validateForm()" method="post">
    <div class="container">
        <p>

  										
                      <label style="color:black; font-size:15pt" >Enter your Message:<span class="required"></span></label>
                    
  										<input type="text" name="msg" required/>
                      <label for="phonenum" style="color:black; font-size: 15pt" >Phone Number (format: xxxx-xxx-xxxx):</label><br/>
                      <input id="phonenum" name="phn" type="tel" pattern="^\d{4}-\d{3}-\d{4}$" required >
  			</p>
        <input type="submit" class="submitbutton" value="submit" name="submit" />
  </div>
</form>
	</div>
  <div class="bottom-right">Bottom Right
  </div>
  <div class="centered">

</div>
<?php } ?>
</body>
</html>
