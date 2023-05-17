<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "waitlist";

$conn = new mysqli($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 function get_ID($email, $p_word, $conn){
    $check =  "SELECT * FROM users WHERE Email = '$email' AND P_word = '$p_word' ";
    $check = mysqli_query($conn, $check);
    if (! $check){
        echo "sql error" . "<br>" . $conn->error;
    }else{
        $row = mysqli_fetch_assoc($check);

        $uid = $row['ID'];
        mysqli_free_result($check); //clears the result of the query from this $check variable
        return $uid;
    }
}
