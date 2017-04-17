<?php
session_start();
?>

<!DOCTYPE html>
<html>
<body>
<?php
include 'db_connection.php';

$conn = OpenCon();

echo "<br>"."Connected Successfully to mysql";
CloseCon($conn);

?>
<br>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload (max sie 500kb - Only jpg,jpeg,png permitted):
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php
echo "<br>";
echo "<br>";
$_SESSION["favcolor"] = "yellow";
print_r($_SESSION);echo "<br>";
echo $_SERVER['SERVER_NAME'];echo "<br>";
echo $_SERVER['HTTP_HOST'];echo "<br>";
echo $_SERVER['SCRIPT_NAME'];echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];echo "<br>";
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
?>

</body>
</html>
