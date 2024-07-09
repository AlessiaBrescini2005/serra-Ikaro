<?php

//Inizializziamo una sessione cURL utilizzando la funzione curl_init.
$sessione=curl_init(); 


/*parametri del curl_setop: 
CURLOPT_URL per settare l'url da chiamare in GET. 
CURLOPT_RETURNTRANSFER cattura in una stringa ($result) la risposta del server.
*/
curl_setopt($sessione,CURLOPT_URL,"https://api.openweathermap.org/data/2.5/weather?q=rome&appid=d3e62a3cb74cc3f3b27126ba2f9470d5");
curl_setopt($sessione,CURLOPT_RETURNTRANSFER,true);
curl_setopt($sessione,CURLOPT_HEADER, false); 


//Utilizziamo la funzione curl_exec per effettuare la chiamata, e catturiamo la risposta nella variabile $result
$result=curl_exec($sessione);

//chiudiamo la sessione
curl_close($sessione);

$data = json_decode($result);
$currentTime = time();

//mostriamo il risultat a video

echo "Descrizione:"."\t".ucwords($data->weather[0]->description)."\t"."<br>";
$data->main->temp_max= ($data->main->temp_max)-273.15;
$data->main->temp_min= ($data->main->temp_min)-273.15;
echo "Temperatura massima:"."\t".$data->main->temp_max."°c"."\t"."<br>";
echo "Temperatura massima:"."\t".$data->main->temp_min."°c"."\t"."<br>";
echo "Umidita':"."\t".$data->main->humidity."%"."\t"."<br>";
echo "Vento"."\t".$data->wind->speed."\t"."m/s"."<br>";


?>