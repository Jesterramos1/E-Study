 //Login Form Script
 function openForm() {
    $('#myForm').show();
  }

  function closeForm() {
    $('#myForm').hide();
  }

  function openmail() {
    document.getElementById("message").style.display = "block";
  }

  $(document).ready(function() {
    $('#Search_btn').click(function() {
      var txt = $('#Search_bar').val().trim();
      if (txt != '') {
        $.ajax({
          url: "fetch.php",
          method: "post",
          data: {
            search: txt
          },
          dataType: "text",

          success: function(data) {
            $('#result').html(data);
          }

        });

        $('#mainContainer, #Openbtn, #chatbotbtn').hide();


      }

    });

    $('#Search_bar').keyup(function(){
      var txt = $('#Search_bar').val().trim();
      if(txt == ''){

        $('#result').html('');
        $('#mainContainer, #Openbtn, #chatbotbtn').show();

      }

    });


  });
