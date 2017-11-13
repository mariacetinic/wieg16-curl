<?php

$fileName = "elle_com.html";
$ch = curl_init("http://www.elle.com/");
$fp = fopen($fileName, "w");

curl_setopt($ch, CURLOPT_FILE, $fp);
curl_setopt($ch, CURLOPT_HEADER, 0);

curl_exec($ch);
curl_close($ch);
fclose($fp);

$words = [
    'fashion' => 0,
    'beauty' => 0,
    'celebrity' => 0,

];

//read the contents of a file into a string
$content = file_get_contents($fileName);

//strängen tas bort från html, php taggar
$content = strip_tags($content);

//The explode() function breaks a string into an array.
$content = explode(" ", $content );

$text = $content;


//var_dump($words); // skriver ut array med ord och antalet ord



 function count_words($text, array $words) {

     foreach ($words as $word => $amount) {
         foreach ($text as $item) {
             if (strpos($item, $word) !== false) {
                 $words[$word] = $words[$word] + 1;
             }
         }
     }
     var_dump($words);
 }

 count_words($text, $words);


//Funktionen ska spara ned i en fil
//Analysera förekomsten av utvalda ord i innehållet

/*function count_words($content, array $words ) {



    foreach ($words as $word => $count) {
        $words[$word] = substr_count($content, $word);
    }
    var_dump($words);
}*/



// * Ta bort alla html-taggar (finns inbyggd funktion för det)



//echo $content;
// * Dela upp textsträngen (finns inbyggt funktion)

//* Räkna orden (en loop kanske?)


//

