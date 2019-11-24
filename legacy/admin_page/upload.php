<?php

include_once 'DBfunctions.php';
include_once '../Logging/Logger.php';

foreach ($_FILES as $file) {
  $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
  $fileName = 'TEMPORARY_UPLOADS/' . $file['name'];
  move_uploaded_file($file['tmp_name'], $fileName);

  $callBack = saveIMGToDB($fileName, $ext);

  if ($callBack == true) {
    unlink($fileName);
    echo "No errors: " . $callBack;
  } else {
    logMe("Something went wrong while uploading a file." . PHP_EOL . $callBack);
    echo "Error, Image was not saved to DB! \r\n" . $callBack;
  }
}

//Saves the file to disk.
function saveFile() {

}

?>
