<?php 
require_once 'getTemperature.php';
require_once 'getWater.php';
require_once 'getHumidity.php';
require_once 'getGround.php';

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "arduino";
$port= 3306;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
$conn->set_charset("utf8mb4");
$sql = $conn->prepare("INSERT INTO serra (tempo,temperature,umidita,acqua,umiditaTerra) VALUES (current_timestamp(), ?,?,?,?)");
$sql->bind_param("iiii", $temperature,$humidity,$water,$ground);
$result = $sql->execute();
mysqli_close($conn);

?>