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
            <input type="text" list="state-list" placeholder="Select a state" id="state-input" name="state" required>
            <datalist id="state-list">
                <option value="Abia">
                <option value="Adamawa">
                <option value="Akwa Ibom">
                <option value="Anambra">
                <option value="Bauchi">
                <option value="Bayelsa">
                <option value="Benue">
                <option value="Borno">
                <option value="Cross River">
                <option value="Delta">
                <option value="Ebonyi">
                <option value="Edo">
                <option value="Ekiti">
                <option value="Enugu">
                <option value="Gombe">
                <option value="Imo">
                <option value="Jigawa">
                <option value="Kaduna">
                <option value="Kano">
                <option value="Katsina">
                <option value="Kebbi">
                <option value="Kogi">
                <option value="Kwara">
                <option value="Lagos">
                <option value="Nasarawa">
                <option value="Niger">
                <option value="Ogun">
                <option value="Ondo">
                <option value="Osun">
                <option value="Oyo">
                <option value="Plateau">
                <option value="Rivers">
                <option value="Sokoto">
                <option value="Taraba">
                <option value="Yobe">
                <option value="Zamfara">
            </datalist>
            <input type="text" placeholder="First name here" name="f_name" required>
            <input type="text" placeholder="Last name here" name="l_name" required>
            <input type="text" placeholder="User name here" name="u_name" required>
            <input type="tel" placeholder="Phone number with country code e.g +234..." name="phone_no" required>
            <span style="color: red; font-family: inherit;"> <?php echo $double_acc; ?></span>
            <input type="email" placeholder="Email here" name="email" required>
            <input type="password" placeholder="Password here" name="p_word" required>
            <input type="submit" name="register" value="SUBMIT" class="submit_btn">
        </form>
        <p class="login">Already registered? <a href="login.php">login here</a></p>
    </div>
</body>
<footer>
    <script>
        document.getElementById("my-form").addEventListener("submit", function(event) {
            var stateInput = document.getElementById("state-input");
            var stateList = document.getElementById("state-list");
            var valid = false;
            for (var i = 0; i < stateList.options.length; i++) {
                if (stateList.options[i].value === stateInput.value) {
                    valid = true;
                    break;
                }
            }
            if (!valid) {
                alert("Please select a valid state from the list.");
                event.preventDefault();
            }
        });
    </script>
</footer>

</html>