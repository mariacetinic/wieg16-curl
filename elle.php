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




$content = file_get_contents($fileName);

// * Ta bort alla html-taggar (finns inbyggd funktion för det)
$content = strip_tags($content);
//echo $content;


// * Dela upp textsträngen (finns inbyggt funktion)


//* Räkna orden (en loop kanske?)


foreach ($words as $word => $count) {
    $words[$word] = substr_count($content, $word);
}

var_dump($words);