<html>
   <head> 
      <title> Gauge Chart Example </title> 
      <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.js">
        // facciamo l'import delle librerie jquery di javascript per il gauge
      </script>
      <h1> <center> Gauge chart example </center> </h1> 
   </head> 
   <style>
    .box {
    float: left;
    width: 33.33%;
    padding: 10px;
    margin-left: 90px;
    }
    </style>
   <body> 
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
        var temperature= <?php include 'gauge.php' ?>;
        var humidity= <?php include 'gauge.php' ?>;
        var water= <?php include 'gauge.php' ?>;
        var ground= <?php include 'gauge.php' ?>;

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

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));
        chart.draw(dataTemp, options);

        var chart = new google.visualization.Gauge(document.getElementById('chart_div_hum'));
        chart.draw(dataHum, options);

        var chart = new google.visualization.Gauge(document.getElementById('chart_div_water'));
        chart.draw(dataWater, options);

        var chart = new google.visualization.Gauge(document.getElementById('chart_div_ground'));
        chart.draw(dataGround, options);
        $("svg > g > text:first").attr("y", 400);
    }
      </script> 

   </body>
</html>