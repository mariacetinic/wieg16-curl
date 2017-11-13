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

//var_dump($words); // skriver ut array med ord och antalet ord

$text = $content;

 function count_words($text, array $words) {

//strängen tas bort från html, php taggar
     $text = strip_tags($text);

//The explode() function breaks a string into an array.
     $text = explode(" ", $text );

     foreach ($words as $word => $amount) {
         foreach ($text as $item) {
             if (strpos($item, $word) !== false) {
                 $words[$word] = $words[$word] + 1;
             }
         }
     }
     return $words;
 }

 ?>

    <ul>
        <?php foreach (count_words($text, $words) as $word => $amount): ?>
            <li><?= $word . " => " . $amount ?></li>
        <?php endforeach; ?>
    </ul>

<?php

 /*
foreach (count_words($text, $words) as $word => $amount) {
    echo $word . " => " . $amount . " <br>" ;
}*/

 //ger felmeddelande
 //echo count_words($text, $words);
 //test var_dump(count_words($text, $words)); -endast för debug!


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

