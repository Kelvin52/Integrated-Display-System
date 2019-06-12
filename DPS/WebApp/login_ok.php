  

<!-- session_start();

$serverName = "BammBamm";
$uid = "Timetable";     
$pwd = "a%89UIes";    
$databaseName = "TestDB"; 

$connectionInfo = array("Database"=>$databaseName,
                        "UID"=>$uid, 
                        "PWD"=>$pwd);
$conn = sqlsrv_connect( $serverName, $connectionInfo);
echo "<script>alert'hello'</script>";

if($conn){
  

  $user_id = $_POST['ID'];
  $user_pw = $_POST['PW'];

  $query = "SELECT * FROM [TestDB].[dbo].[UserInformation] WHERE ID = '$user_id' AND PW = '$user_pw'";
  $result = sqlsrv_query($query);
  $rows = sqlsrv_num_rows($result);

  if($rows==1){
    session_register("$user_id");
    $_SESSION['login_user']=$user_id;
    header("location:Timetable.php");
  }
  else {
    echo '<script language="javascript">';
    echo 'alert("message successfully sent")';
    echo '</script>';
    header("location:login.php");
  }

}

$result = sqlsrv_query($conn, $query) or die(print_r( sqlsrv_errors(), true));
$rows = 0;

while($row = sqlsrv_fetch_array($result)){
$rows++;
}

if($rows==1){
$_SESSION['user_id'] = $user_id;
header("location: timetable.php");

}else{
echo "alert (wrong)<a href='login.php'>Login</a> </div>";
}

  $user_id = $_POST['user_id'];
  $user_pw = $_POST['user_pw'];

    if ( !isset( $user_id) || !isset($user_pw) ) {
        header("Content-Type: text/html; charset=UTF-8");
        echo "<script>alert('ID or Password is missing.');";
        echo "window.location.replace('login.php');</script>";
        exit;
    }
 -->
     
<?php
    /* If success */
  if ( !isset($_POST['user_id']) || !isset($_POST['user_pw']) ) {
      header("Content-Type: text/html; charset=UTF-8");
      echo "<script>alert('Username or Password is Incorrect');";
      echo "window.location.replace('login.php');</script>";
      exit;
  }
  $user_id = $_POST['user_id'];
  $user_pw = $_POST['user_pw'];
  $members = array(
      'admin' => array('password' => 'admin', 'name' => 'admin'),
      'user1' => array('password' => 'user1', 'name' => 'user1'),
      'user2' => array('password' => 'user2', 'name' => 'user2'),

  );

  if( !isset($members[$user_id]) || $members[$user_id]['password'] != $user_pw ) {
      header("Content-Type: text/html; charset=UTF-8");
      echo "<script>alert('Username or Password is Incorrect');";
      echo "window.location.replace('login.php');</script>";
      exit;
  }


    session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_name'] = $members[$user_id]['name'];
?>
<meta http-equiv="refresh" content="0;url=timetable.php" />