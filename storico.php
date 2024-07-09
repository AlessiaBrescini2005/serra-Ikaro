<!DOCTYPE html>
<html lang="it">
<head>
    <style>
        .topnav {
        overflow: hidden;
        background-color: #333;
        }
        .topnav a {
        float: right;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
      }
      .topnav a:hover {
        background-color: #FFFFFF;
        color: black;
        font-family: "Cambria";
        font-size: 20px;
      }
      .topnav {
        background-color: #000000;
        overflow: hidden;
        height: 53px;
      }
      .topnav a.active {
        background-color: #04AA6D;
        color: white;
        width: auto;
        height: auto;
      }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storico dei dati</title>
</head>
<body>

<div class="topnav"> <!-- navigation bar-->
      <a href="graphic_WebServer.php">Graphics</a>
      <a href="storico.php" style="background-color: #04aa6d;">Storico dati</a>
      <a href="meteo.php">Meteo</a>
      <img src="http://localhost/serra/GIGAR1_webserver/logo.png">
    </div>

<center> <h3> Storico dei dati </h3></center>

<form name="storico" method="get" action="storico.php" class="form-example"> <!-- metodo specifica quello che si vuole fare con il form-->

<div class="form-example"> <!--ogni volta richiamiamo la classe form-example per indentare le etichette ed il testo-->
    <label for="data"> Data accessi: </label>
    <input type="date" name="data" id="data" required /> <br><br>
</div>
<input type="submit" value="Invia" /><br><br>
<?php

if (isset($_GET['data'])) {
$data= $_GET["data"];

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "arduino";
$port= 3306;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);
$conn->set_charset("utf8mb4");
$sql = $conn->prepare("SELECT tempo, temperature, umidita, acqua, umiditaTerra FROM serra WHERE date(tempo)=?");
$sql->bind_param("s", $data);
$status = $sql->execute();
$result = $sql->get_result();

if ($status !== false) {
if ( $result->num_rows === 0 )
exit ( "nessuna riga estratta dalla tabella " );
 echo "<table border='1'>";
 echo "<tr>\n";
while ($field = mysqli_fetch_field ($result))
//--- ^^^ per ogni campo della 1^ riga
 echo "<th>". $field->name ."</th>\n";
 echo "</tr>\n";
 while ($row = mysqli_fetch_assoc ($result) ) {
 echo "<tr>\n";
foreach ($row as $key => $val)
 echo "<td>". $val ."</td>";
 echo "</tr>\n";
 }
 echo "</table></body></html>";
mysqli_free_result ($result);
mysqli_close ($conn); 
}
 else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>
</body>

</html>