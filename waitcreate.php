<?php
session_start();
include 'database_connect.php';
$msg = $p_word = $email = "";

// this block retrieves data from the session
if (!isset($_SESSION['Email']) && !isset($_SESSION['Password'])){
    header('location:login.php');
}else{
    $email = $_SESSION['Email'] ;
    $p_word = $_SESSION['Password'];
}

// gets the inputs from workers profile form and creates an available status 
if(isset($_POST['update'])){
    $name = $_POST['w-name'];
    $title = $_POST['w-title'];
    $apps = $_POST['apps'];
    $avao = $_POST['avao'];
    $zmail = $_POST['z-mail'];

    $check = "UPDATE users SET Displayname = '$name', Title = '$title', maxapps = '$apps', avab = '$avao', zoomemail = '$zmail' WHERE Email='$email' AND P_word='$p_word' ";
    $check = mysqli_query($conn, $check);
    // header('location:account.php');
    $uid = get_ID($email, $p_word, $conn);
    $sol = $name . "   " . $title;
//   echo date('Y-m-d');
    $check = "SELECT ID FROM waitlists_created WHERE ID='$uid'";
    $check = mysqli_query($conn, $check);
    if(mysqli_num_rows($check) === 1){
        $check = "UPDATE waitlist_created SET waitlist = '$sol' Work_mail = '$zmail' WHERE ID = '$uid' ";
        exit();
    }
    $check = "INSERT INTO waitlists_created (ID, Work_email, waitlist) VALUES ('$uid', '$email', '$sol')";   
    $check = mysqli_query($conn, $check);
    echo mysqli_error($conn);
}
?>