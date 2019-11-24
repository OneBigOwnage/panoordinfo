<?php
session_start();
header('Content-Type: application/json', false);

$servername = "localhost";
$DBusername = "id1527993_dba";
$DBpassword = "V4wje9JMuww8";

if(isset($_GET['function'])) {
  if($_GET['function'] == 'checkLogin') {
    checkLogin($_GET['username'], $_GET['password']);
  } elseif($_GET['function'] == 'getHashes') {
    getHashes($_GET['amount']);
  } elseif ($_GET['function'] == 'get_svar') {
    echo get_svar($_GET['varname']);
  } elseif ($_GET['function'] == 'logout') {
    logOut();
  }
}

function checkLogin($username, $password) {
  $conn = new mysqli($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
  $sql = "SELECT user_pass FROM id1527993_panoord_content.user WHERE user_name = '" . $username . "';";
  $result = $conn->query($sql);

  if ($result->num_rows == 1)
  while ($row = $result->fetch_assoc()) {
    if ($row['user_pass'] == $password) {
      $_SESSION['auth'] = 1;
      $_SESSION['user_id'] = getUserIDByName($username);
      setAllByID($_SESSION['user_id']);
      echo "TRUE";
    } else {
      $_SESSION['auth'] = 0;
      echo "FALSE";
    }
  }
  $conn->close();
}


function getUserIDByName($username) {
  $conn = new mysqli($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);

  $sql = "SELECT user_id FROM id1527993_panoord_content.user WHERE user_name = '" . $username . "';";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $conn->close();
  return $row['user_id'];
}

function setAllByID($ID) {
  $conn = new mysqli($GLOBALS['servername'], $GLOBALS['DBusername'], $GLOBALS['DBpassword']);
  $sql = "SELECT user_name, user_level FROM id1527993_panoord_content.user WHERE user_id = '" . $ID . "';";

  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $conn->close();

  $_SESSION['user_name'] = $row['user_name'];
  $_SESSION['user_level'] = $row['user_level'];
}

function get_svar($varname) {
  if (isset($_GET[$varname])) {
    echo $_SESSION[$varname];
  } else {
    echo 'NOT SET';
  }
}

function logOut() {
  session_destroy();
  header('Location: index.php');
  exit();
}

?>
