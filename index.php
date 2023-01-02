<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Caslu</title>
</head>
<body>
  <?php 

  $date = new DateTime();
  $ts=$date ->getTimestamp();

  $keys= "c13e575087b8a48513eb48dad1980dfcd32302a4"."e15183fa44e4d67535826d744408cbb6";

  $string = $ts.$keys;

  $md5 = hash('md5', $string);
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, "https://gateway.marvel.com:443/v1/public/characters?ts=$ts&apikey=e15183fa44e4d67535826d744408cbb6&hash=$md5&name=hulk");
  curl_setopt($ch, CURLOPT_HEADER, 0);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json')                                                                       
);   
$output= curl_exec($ch) or die(curl_error());
echo str_replace('\\/', '/', $output);
    


  ?>
</body>
</html>
