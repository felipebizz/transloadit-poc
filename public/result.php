<?php
$transloaditData = $_POST['transloadit'];
if (ini_get('magic_quotes_gpc') === '1') {
  $transloaditData = stripslashes($transloaditData);
}
$transloaditData = json_decode($transloaditData, true);
print_r($transloaditData);

foreach ($transloaditData['uploads'] as $upload) {
  // do something with the uploaded file here
}

foreach ($transloaditData['results'] as $encodingResult) {
  // do something with the encoding result here here,
  // like saving its URL to the database
}