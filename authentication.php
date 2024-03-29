/**
 * The function handles user registration and login by validating input, checking for existing
 * accounts, and performing SQL queries.
 * 
 * @param data The code is a PHP script that handles user registration and login functionality. It
 * starts a session, includes a database connection file, and initializes variables for user input. The
 * `test_input()` function is a global function that sanitizes user input by removing whitespace,
 * slashes, and special characters.
 * 
 * @return There is no output being returned by the code. It is a PHP script that performs database
 * operations and redirects the user to different pages based on the actions they take (register or
 * login).
 */
<?php
session_start();
include 'database_connect.php';
$f_name = $l_name = $u_name = $email = $tel = $ip_addr = $p_word = "";
$nameErr = $emailErr = $ip_err = $double_acc = "";

// global function
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//checks, validate and assigns input to variables
if (isset($_POST['register'])) {
  $f_name = $_POST['f_name'];
  $l_name = $_POST['l_name'];
  $u_name = $_POST['u_name'];
  $email  = $_POST['email'];
  $tel    = $_POST['phone_no'];
  $p_word = $_POST['p_word'];
  // sql query to for registeration
  $b = "INSERT INTO users (FirstName, LastName, Username, Email, Telephone, P_word) VALUES ('$f_name', '$l_name', '$u_name', '$email', '$tel', '$p_word')";
  // sql query to check if theres an existing account
  $check = "SELECT * FROM users WHERE Email = '$email' ";
  $check = $conn->query($check); //performs the query
  $check = $check->num_rows; //checks number of rows from result

  if ($check === 1) {
    $double_acc = "An account exists with this email, please login";
  } else {
    $conn->query($b);
    $_SESSION['Email'] = $email;
    $_SESSION['Password'] = $p_word;
    header('location:account.php');
  }
} else if (isset($_POST['login'])) {
  $email  = $_POST['email'];
  $p_word = $_POST['p_word'];

  // sql query to check if account exists
  $check = "SELECT * FROM users WHERE Email = '$email' AND P_word = '$p_word' ";
  $check = $conn->query($check); //performs the query
  $check = $check->num_rows; //checks number of rows from result
  if ($check === 0) {
    $double_acc = "there is no account linked with these details. please register or check the details and try again";
  } else {
    $_SESSION['Email'] = $email;
    $_SESSION['Password'] = $p_word;
    header('location:account.php');
  }
}