<html>
<head>
<style>
      .box {
      float: left;
      width: 33.33%;
      padding: 10px;
      margin-left: 90px;
      }
      .measure{
      width: auto;
      height: auto;
      font-family: "Cambria";
      font-size: 20px;
      margin: 10px;
      }
      .script{
      font-size: 20px;
      color: white;
      }
      .logo{
        width: 250px;
        height: 60px;
        align: left;
      }
      .body{
        font-size: 30px;
        margin-left: 20px;
        font-family: "Cambria";
      }
      .box_count {
        width: AUTO;
        height: auto;
        border: 3px solid black;
        padding: 10px;
        margin: 10px;
        background-color: #D2D2D2;
        font-family: "Cambria";
        font-size: 20px;
        text-align: center;
        vertical-align: middle;
      }
      .box_weather {
        width: 400px;
        height: auto;
        border: 3px solid black;
        padding: 10px;
        margin-left: 50px;
        font-family: "Cambria";
        background-color: #D2D2D2;
        font-size: 20px;
      }

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
      .img{
        height: 46px;
        width: auto;
        border: 3px solid #555;
      }
      .meteo{
        height: 500px;
        width: 1000px;
        border: 3px solid #555;
        margin-left: 50px;
        border: 3px solid black;
        margin-top: 250px;
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
</head>
<body>

<div class="topnav"> <!-- navigation bar-->
      <a href="graphic_WebServer.php">Graphics</a>
      <a href="storico.php">Storico dati</a>
      <a href="meteo.php" style="background-color: #04aa6d;">Meteo</a>
      <div style="border: 3px solid #000;">
      <img width="200" height="47" src="http://localhost/serra/GIGAR1_webserver/logo.png">
    </div>
</div> <br><br><br><br>

<div class="box_weather" style="float:left;"> <!-- incude(API.php)-->
    <p><b> ROMA: <BR></b></p>
    <?php include("API.php")?>
</div>

<div class="meteo"> <!-- incude(API.php)-->
<img width="1000" height="500" src="https://www.meteosystem.com/webcam-live/roma-montemario/cam.jpg"></a>
</div>

</body>
</html>