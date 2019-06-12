<!DOCTYPE html>
<?php session_start(); ?>

<?php
/* $serverName = "BammBamm";
$uid = "Timetable";     
$pwd = "a%89UIes";    
$databaseName = "TestDB"; 

$connectionInfo = array("Database"=>$databaseName,
                        "UID"=>$uid, 
                        "PWD"=>$pwd);
$conn = sqlsrv_connect( $serverName, $connectionInfo) or die(sqlsrv_errors());
if( $conn ) {
    echo "Connection established.<br />";
  }else{
    echo "Connection could not be established.<br />";
    die( print_r( sqlsrv_errors(), true));
  } */
?>



<link href="themes/Navbar.css"  rel="stylesheet" type="text/css">
<meta charset="utf-8" />



<body>
<?php if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) { ?>
<form method='post' class="modal-content animate" action="login_ok.php">
    <div class="container">
      <label for="user_id"><b>Username</b></label>s
      <input type="text" placeholder="Enter Username" name="user_id" require>

      <label for="user_pw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="user_pw" require>
        
      <button class="login" type="submit">login</button>
</form> 

    <?php } else {
            $user_id = $_SESSION['user_id'];
            $user_name = $_SESSION['user_name'];
            echo "<p>($user_id), you are already logged in.";
            echo "<a href=\"timetable.php\">[Back]</a> ";
            echo "<a href=\"logout.php\">[Logout]</a></p>";
        } ?>
    </div>


  
</body>

