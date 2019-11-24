<?php

$defaultLogName = "PHP Log";
$logExtension = '.log';
$logLocation = generatePath();
$logFileName = initLog();
set_error_handler('customHandler');

function initLog() {
  //Dateformat as "YYmmDD".
  // $fullName = $GLOBALS['logLocation'] . date("ymd") . " - " . $GLOBALS['defaultLogName'] . $GLOBALS['logExtension'];
  $fullName = $GLOBALS['logLocation'] . date("ymd") . " - " . $GLOBALS['defaultLogName'] . $GLOBALS['logExtension'];

  if (!file_exists($fullName)) {
    $log = fopen($fullName, "w");
    fwrite($log, "New log-file has been created on " . date("l j F Y - H:i:s") . PHP_EOL . PHP_EOL);
    fclose($log);
  }

  return $fullName;
}


function logMe($text) {
  // Dateformat as: "DD-mm-YY HH:MM:ss".
  $appendText = date("d-m-Y H:i:s") . " - " . $text . PHP_EOL;
  $log = fopen($GLOBALS['logFileName'], "a");
  if ($log != false) {
    fwrite($log, $appendText);
    fclose($log);
  }
}


function generatePath() {
  $dir = "./";
  $HOMEPATH = "public_html";

  while (substr_compare(realpath($dir), $HOMEPATH, strlen(realpath($dir))-strlen($HOMEPATH), strlen($HOMEPATH)) != 0) {
    $dir .= "../";
  }

  $dir .= "Logging/Logs/";
  return $dir;
}

function customHandler($eLevel, $eMessage, $eFile, $eLine) {
  logMe("$eLevel thrown in $eFile on line $eLine:\n$eMessage");
}
?>
