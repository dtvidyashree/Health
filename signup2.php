<?php 
		session_start(); 
		require_once 'connection.php';
		// $CID = $_SESSION['customers'];
		// if(!isset($CID))
		// {
		// 	header("Location: ../Perfume/index.php");
		// }
		// $CFName = $_SESSION['customerFirstName'];
		$IDnum = $_POST['abd'];
		echo $IDnum;

///////////////////redirect to home page//////////////////
?>

<html>
    <body>
    	<div class="container" style="margin-top: 40px;">
		<div class="heading text-center" style="height: 50px; border-bottom: 2px solid grey; z-index: 999">HELPPOINT</div> 
    	<div class="heading2 text-left" style="margin-bottom: 50px;">
    		REGISTRATION
			</div>
				<?php
				if (isset($_POST['submit']))
				{
					echo "<h3>System Response:</h3>";
                    //set these 3 variables to true 
					$ok = true;
					$test = true;
					$pass = trim($_POST['pass']);
                    //check password not empty
					if(!isset($_POST['pass']) || $_POST['pass'] === '')
					{
						echo "<p class='errors'>* Password cannot be empty!</p>";
						$ok = false;
						$test =false;
					}
                    //pass length
					if((strlen($pass)) < 5 || (strlen($pass) > 15))
					{
                        //check password from 6 to 16 chars
						echo "<p class='errors'>* Password should be between 5-15 charactures</p>";
						$ok = false;
						$test =false;
					}
					if(!isset($_POST['abd']) || $_POST['abd'] === '')
					{
                        //customer ID not empty check
						echo "<p class='errors'>*  customer ID can't be empty!</p>";
						$ok = false;
						$test =false;
					}
					if(!isset($_POST['cfn']) || $_POST['cfn'] === '')
					{
                        //first name not empty
						echo "<p class='errors'>* Customer First Name can't be empty!</p>";
						$ok = false;
						$test =false;
					}
					if(!isset($_POST['cln']) || $_POST['cln'] === '')
					{
                        //customer last name not empty
						echo "<p class='errors'>* Customer Last Name can't be empty!</p>";
						$ok = false;
						$test =false;
					}
					if(!isset($_POST['pnum']) || $_POST['pnum'] === '')
					{
                        //customer phone number not empty
						echo "<p class='errors'>* Phone Number can't be empty!</p>";
						$ok = false;
						$test =false;
					}
                    if(!isset($_POST['cadd']) || $_POST['cadd'] === '')
					{
                        //customer phone number not empty
						echo "<p class='errors'>* Address can't be empty!</p>";
						$ok = false;
						$test =false;
					}
                    if(!isset($_POST['pcode']) || $_POST['pcode'] === '')
					{
                        //address not empty
						echo "<p class='errors'>* Postal Code field can't be empty!</p>";
						$ok = false;
						$test =false;
					}
                    if(!isset($_POST['email']) || $_POST['email'] === '')
					{
                        //email not empty
						echo "<p class='errors'>* Email field cannot't be empty!</p>";
						$ok = false;
						$test =false;
                    }
                        
                    //ok is true proceed
					if ($ok)
					{			
						$PASS = mysqli_real_escape_string($conn, $_POST['pass']);
						$CID = mysqli_real_escape_string($conn, $_POST['abd']);
						$CFN = mysqli_real_escape_string($conn, $_POST['cfn']);
						$CLN = mysqli_real_escape_string($conn, $_POST['cln']);
						$PNUM = mysqli_real_escape_string($conn, $_POST['pnum']);
						$EMAIL = mysqli_real_escape_string($conn, $_POST['email']);
						$CADD = mysqli_real_escape_string($conn, $_POST['cadd']);
                        $STATE = mysqli_real_escape_string($conn, $_POST['state']);
                        $CITY = mysqli_real_escape_string($conn, $_POST['city']);
                        $PCODE = mysqli_real_escape_string($conn, $_POST['pcode']);
                        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
                        
                        //insert into tables
                        ?>
                        <?php 
						$query = "INSERT INTO login (counselorID, password) 
                        VALUES ('$CID', '$PASS');
                        INSERT INTO counselor (CounselorID, CounselorLastName, CounselorFirstName, phone,addressLine1, city, state,postalCode, country, gender, email)
                        VALUES ('$CID', '$CLN', '$CFN', '$PNUM', '$CADD', '$CITY', '$STATE', '$PCODE','United States', '$gender', '$EMAIL')";
                        if(mysqli_multi_query($conn, $query))
						{
							echo "Successfully Registered!";
							$test = true;
						}
						else
						{
							echo "<p class='errors'>* This user ID is already exists, please try anothor user ID</p>";
							$test = false;
						}
                    }
					////////////////// redirect to home page //////////////////
                    
                    if ($test == true)
                    { 
                         header("Location: Thankyousupport.php");
                    }
         				//close connection
					mysqli_close($conn);
				}
				
            ?>
    </body>
</html>