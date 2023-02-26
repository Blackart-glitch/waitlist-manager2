<?php include 'authentication.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lobbyx::register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="login.css">
    </head>
    <body class="body">
        <div class="form">
            <h1>Signup</h1>
            <form method="post" action="">
                <input type="text" placeholder="First name here" name="f_name" required>
                <input type="text" placeholder="Last name here" name="l_name"  required>
                <input type="text" placeholder="User name here" name="u_name"  required>
                <input type="tel" placeholder="Phone number with country code e.g +234..." name="phone_no" required>
                <span style="color: red; font-family: inherit;">  <?php echo $double_acc; ?></span>
                <input type="email" placeholder="Email here" name="email" required>
                <input type="password" placeholder="Password here" name="p_word" required>
                <input type="submit" name="register" value="SUBMIT" class="submit_btn">
            </form>
            <p class="login">Already registered? <a href="login.php">login here</a></p>
        </div>
    </body>
    <footer>

    </footer
</html>