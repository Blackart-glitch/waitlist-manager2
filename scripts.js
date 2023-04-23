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
          console.log(formData);
          console.log(data); // logs the response data to the console
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
          console.log(formData2);
          console.log(data); // logs the response data to the console
          if (data) {
            users_data = data.users.users_data;
            console.log(users_data);

            if ((data.users) && data.users.users_number !== 0) {
              $('#sdata1').text(data.users.users_number);
              $('#sdata2').text(data.users.users_data[0].Email);
              $('#room2').val(data.wait_info.name);
              $('#nxtapp').val(data.users.users_data[0].Email);
              $('#crtemail').val(data.wait_info.email);

              $('#room2, #nxtapp, #crtemail').hide();
            }else{
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
      if (users_data) {
        for (let i = 0; i < users_data.length; i++) {
          $('#apps').append($('<div>', {
            id: 'datausers'+i,
          }));
          $('#datausers'+i).html(
            " user <b>"+users_data[i].Email+"</b> is number "+ (i+1)
          );          
        }
        info_attend_modal.style.display = "block";
      }else{
        console.log('users_data not set');
      }
    });

  });
  