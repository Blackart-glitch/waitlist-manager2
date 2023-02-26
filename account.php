<?php include'dashboard.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>Lobbyx</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="account.css">
    </head>
    <body>
        <!-- the body wrap contains the left nav and right nav of the page-->
        <div class="body_wrap">
            
            <div class="left_nav">
                <div class="profilepic">

                </div>
                <div class="acc_ID">
                        <p><?php echo "UID".$uid;?></p>
                </div>
                <div class="f_name">
                    <p><?php echo $f_name . " " . $l_name;?></p>
                </div>
                <div class="email">
                    <p><?php echo $email;?></p>
                </div>
                <div class="tel">
                    <p><?php echo $phone;?></p>
                </div>
                <div class="location">
                    <p><?php echo $state . " " . $country;?></p>
                </div>

                <h2>Joined waitlist</h2>

                <form method="post" action="" >
                    <select name="check" size="4">
                        <?php 
                        $i = 0;
                        while ($i < count($joiner)){
                        echo "<option>" . $joiner[$i] . "</option>";
                        $i++;
                        }
                        ?>
                    </select><br>
                    <input type="submit" id='info_join' name="checker" value="CHECK SCHEDULE" >
                </form>

            </div>
            <div class="right_nav">
                <!-- the top card of the right section of the page -->
                <div class="top_card">
                    <div class="search_bar">
                    <h2>Join a Lobby</h2>

                        <form method="post" action="" id="join-form">
                            <select name="code" size="4">
                            <?php 
                            $i = 0;
                            while ($i < count($joiner2)){
                            echo "<option>" . $joiner2[$i] . "</option>";
                            $i++;
                            }
                            ?>
                            </select><br>
                            <input type="submit" name="join" value="JOIN">
                        </form>

                    </div>

                </div>
                <!-- the top card ends here!! -->

                <!-- the bottom card of the right section of the page -->
                <div class="bottom_card">

                    <h2>Work profile</h2>
                    <label class="label">Display name</label><span> <?php    echo   $name;  ?> </span><br>
                    <label class="label">Display Title</label><span><?php    echo   $title; ?> </span><br>
                    <label class="label">Head count</label><span>   <?php    echo   $apps;  ?> </span><br>
                    <label class="label">Reset timer</label><span>  <?php    echo   $avao;  ?> </span><br>
                    <label class="label">Available online</label><span><?php echo   $avao;  ?> </span><br>
                    <label class="label">Work Email</label><span>   <?php    echo   $zmail; ?> </span>

                    <a href="waitlist_create.php" target="blank">update the profile</a>
                </div>
                <!-- the bottom card ends here!! -->
            </div>
        </div>


    <div id="info-popup">
        <h4>Waitlist info</h4>
        <div class="info_body">
            <span class="elmnt">total number of seats occupied</span><br>
            <span class="elmnt">You are currently number 8 on the list</span><br>
            <span class="elmnt">mode of entry:: physical</span><br>
            <span class="elmnt">current time:: 15:30pm</span><br>
            <span class="elmnt">manager online and is actively replying to all attendees</span><br>
        </div>
    </div>

<script>
// Get the button and the pop-up element
var btn = document.getElementById("info_join");
var popup = document.getElementById("info_popup");
var closeBtn = document.getElementById("close-btn");

// When the button is clicked, show the pop-up
btn.addEventListener("click", function() {
  info_popup.style.display = "block";
});

// When the user clicks outside the pop-up or the close button, hide it
window.addEventListener("click", function(event) {
  if (event.target !== info-popup && event.target !== closeBtn) {
    info_popup.style.display = "none";
  }
});

// When the close button is clicked, hide the pop-up
closeBtn.addEventListener("click", function() {
  info_popup.style.display = "none";
});

</script>
    </body>
    <footer>
        <div class="contact">
            <h2>Contact support here</h2>
            <form method="post" action="">
                <input type="text" placeholder="Enter your full name" >
                <input type="email"placeholder="Your email">
                <input type="text" placeholder="Subject of the mail">
                <textarea placeholder="Your message here..." cols="40" name="message" >

                </textarea>
                <input type="submit" value="Submit">
            </form>
        </div>
        <div class="contactman">
            <p>images used were outsourced</p>
        </div>
    </footer>









<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}

</script>
</html>