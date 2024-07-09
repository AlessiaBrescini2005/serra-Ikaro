<?php

//Inizializziamo una sessione cURL utilizzando la funzione curl_init.
$sessione=curl_init(); 


/*parametri del curl_setop: 
CURLOPT_URL per settare l'url da chiamare in GET. 
CURLOPT_RETURNTRANSFER cattura in una stringa ($result) la risposta del server.
*/
curl_setopt($sessione,CURLOPT_URL,"http://172.20.10.13/HumGround");
curl_setopt($sessione,CURLOPT_RETURNTRANSFER,true);
curl_setopt($sessione,CURLOPT_HEADER, false); 


//Utilizziamo la funzione curl_exec per effettuare la chiamata, e catturiamo la risposta nella variabile $result
$ground=curl_exec($sessione);

//chiudiamo la sessione
curl_close($sessione);


//mostriamo il risultat a video
//echo $ground;
