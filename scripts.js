
$(document).ready(function() {
    // Get the modal
    var info_join_modal = document.getElementById("info_join_modal");
    var info_create_modal = document.getElementById("info_create_modal");
  

/*     $('#join-form').submit(function(e) {
      // show the success message
      $('#success_modal').toggle();
      setTimeout(function () {
        $('#success_modal').toggle();
      }, 3000); // Hide the modal after 3 seconds
    }); */

//This is used to close the modal when the user clicks on the close button. 
    $('.close').on('click', function() {
      $(this).closest('.modal').fadeOut();
    });    
    
/* when the user clicks anywhere outside of the info_join_modal, close it */
    window.onclick = function(event) {
      if (event.target == info_join_modal || event.target == info_create_modal) {
        info_join_modal.style.display = "none";
        info_create_modal.style.display = "none";
      }
    }
  
    $('#join_info').submit(function(event) {
      event.preventDefault(); // prevent form from submitting normally
  
      var formData = $(this).serialize(); // serialize form data
  
      $.ajax({
        url: 'join_info.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(data) {
          // handle success
          console.log('data was gotten'); // logs the response data to the console
        if (data) {
        
          $('#room').val(data.waitlistinfo.name);
          $('#room').hide();
          if (data.waitlistinfo) {
            $('#prepend1').text(data.waitlistinfo.name + ' created by ' + data.waitlistinfo.email + ' with ID number ' + data.waitlistinfo.ID);
          }else{$('#prepend1').hide();}
          if (data.users) {
            $('#data1').text(data.users.users_number);
          }
          if (data.position) {
            $('#data2').text(data.position.number);
          }
          var intervalID = setInterval(() => {
            $('#data4').text(new Date().toLocaleTimeString());
          }, 1000);
          // clear interval after 5 seconds
          setTimeout(() => {
            clearInterval(intervalID);
          }, 50000);
          info_join_modal.style.display = "block";
        }
        },
        error: function(_jqXHR, _textStatus, _errorThrown) {
          // handle errors
          console.log('An error occurred while processing the request: ' + textStatus);
        }
      });
    });

    var users_data;

    $('#create_info').submit(function(event){
      event.preventDefault(); // prevent form from submitting normally
  
      var formData2 = $(this).serialize(); // serialize form data
      $.ajax({
        url: "join_info.php",
        type: "POST",
        data: formData2,
        dataType: "json", // expected data type
        success: function(data) {
          // handle successful response
          console.log('data was successfully received'); // logs the response data to the console
          if (data) {
            users_data = data.users.users_data;
            //if data isn't null, assign them to their html placeholder
            if ((data.users) && data.users.users_number !== 0) {
              $('#sdata1').text(data.users.users_number);
              $('#sdata2').text(data.users.users_data[0].Email);
              $('#room2').val(data.wait_info.name);
              $('#nxtapp').val(data.users.users_data[0].Email);
              $('#crtemail').val(data.wait_info.email);

              $('#room2, #nxtapp, #crtemail').hide();//hides the other buttons
            }else{//empties the modal container and sends a message that no one's in the lobby
              $('#create-content').empty();
              $('#create-content').append('<span class="close">&times;</span><br><h4>There\'s no one in the lobby right now</h4>');

            }
            // makes the modal visible on the screen.
            info_create_modal.style.display = "block";
          }
          
            // info_create_modal.style.display = "block";
        },
        error: function(_jqXHR, _textStatus, _errorThrown) {
          // handle error response
          console.log('error returning data');
        }
      })
    });

    $('#attdn').on('click', function () {
      // Check if users_data has been set
      if (users_data) {
        // Loop through users_data
        for (let i = 0; i < users_data.length; i++) {
          console.log(i);
          // Append a div element with an ID of "datausers[i]" and a class of "attendees" to the #apps element
          $('#apps').append($('<div>', {
            id: 'datausers'+i,
            class: 'attendees'
          }));
          // Set the content of the div element
          $('#datausers'+i).html(
            " user <b>"+users_data[i].Email+"</b> is number "+ (i+1)+" on the list"
          );          
        }
        // Show the info_attend_modal element
        info_attend_modal.style.display = "block";
      } else {
        console.log('users_data not set');
      }
    });    
    //dynamically adds containers and overall structure of the message list
    function appendmsg(arr, str, s_r){
      $.each(arr, function (i, msg) { 
        // Append a new message container to the '#msg-content' div
        $('#msg-content').append(
          $("<span>").attr({id: 'msg'+i}).addClass("message-container").append(
            // Left-side container
            $("<span>").addClass("left-side").append(
              $("<span>").addClass("bky").text(str+":"),
              $("<br>"),
              $("<span>").addClass("bky").text(msg[s_r]) // Display the sender or receiver depending on the argument passed to the function
            ),
    
            // Mid-section container
            $("<span>").addClass("mid-sect").append(
              $("<span>").addClass("bky").text("MESSAGE"),
              $("<br>"),
              $("<span>").addClass("bky").text(msg.BODY) // Display the message body
            ),
    
            // Right-side container
            $("<span>").addClass("right-side").append(
              $("<span>").addClass("bky").text("DATE:"),
              $("<br>"),
              $("<span>").addClass("bky").text(msg.DATE) // Display the message date
            )
          )
        );
      });
    }    
  // When the element with the ID 'messg' is clicked
  $('#messg').on('click', function () {
    // Make an AJAX request to the 'messages.php' file to get data
    $.ajax({
      url: "messages.php",
      method: "GET",
      dataType: "json", // Set the expected data type to JSON
      success: function(data) {
        console.log(data); // Log the data to the console for debugging
        var tot = data.sent_count + data.received_count; // Calculate the total number of messages
        $('#snt-btn').val('SENT (' + data.sent_count + ')'); // Set the value of the element with the ID 'snt-btn'
        $('#recvd-btn').val('RECEIVED (' + data.received_count + ')'); // Set the value of the element with the ID 'recvd-btn'
        $('#messg').val('MESSAGES (' + tot + ')'); // Set the value of the element with the ID 'messg'

        // Detect when the mouse enters and leaves each side of the container
        $('.left-side, .right-side, .mid-sect').hover(
          function() {
            // Calculate the width of the content
            var contentWidth = $(this).find('.bky').width() + 10; // Add 10 pixels for padding
            // Set the width of the container to fit the content
            $(this).parent().width(contentWidth);
          },
          function() {
            // Reset the width of the container
            $(this).parent().width('auto');
          }
        );

        // Call the 'appendmsg' function with the data for sent messages, 'FROM' as the sender label, and 'RECEIVER' as the receiver label
        appendmsg(data.sent, 'FROM', 'RECEIVER');

        // When the element with the ID 'snt-btn' is clicked, empty the message content and call the 'appendmsg' function with the data for sent messages, 'TO' as the sender label, and 'RECEIVER' as the receiver label
        $('#snt-btn').on('click', function (){
          $('#msg-content').empty();
          appendmsg(data.sent, 'TO', 'RECEIVER')
        });

        // When the element with the ID 'recvd-btn' is clicked, empty the message content and call the 'appendmsg' function with the data for received messages, 'FROM' as the sender label, and 'SENDER' as the receiver label
        $('#recvd-btn').on('click', function (){
          $('#msg-content').empty();
          appendmsg(data.received, 'FROM', 'SENDER')
        });

        // Show the element with the ID 'info_msg_modal'
        $('#info_msg_modal').show(); 
      },
      fail: function(jqXHR, textStatus, errorThrown) {
        console.log("Error: " + errorThrown); // Log any errors to the console
      }
    });
  });
  $('#snd').on('click', function (event) {
    event.preventDefault();
    $('#coco').empty();
    
    // Create a new form with attributes and append it to #coco element
    $('#coco').append($('<form>').attr({name: 'sndmsg', id: 'sndmsg', method: 'post'}));
    
    // Add form fields to the form element
    $('#sndmsg').append(
      $('<h4>').text('SEND A MESSAGE'),
      $('<input>').attr({name:'sender', type: 'email',  style: 'display: block; width: 90%; padding: 10px', placeholder: 'Receiver\'s email'}),
      $('<textarea>').attr({name: 'message', type: 'text', style: 'display: block; width: 90%; padding: 10px', placeholder: 'Your message here...'}),
      $('<input>').attr({name: 'sendmsg', type: 'submit', style: 'display: block; width: 30%; padding: 10px', id: 'sendmsg', value: 'SEND'}),
      $('<div>').attr({id: 'mesgresponse', style: 'color: green;'})
    ).attr({style: 'padding: 10px'});
  
    // Show the info message modal
    $('#info_msg_modal').show(); 
    // Attach a submit event to the #sndmsg form
    $('#sndmsg').submit(function(event) {
      event.preventDefault(); 
      // Check if both fields have a value
      if($('input[name="sender"]').val() === '' || $('textarea[name="message"]').val() === '') {
        $('#mesgresponse').text('Please enter a valid email and message');
        return;
      }
      var formData3 = {
        sender: $('input[name="sender"]').val(),
        messages: $('textarea[name="message"]').val()
      };
      $.ajax({
        type: "POST",
        url: "messages.php",
        data: formData3,
        dataType: "json",
        success: function(data) {
          if (data.sql === 'success') {
            $('#mesgresponse').text('message sent, please check your inbox for a reply');
          }
        },
        error: function(xhr, status, error) {
          console.log("An error occurred: " + error);
        }
      });
    });
  });   
});