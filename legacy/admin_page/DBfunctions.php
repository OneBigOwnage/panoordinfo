<?php
  include_once '../Logging/Logger.php';

  $servername = 'localhost';
  $DBusername = 'id1527993_dba';
  $DBpassword = 'V4wje9JMuww8';
  $uploadFolder = '../Uploads/';

  if(isset($_GET['function'])) {

    if ($_GET['function'] == "getAnnouncements")          {getAnnouncements();}
    elseif ($_GET['function'] == 'getPhotos')             {getIMGFromDB();}
    elseif ($_GET['function'] == 'newAgendaItem')         {newAgendaItem($_GET['header'], $_GET['content'], $_GET['date']);}
    elseif ($_GET['function'] == 'saveNewAnn')            {saveNewAnn($_GET['header'], $_GET['content']);}
    elseif ($_GET['function'] == 'saveAgendaItem')        {saveAgendaItem($_GET['id'], $_GET['header'], $_GET['content'], $_GET['date']);}
    elseif ($_GET['function'] == "saveAnnouncementItem")  {saveAnnouncementItem($_GET['id'], $_GET['header'], $_GET['content']);}
    elseif ($_GET['function'] == 'deleteAgendaItem')      {deleteAgendaItem($_GET['id']);}
    elseif ($_GET['function'] == "delAnnouncementItem")   {deleteAnnouncementItem($_GET['id']);}
    elseif ($_GET['function'] == "delPhotos")             {deletePhotos($_GET['IDs']);}
  }

  function getAgendaItems() {
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
    $sql = "  SELECT item_id, item_header, item_content, item_date
              FROM id1527993_panoord_content.agenda_item
              WHERE is_deleted != 1;";
    $returnArray = array();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $item = new agenda_item();
      $item->id = $row['item_id'];
      $item->date = $row['item_date'];
      $item->header = $row['item_header'];
      $item->content = $row['item_content'];
      array_push ($returnArray, $item);
    }
    $conn->close();
  }
  return $returnArray;
  }

  function saveAgendaItem($id, $header, $content, $date) {
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
    $id = mysqli_escape_string($conn, $id);
    $header = mysqli_escape_string($conn, $header);
    $content = mysqli_escape_string($conn, $content);
    $date = mysqli_escape_string($conn, $date);

    $sql = "  UPDATE id1527993_panoord_content.agenda_item
              SET item_header = '" . $header . "', item_content = '" . $content . "', item_date = '" . $date . "'
              WHERE item_id = " . $id . ";";

    if (!mysqli_query($conn,$sql)) {
      die('Error: ' . mysqli_error($con));
    } else {
      echo 'Record Updated Succesfully!';
    }
    $conn->close();
  }

  function newAgendaItem($header, $content, $date) {
    session_start();
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
    $header = mysqli_escape_string($conn, $header);
    $content = mysqli_escape_string($conn, $content);
    $date = mysqli_escape_string($conn, $date);
    $user = $_SESSION['user_id'];

    $sql = "  INSERT INTO id1527993_panoord_content.agenda_item (item_header, item_content, item_date, creator_id)
              VALUES ('" . $header . "', '" . $content . "', '" . $date . "', " . $user . ");";

    if (!mysqli_query($conn,$sql)) {
      die('Error: ' . mysqli_error($conn));
    } else {
      echo 'Record Inserted Succesfully!';
    }
    $conn->close();
  }



  function deleteAgendaItem($id) {
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
    $id = mysqli_escape_string($conn, $id);
    $sql = "  UPDATE id1527993_panoord_content.agenda_item
              SET is_deleted = 1
              WHERE item_id = '" . $id . "';";

    echo $sql;

    if (!mysqli_query($conn, $sql)) {
      die('Error: ' . mysqli_error($conn));
    } else {
      echo 'Record Deleted Succesfully!';
    }
    $conn->close();
  }


  function saveIMGToDB($fileName, $ext) {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
    $IMGData = mysqli_real_escape_string($conn, file_get_contents($fileName));

    $sql = "  INSERT INTO id1527993_panoord_content.photos (photo, upload_id, file_ext, photo_width, photo_height)
              VALUES ('" . $IMGData . "', " . $_SESSION['user_id'] . ", '" . $ext . "', " . getimagesize($fileName)[0] . ", " . getimagesize($fileName)[1] . ");
    ";

    if (!mysqli_query($conn, $sql)) {
      return ('Error: ' . mysqli_error($conn));
    } else {
      return true;
    }
    $conn->close();
  }



  function getIMGFromDB() {
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
    $sql = "  SELECT photo_id, photo, file_ext, photo_height, photo_width
              FROM id1527993_panoord_content.photos;
    ";

    $returnArr = array();
    $returnVal = array();
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $returnVal['id'] = $row['photo_id'];
        $returnVal['photo'] = base64_encode($row['photo']);
        $returnVal['ext'] = $row['file_ext'];
        $returnVal['width'] = $row['photo_width'];
        $returnVal['height'] = $row['photo_height'];
        array_push($returnArr, $returnVal);
      }
    }
    $conn->close();
    echo json_encode($returnArr);
  }


  function saveNewAnn($header, $content) {
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
    $header = mysqli_escape_string($conn, $header);
    $content = mysqli_escape_string($conn, $content);
    $user = $_SESSION['user_id'];

    $sql = "  INSERT INTO id1527993_panoord_content.announcement_item (item_header, item_content, creator_id)
              VALUES ('$header', '$content', $user);";

    if (!mysqli_query($conn,$sql)) {
      die('Error: ' . mysqli_error($conn));
    } else {
      echo 'true';
    }
    $conn->close();
  }

  function getAnnouncements() {
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
    $sql = "  SELECT item_id, item_header, item_content
              FROM id1527993_panoord_content.announcement_item
              WHERE is_deleted != 1;";
    $returnArray = array();
    $item = array();
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $item["id"] = $row['item_id'];
        $item["header"] = $row['item_header'];
        $item["content"] = $row['item_content'];
        array_push ($returnArray, $item);
      }
    }
    $conn->close();
  echo json_encode($returnArray);
  }

  function saveAnnouncementItem($id, $header, $content) {
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
    $id = mysqli_escape_string($conn, $id);
    $header = mysqli_escape_string($conn, $header);
    $content = mysqli_escape_string($conn, $content);

    $sql = "  UPDATE id1527993_panoord_content.announcement_item
              SET item_header = '" . $header . "', item_content = '" . $content . "'
              WHERE item_id = " . $id . ";";

    if (!mysqli_query($conn,$sql)) {
      die('Error: ' . mysqli_error($con));
    } else {
      echo 'Record Updated Succesfully!';
    }
    $conn->close();
  }

  function deleteAnnouncementItem($id) {
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
    $id = mysqli_escape_string($conn, $id);
    $sql = "  UPDATE id1527993_panoord_content.announcement_item
              SET is_deleted = 1
              WHERE item_id = '" . $id . "';";

    echo $sql;

    if (!mysqli_query($conn, $sql)) {
      die('Error: ' . mysqli_error($conn));
    } else {
      echo 'Record Deleted Succesfully!';
    }
    $conn->close();
  }


  function deletePhotos($IDs) {
    $conn = mysqli_connect($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
    foreach ($IDs as $id) {
      $id = mysqli_escape_string($conn, $id);
      $sql = " DELETE
               FROM id1527993_panoord_content.photos
               WHERE photo_id = $id;";
      if (!mysqli_query($conn, $sql)) {
        die('Error: ' . mysqli_error($conn));
      }
    }
  }

  function logTest() {
    $log = fopen("./../Logging/Logs/log.txt", "w");
    fwrite($log, "abcdefg");
    fclose($log);
    return realpath("./../Logging/Logs/log.txt");
  }

 ?>
