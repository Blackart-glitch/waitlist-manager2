<?php 
include 'authentication.php'; 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lobbyx</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="login.css">
    </head>
    <body class="body">
        <div class="form">
            
            <h1>login</h1>
            <form method="post" action="">
                <span style="color: red; font-family: inherit;">  <?php echo $double_acc; ?></span>
                <input type="email" placeholder="Email here" name="email" class="inputs" required>
                <input type="password" placeholder="Password here" name="p_word" class="inputs" required>
                <input type="submit" name ="login" value="LOGIN">
            </form>
            <p>Not registered yet? <a href="register.php">Signup here</a></p>
        </div>
    </body>
    <footer>

    </footer>
</html>