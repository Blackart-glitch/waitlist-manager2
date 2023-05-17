
<?php
session_start();
include 'database_connect.php';
$riko = $msg = $echo = $p_word = $email = $f_name = $l_name = $u_name = $phone = $state = $country = $uid = "";
$name = $title = $apps = $avao = $zmail = "";

// this block retrieves data from the session
if (!isset($_SESSION['Email']) && !isset($_SESSION['Password'])) {
    header('location:login.php');
} else {
    $email = $_SESSION['Email'];
    $p_word = $_SESSION['Password'];
}


// this block retrieves user data from the database table "users"
$check = "SELECT * FROM users WHERE Email = '$email' AND P_word = '$p_word' ";
$check = mysqli_query($conn, $check);
if (!$check) {
    echo "sql error" . "<br>" . $conn->error;
} else {
    $row = mysqli_fetch_assoc($check);
    $f_name = $row['FirstName'];
    $l_name = $row['LastName'];
    $u_name = $row['Username'];
    $phone = $row['Telephone'];
    $state = $row['state'];
    $country = $row['Country'];
    $uid = $row['ID'];
    $name = $row['Displayname'];
    $title = $row['Title'];
    $apps = $row['maxapps'];
    $avao = $row['avab'];
    $zmail = $row['zoomemail'];
}

mysqli_free_result($check); //clears the result of the query from this $check variable

// fetches the waitlists joined by the user from table "waitlist_joined"
$check = "SELECT waitlist FROM waitlists_joined WHERE Email = '$email' ";
$check = mysqli_query($conn, $check);
$i = 0;
$joiner = []; //joiner is the array to store all joined waitlist names and codes
while ($rows = mysqli_fetch_assoc($check)) {
    array_push($joiner, $rows['waitlist']);
    $i++;
}


mysqli_free_result($check); //clears the result of the query from this $check variable
$carter = [];
if (isset($_POST['join'])) {
    $txt = $_POST['code'];
    $check = "SELECT * FROM `waitlists_joined` WHERE `waitlist` = '$txt' ";
    $check = mysqli_query($conn, $check);
    if (mysqli_num_rows($check) == 0) {
        $carter = mysqli_fetch_assoc($check);
        $check = "INSERT INTO `waitlists_joined` (Email, waitlist) VALUES ('$email', '$txt')";
        $check = mysqli_query($conn, $check);
    }

    header("Location: " . $_SERVER['PHP_SELF']);
}

// fetches all waitlists and their respective codes except the user's waitlist from table "waitlist_created"
$check = "SELECT waitlist FROM waitlists_created WHERE NOT Work_email = '$email' AND NOT ID = '$uid' ";
$check = mysqli_query($conn, $check);
$i = 0;
$joiner2 = []; //joiner is the array to store all joined waitlist names and codes
while ($rowg = mysqli_fetch_assoc($check)) {
    array_push($joiner2, $rowg['waitlist']);
    $i++;
}
mysqli_free_result($check); //clears the result of the query from this $check variable
//fetches all waitlist created by the user
$check = "SELECT waitlist FROM waitlists_created WHERE ID = '$uid' ";
$check = mysqli_query($conn, $check);
$i = 0;
$joiner3 = []; //joiner is the array to store all joined waitlist names and codes
while ($rowgg = mysqli_fetch_assoc($check)) {
    array_push($joiner3, $rowgg['waitlist']);
    $i++;
}
mysqli_free_result($check);


if (isset($_POST['remove'])) {
    $room = $_POST['room'];
    $check = "DELETE FROM `waitlists_joined` WHERE `waitlists_joined`.`Email` = '$email' AND `waitlists_joined`.`waitlist` = '$room'";
    $check = mysqli_query($conn, $check);
    header("Location: " . $_SERVER['PHP_SELF']);
}
if (isset($_POST['skip'])) {
    $room = $_POST['room'];
    $skipper = $_POST['nextapp'];
    $check = "DELETE FROM `waitlists_joined` WHERE `waitlists_joined`.`Email` = '$skipper' AND `waitlists_joined`.`waitlist` = '$room'";
    $check = mysqli_query($conn, $check);
    header("Location: " . $_SERVER['PHP_SELF']);
}
if (isset($_POST['clear'])) {
    $room = $_POST['room'];
    $check = "DELETE FROM `waitlists_joined` WHERE `waitlists_joined`.`waitlist` = '$room'";
    $check = mysqli_query($conn, $check);
    header("Location: " . $_SERVER['PHP_SELF']);
}

?>