<?php

function OpenCon()
 {
	 if($vcap_services->{'cleardb'}){ //if cleardb mysql db service is bound to this application
        	 echo "cleardb bound. <br>";
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
    
    echo "Debug: " . $mysql_server_name . " " .  $mysql_username . " " .  $mysql_password . "\n";

$conn = new mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
    die();
}
echo "Connected to MySQL kkkk.". "<br>" ;

/*
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "ankit";
 $db = "practice";


 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
*/
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>
