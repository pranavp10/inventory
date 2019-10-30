<?
$host = "localhost";
$userName = "root";
$password = "";
$database = "inventory";

// Create connection
$connect =  mysqli_connect($host, $userName, $password,$database);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


