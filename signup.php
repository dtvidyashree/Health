<?php 
        session_start(); 
        include_once 'connection.php';
//      $CID = $_SESSION['customers'];
//      if(!isset($CID))
//      {
//          header("Location: ../home/index.php");
//      }
//      $CFName = $_SESSION['customerFirstName'];

///////////////////redirect to home page//////////////////
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
                <div id= "bg"></div>
                <form action="signup2.php" method="post"  enctype="multipart/form-data" >
                <label for="cfn"><b> REGISTERATION FOR COUNSELOR </b> </label>  
                <label for="cid"><b> Donator ID: </b> </label> 
                        <?php
                        $getCustomerIdQuery ="SELECT counselor.CounselorID
                            from counselor 
                            order by counselor.CounselorID DESC
                            LIMIT 1" ;
                        $getCustomerIdResult = mysqli_query($conn, $getCustomerIdQuery);
                        $getCustomerIdRow = mysqli_fetch_array($getCustomerIdResult);

                        if($getCustomerIdRow){
                            $insertCustId = $getCustomerIdRow[0] +1;

                        }
                        mysqli_query($conn, $insertCustId);
                        ?>
                        <?php echo $insertCustId; ?> 
                    <input type="text" id="abd" name="abd">
                    <script type="text/javascript">
                        document.getElementById('abd').value=<?php echo $insertCustId;?>;
                        
                    
                    </script>
                    <br><br>
                        <label for="cfn"><b>  First Name: </b> </label>
                        <input type="text" name="cfn" id="cfn" maxlength="30">
                    <br><br>
                        <label for="cln"><b> Last Name: </b></label>
                        <input type="text" name="cln" id="cln" maxlength="30">
                    <br><br>
                        <label for="pnum"><b>  Phone Number: </b></label>
                        <input type="text" name="pnum" id="pnum" placeholder="000000000000" maxlength="12">
                    <br><br>
                        <label for="cadd"><b>  Address: </b></label>
                        <input type="text" name="cadd" id="cadd"  placeholder = "5600 City Ave">
                    <br><br>
                        <label for="state"><b>  State: </b></label>
                        <select name="state" id="state">
                            <option selected disabled>Choose a state</option>
                            <option>PA</option>
                        </select>
                    <br><br>
                        <label for="city"><b>  City: </b></label>
                        <select name="city" id="city">
                            <option selected disabled>Choose a city</option>
                            <option>PHILADELPHIA</option>
                            <option>Harrisburg</option>
                            <option>Pittsburgh</option>
                            <option>Erie</option>
                            <option>Allentown</option>
                            <option>Lehigh</option>
                            <option>Lancaster</option>
                            <option>Scranton</option>
                            <option>West Chester</option>
                            <option>Altoona</option>
                            <option>New Hope</option>
                        </select>
                    <br><br>
                        <label for="pcode"><b>  Postal Code: </b></label>
                        <input type="text" name="pcode" id="pcode"  placeholder = "19131">
                    <br><br>
                        <label for="gender"><b>  Gender: </b></label>
                        <select name:"Gender" id= "gender">
                            <option selected disabled>Choose</option>
                             <option>M</option>
                            <option>F</option>
                            <option>L</option>
                        </select>
                        
                    <br><br>
                        <label for="email"><b>  Email: </b></label>
                        <input type="email" name="email" id="email" placeholder="example@example.com">
                        <label id="emailError"> </label>
                    <br><br>
                    <label for="pass"><b>  Password: </b></label>
                        <input type="password" name="pass" id="pass">
                        <small><label> Password should be between 5-15 characters</label></small>
                    <br><br>                    
                    <input class="w3-button w3-black" type="submit" name="submit" value="Submit">  
                    <br><br>
                </form>
            </div>
        </div>
        </body>
</html>
        
        