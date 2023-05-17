<!DOCTYPE html>
<?php include 'waitcreate.php'; ?>
<html>

<head>
    <title>Lobbyx</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css">
</head>

<body class="body">
    <div class="form">

        <h1>WORK PROFILE</h1>
        <form method="post" action="">
            <input type="text" placeholder="Enter name" name="w-name" required>
            <input type="text" placeholder="Enter Title" name="w-title" required>
            <h3>Maximum number of applicants</h3>
            <select name="apps" required>
                <option value="20">20</option>
                <option value="60">60</option>
                <option value="100">100</option>
            </select>
            <h3>Available online</h3>
            <select name="avao" required>
                <option value="YES">YES</option>
                <option value="NO">NO</option>
            </select>
            <input type="email" placeholder="zoom Email (optional if yes)" name="z-mail">

            <input type="submit" name="update" value="UPDATE">
        </form>
        <p>Powered by Lobbyx.inc</p>
    </div>
</body>
<footer>

</footer>

</html>