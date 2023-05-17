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

include 'database_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room = $_POST['check'] ?? $_POST['check2'];  
}

if (!isset($_POST['check']) || empty($_POST['check'])){

    function gettheinfo($conn, $room) {
        $check = "SELECT * FROM `waitlists_created` WHERE `waitlist` = '$room'";
        $check = mysqli_query($conn, $check);
        $rows = mysqli_fetch_assoc($check);
        $name = $rows['waitlist'];
        $w_email = $rows['Work_email'];
        $w_ID = $rows['ID'];
        mysqli_free_result($check);
        return array($name, $w_email, $w_ID);
    }

    function getusers($conn, $room) {
        $users_data = [];
        $check = "SELECT * FROM `waitlists_joined` WHERE `waitlist` = '$room'";
        $check = mysqli_query($conn, $check);
        while ($rows = mysqli_fetch_assoc($check)){
            array_push($users_data, $rows);
        }
        $tot_no = count($users_data);

        return array ($users_data, $tot_no);
    }
    $users = getusers($conn, $room);
    $waitinfo = gettheinfo($conn, $room);

    $result = array ( 
        'wait_info' => array(
            'name' => $waitinfo[0],
            'email' => $waitinfo[1],
            'ID' => $waitinfo[2]
        ),  
        'users' => array(
            'users_number' => $users[1],
            'users_data' => $users[0]
        )
    );
    
    echo json_encode($result);

}
else{
        /**
     * gettheinfo(): Retrieve information about the creator of the waitlist.
     * It should return $name, $w_email, $w_ID of the creator of the waitlist
     *
     * @param $conn the connection to the database
     * @param $room the name of the waitlist
     *
     * @return array An array containing the name, email, and ID of the waitlist    creator
     */
    function gettheinfo($conn, $room) {
        if(!isset($room) || empty($room)){
            exit();
        }
        $check = "SELECT * FROM `waitlists_created` WHERE `waitlist` = '$room'";
        $check = mysqli_query($conn, $check);
        $rows = mysqli_fetch_assoc($check);
        $name = $rows['waitlist'];
        $w_email = $rows['Work_email'];
        $w_ID = $rows['ID'];
        mysqli_free_result($check);
        return array($name, $w_email, $w_ID);
    }

    /**
     * getusers(): Retrieve all users in the waitlist and the total number of users.
     *
     * @param $conn the connection to the database
     * @param $room the name of the waitlist
     *
     * @return array An array containing all users in the waitlist and the total    number of users.
     */
    function getusers($conn, $room) {
        if(!isset($room) || empty($room)){
            exit();
        }
        $users_data = [];
        $check = "SELECT * FROM `waitlists_joined` WHERE `waitlist` = '$room'";
        $check = mysqli_query($conn, $check);
        while ($rows = mysqli_fetch_assoc($check)){
            array_push($users_data, $rows);
        }
        $tot_no = count($users_data);

        return array ($users_data, $tot_no);
    }

    if(!isset($room) || empty($room)){
        exit();
    }else{
    $users_data = getusers($conn, $room)[0];
    }


    /**
     * getposition(): Retrieve the position of a user in the waitlist.
     *
     * @param $users_data The array of users
     * @param $email The email of the user you want to get the position of
     *
     * @return array The position of the email in the array and the full data of    the email.
     */
    function getposition($users_data, $email) {
        $position = $full_dt = '';
        if(!isset($users_data) || empty($users_data)){
            exit();
        }
        for($i=0; $i<count($users_data); $i++){
            if (($users_data[$i]['Email']) == $email){
                $position = $i + 1 ;
                $full_dt = $users_data[$i];
                break;
            }
        }
        return array($position, $full_dt);
    }
    $getposition = getposition($users_data , $email);
    $getusers = getusers($conn, $room);
    $gettheinfo = gettheinfo($conn, $room);

    $results = array(
        'waitlistinfo' => array(
            'name' => $gettheinfo[0],
            'email' => $gettheinfo[1],
            'ID' => $gettheinfo[2]
        ),
        'users' => array(
            'users_number' => $getusers[1],
            'users_data' => $getusers[0]
        ),
        'position' => array(
            'number' => $getposition[0],
            'details' => $getposition[1]
        )
    );
    echo json_encode($results);
}
?>