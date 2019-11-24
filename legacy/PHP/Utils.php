<?php
function generateRandoms($c) {
  //Should be in Root/Uploads/{YEAR}/{MONTH}/filename.ext
  $arr = new Array();
  for ($i=0; $i < $c; $i++) {
    // logMe('Unique: ' . uniqid('', true));
    array_push($arr, uniqid('ID-', true));
  }
  return $arr;
}
  ?>
