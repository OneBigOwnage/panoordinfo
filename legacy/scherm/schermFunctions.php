<?php
header('Acces-Control-Allow-Origin: *', false);

$servername = "localhost";
$DBusername = "id1527993_dba";
$DBpassword = "V4wje9JMuww8";
$updateReady = null;


  if(isset($_GET['function'])) {
    if     ($_GET['function'] == 'getAgendaItems') {getAgendaItems();}
    elseif ($_GET['function'] == 'checkUpdate') {checkUpdate();}
    elseif ($_GET['function'] == 'setUpdateReady') {setUpdate();}
    elseif ($_GET['function'] == 'getAnnouncementItems') {getAnnouncementItems();}
  }

  function getAgendaItems() {
  $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
    $sql = "  SELECT item_header, item_content, item_date
              FROM id1527993_panoord_content.agenda_item
              WHERE is_deleted != 1;";
    $returnArray = array();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $item = array(
                      'item_header' => $row['item_header'],
                      'item_content' => $row['item_content'],
                      'item_date' => $row['item_date']);
        array_push ($returnArray, $item);
        }
      }
    $conn->close();
    echo json_encode($returnArray);
  }

  function getAnnouncementItems() {
  $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
    $sql = "  SELECT item_header, item_content
              FROM id1527993_panoord_content.announcement_item
              WHERE is_deleted != 1;";
    $returnArray = array();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $item = array(
                      'item_header' => $row['item_header'],
                      'item_content' => $row['item_content'],);
        array_push ($returnArray, $item);
        }
      }
    $conn->close();
    echo json_encode($returnArray);
  }



  function checkUpdate() {
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
    $sql = "  SELECT updateReady
              FROM id1527993_panoord_content.update";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if ($row['updateReady'] == 1) {
      $sql = "  UPDATE id1527993_panoord_content.update SET updateReady = 0;";
      $conn->query($sql);
      echo "1";
    } else {
      echo "0";
    }
    $conn->close();
  }

  function setUpdate() {
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
    $sql = "  UPDATE id1527993_panoord_content.update SET updateReady = 1;";
    $conn->query($sql);
    $conn->close();
  }


 ?>
