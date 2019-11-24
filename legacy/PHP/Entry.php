<?php
set_include_path($_SERVER['DOCUMENT_ROOT'] . '/PHP/');
include_once '../Logging/Logger.php';
//---

$fName = $_GET['routine'];
$args;
if (isset($_GET['arguments'])) {
  $args = array($_GET['arguments']);
} else {
  $args = [];
}

if (function_exists($fName)) {
  jsReturn($_GET['arguments']);
  //call_user_func_array($fName, array($args));
} else {
  jsreturn("\'$fName\' is not a valid routine!");
}

function jsReturn($returnVal) {
  switch (gettype($returnVal)) {
    case 'array':
      echo json_encode(array('response' => json_encode($returnVal), 'type' => 'array'));
      break;
    default:
      echo json_encode(array('response' => json_encode(array($returnVal)), 'type' => 'not array'));
      break;
  }
}

function gen($count) {
  include_once 'Utils.php';
  generateFilePath($count);
}




?>
