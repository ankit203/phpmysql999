<?php

function OpenCon()
 {
	echo "Attempting DB connection.....<br>";
	
	$vcap_services = json_decode($_ENV["VCAP_SERVICES" ]);
	 if($vcap_services->{'cleardb'}){ //if cleardb mysql db service is bound to this application
        $db = $vcap_services->{'cleardb'}[0]->credentials;
    } 
    else { 
        echo "Error: No suitable MySQL database bound to the application. <br>";
        die();
    }
	
    $mysql_database = $db->name;
    $mysql_port=$db->port;
    $mysql_server_name =$db->hostname . ':' . $db->port;
    $mysql_username = $db->username; 
    $mysql_password = $db->password;
	
	if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!<br>';
} else {
    echo 'Phew, we have mysqli!<br>';
}
	
    echo "Debug: " . $mysql_server_name . " " . $mysql_database . " " .  $mysql_username . " " .  $mysql_password . "\n";
echo " \nConnecting.....  <br>" ;
$mysqli = new mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);

if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}
echo "Connected to MySQL.". "<br>" ;

 
 return $mysqli;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>
