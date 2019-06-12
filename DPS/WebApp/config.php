<!-- SQL connection -->
<?php
$serverName = "BammBamm";
$connectionInfo = array("Database"=>"TestDB",
                        "UID"=>"Timetable", 
                        "PWD"=>"a%89UIes");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false){
    echo "Error in connection.\n";
    die( print_r( sqlsrv_errors(), true));
}


?>