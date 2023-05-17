<?php include 'dashboard.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Lobbyx</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="account.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
    <script src="Jquerylib.js"></script>
    <script src="scripts.js"></script>
</head>

<body>
    <!-- the body wrap contains the left nav and right nav of the page-->
    <div class="body_wrap">

        <div class="left_nav">
            <form action="logout.php" method="post">
                <input type="submit" name="logout" value="Logout">
            </form>
            <div class="profilepic">
                <h4><?php echo $f_name . " " . $l_name; ?></h4>
            </div>
            <div class="acc_ID">
                <p><?php echo "UID " . $uid; ?></p>
            </div>
            <div class="email">
                <p><?php echo $email; ?></p>
            </div>
            <div class="tel">
                <p><?php echo $phone; ?></p>
            </div>
            <div class="location">
                <p><?php echo $state . " " . $country; ?></p>
            </div>

            <h2>Joined waitlist</h2>

            <form id='join_info' method="post" action="">
                <select name="check" size="4">
                    <?php
                    $i = 0;
                    while ($i < count($joiner)) {
                        echo "<option>" . $joiner[$i] . "</option>";
                        $i++;
                    }
                    ?>
                </select><br>
                <input type="submit" id='info_join' name="checker" value="CHECK SCHEDULE">
            </form>

            <h2>created waitlists</h2>

            <form id="create_info" method="post" action="">
                <select name="check2" size="4">
                    <?php
                    foreach ($joiner3 as $key) {
                        echo "<option>" . $key . "</option>";
                    }
                    ?>
                </select>
                <input type="submit" value="VIEW LOBBY" id="info_create" name="viewer">
            </form>



            <div id="info_join_modal" class="modal">
                <div class="modal-content" id="join-content">
                    <span class="close">&times;</span>

                    <div id="prepend1"></div>

                    <h4>Waitlist info</h4>

                    <span id="elmnt1">total number of seats occupied </span><span id='data1' style="color:green;"></span><br>
                    <span id="elmnt2">You are currently number <span id='data2' style="color:green;"></span> on the list</span><br>
                    <span id="elmnt3">mode of entry:: physical</span><span id='data3'></span><br>
                    <span id="elmnt4">current time <span id='data4' style="color:green; "></span></span><br>
                    <span id="elmnt5">manager online and is actively replying to all attendees</span><br>

                    <form id='exit_joined' method="post" action="">
                        <input type="text" id="room" name="room">
                        <input type="submit" value="EXIT FROM LOBBY" name="remove" style="color:white; background-color:red;">
                    </form>
                </div>
            </div>

            <div id="info_create_modal" class="modal">
                <div class="modal-content " id="create-content">
                    <span class="close">&times;</span>

                    <h4>Waitlist info</h4>

                    <span class="temps">total number of attendees </span><span id="sdata1"></span><br>
                    <span class="temps"><span id="sdata2"></span> is next on the list </span><br>
                    <Form id='partpart' method="post" action="">
                        <input type="text" id="room2" name="room">
                        <input type="text" id="nxtapp" name="nextapp">
                        <input type="text" id="crtemail" name="crtemail">
                        <input type="button" id="attdn" value="VIEW ALL ATTENDEES">
                        <input type="submit" value="SKIP APPLICANT" id="skp" name="skip">
                        <input type="submit" value="CLEAR THE LOBBY" id="clr" name="clear">
                        <input type="submit" value="SEND MESSAGE" id="snd">
                    </Form>

                </div>
            </div>

            <div id="info_attend_modal" class="modal">
                <div class="modal-content" id="attend-content">
                    <span class="close">&times;</span>

                    <h4>Attendees</h4>
                    <div id="apps">

                    </div>


                </div>
            </div>
            <div id="success_modal" class="modal">
                <div class="modal-content" id="success-content">
                    <span class="close">&times;</span>

                    <h2>Action successful</h2>

                </div>
            </div>
            <div id="info_msg_modal" class="modal">
                <div class="modal-content" id="msg-body">
                    <span class="close">&times;</span><br><br>
                    <div id="caca">
                        <h4>Messages</h4>
                        <div id="btns">
                            <input type="button" value="SENT" id="snt-btn">
                            <input type="button" value="RECEIVED" id="recvd-btn">
                        </div>
                        <div id="msg-content">

                        </div>
                    </div>
                    <div id="coco">

                    </div>
                </div>
            </div>

        </div>
        <div class="right_nav">
            <!-- the top card of the right section of the page -->
            <div class="top_card">
                <div class="search_bar">
                    <h2>Join a Lobby</h2>
                    <form method="post" action="" id="join-form">
                        <?php
                        // Get the elements that exist in $joiner2 but not in $joiner
                        $joiner2 = array_diff($joiner2, $joiner);
                        ?>
                        <select name="code" size="4">
                            <?php
                            foreach ($joiner2 as $key) {
                                echo "<option>" . $key . "</option>";
                            }
                            ?>
                        </select><br>
                        <input type="submit" name="join" value="JOIN">
                    </form>
                </div>
                <div class="messages">
                    <input type="button" id="messg" value="check messages">
                </div>
            </div>
            <!-- the top card ends here!! -->

            <!-- the bottom card of the right section of the page -->
            <div class="bottom_card">
                <h2>Work profile</h2>
                <label class="label">Display name</label><span> <?php echo   $name;  ?> </span><br>
                <label class="label">Display Title</label><span><?php echo   $title; ?> </span><br>
                <label class="label">Head count</label><span> <?php echo   $apps;  ?> </span><br>
                <label class="label">Reset timer</label><span> <?php echo   $avao;  ?> </span><br>
                <label class="label">Available online</label><span><?php echo   $avao;  ?> </span><br>
                <label class="label">Work Email</label><span> <?php echo   $zmail; ?> </span>
                <a href="waitlist_create.php?email=<?php echo urlencode($email); ?>&id=<?php echo urlencode($uid); ?>" target="_blank">update the profile</a>
            </div>
            <!-- the bottom card ends here!! -->
        </div>
    </div>
</body>
<footer>
    <div class="contact">
        <h2>Contact support here</h2>
        <form method="post" action="">
            <input type="text" placeholder="Enter your full name">
            <input type="email" placeholder="Your email">
            <input type="text" placeholder="Subject of the mail">
            <textarea placeholder="Your message here..." cols="40" name="message">
            </textarea>
            <input type="submit" value="Submit">
        </form>
    </div>
    <div class="contactman">
        <p>images used were outsourced</p>
    </div>

</footer>

</html>