<?php require 'insert.php' ?>
<html>
  <head>
      <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.js">
        // facciamo l'import delle librerie jquery di javascript per il gauge
      </script>
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
        width: 200px;
        height: auto;
        border: 3px solid black;
        padding: 10px;
        margin-left: 100px;
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
      img{
        height: 46px;
        width: auto;
        border: 3px solid #555;
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
      <a href="graphic_WebServer.php" style="background-color: #04aa6d;">Graphics</a>
      <a href="storico.php">Storico dati</a>
      <a href="meteo.php">Meteo</a>
      <img src="http://localhost/serra/GIGAR1_webserver/logo.png">
    </div>

    <div style='margin:15px; padding:10px;' class="body"> 
      <p><strong><center>Dati della serra</center> </strong></p><br><br>
    
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js">
        // facciamo l'import delle librerie jquery di javascript per il gauge
      </script> 

    <div class="box" style="width:200px; text-align:center;"> 
         <div id="chart_div" style="width: 200px; height: 200px;"> 
         </div> 
         <h3>temperature</h3> 
    </div>

    <div class="box" style="width:200px;text-align:center;"> 
        <div id="chart_div_hum" style="width: 200px; height: 200px;"></div>
        <h3> humidity </h3>
    </div>

    <div class="box" style="width:200px;text-align:center"> 
        <div id="chart_div_water" style="width: 200px; height: 200px;"></div>
        <h3> water </h3>
    </div>

    <div class="box" style="width:200px;text-align:center"> 
    <div id="chart_div_ground" style="width: 200px; height: 200px;"></div>
        <h3> groud </h3>
    </div>

<script type="text/javascript">

      google.charts.load('current', {'packages': ['gauge']});/*from w  w  w . j ava  2 s. c o  m*/
      google.charts.setOnLoadCallback(drawChart);
      
      function drawChart() {
        var temperature= <?php require_once 'getTemperature.php'; echo $temperature; ?>;
        var humidity= <?php require_once 'getHumidity.php'; echo $humidity; ?>;
        var water= <?php require_once 'getWater.php'; echo $water; ?>;
        var ground= <?php require_once 'getGround.php'; echo $ground; ?>;

        var dataTemp = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['temperature', temperature ]
        ]);

        var dataHum = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['humidity', humidity ]
        ]);

        var dataWater = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['water', water ]
        ]);

        var dataGround = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['ground', ground ]
        ]);

        var options = {
          width: 200,
          height: 200,
          redFrom: 70,
          redTo: 100,
          yellowFrom: 20,
          yellowTo: 70,
          greenFrom: 0,
          greenTo: 20,
          minorTicks: 10
        };

        var optionsWater = {
          ...options,
          redFrom: 0,
          redTo: 100,
          yellowFrom: 100,
          yellowTo: 300,
          greenFrom: 300,
          greenTo: 500,
          max:500,
          minorTicks: 10
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
        chart.draw(dataTemp, options);

        var chart = new google.visualization.Gauge(document.getElementById('chart_div_hum'));
        chart.draw(dataHum, options);

        var chart = new google.visualization.Gauge(document.getElementById('chart_div_water'));
        chart.draw(dataWater, optionsWater);

        var chart = new google.visualization.Gauge(document.getElementById('chart_div_ground'));
        chart.draw(dataGround, options);
        $("svg > g > text:first").attr("y", 400);
    }
</script> 
    </div><br><br>

  </body>
</html>