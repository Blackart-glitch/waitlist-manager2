<?php
session_start();
// this block retrieves data from the session
if (!isset($_SESSION['Email']) || !isset($_SESSION['Password'])){
    header('location:login.php');
    exit;
} else {
    $email = $_SESSION['Email'];
    $p_word = $_SESSION['Password'];
}

include('database_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $m_r = [];
    $check = "SELECT * FROM `messages` WHERE `RECEIVER` = '$email'";
    $check_result = mysqli_query($conn, $check);
    while($row = mysqli_fetch_assoc($check_result)){
        array_push($m_r, $row);
    }
    $m_r_count = mysqli_num_rows($check_result);
    
    $check = "SELECT * FROM `messages` WHERE `SENDER` = '$email'";
    $check_result = mysqli_query($conn, $check);
    $m_s = mysqli_fetch_all($check_result, MYSQLI_ASSOC);
    $m_s_count = mysqli_num_rows($check_result);

    $result = array(
        "sent" => $m_s,
        "received" => $m_r,
        "sent_count"=> $m_r_count,
        "received_count" => $m_s_count    
    );
}elseif ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $receiver = $_POST['sender'];
    $msg = $_POST['messages'];
    $check = "INSERT INTO `messages`(`RECEIVER`, `SENDER`, `BODY`) VALUES ('$receiver','$email','$msg')";
    $check = mysqli_query($conn, $check);
    if ($check) {
        $result = array('sql' => 'success');
    } else {
        $result = array('sql' => 'failed');
    }
    
}

    //print_r($result);
echo json_encode($result);
  
?>