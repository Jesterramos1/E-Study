<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Chatbot with PHP, MySQL and JS fetch</title>
  <link rel="stylesheet" href="bot.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/themes/smoothness/jquery-ui.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"></script>
</head>

<body>

  <div class="wrapper">
    <div class="title">OLAF Assistance</div>
    <div class="form">
      <div class="bot-inbox inbox">
        <div class="icon">
          <i class="fas fa-user"></i>
        </div>
        <div class="msg-header">
          <p>Hello there, how can I help you?</p>
        </div>
      </div>
    </div>
    <div class="typing-field">
      <div class="input-data">
        <input id="data" type="text" placeholder="Type something here.." required>
        <button id="send-btn">Send</button>
      </div>
    </div>
  </div>
  <script>
    $(document).ready(function() {
      $("#send-btn").on("click", function() {
        $value = $("#data").val();
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
        $(".form").append($msg);
        $("#data").val('');

        // start ajax code
        $.ajax({
          url: 'query.php',
          type: 'POST',
          data: 'text=' + $value,
          success: function(result) {
            $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
            $(".form").append($replay);
            // when chat goes down the scroll bar automatically comes to the bottom
            $(".form").scrollTop($(".form")[0].scrollHeight);
          }
        });
      });

      $(function() {
        $("#data").autocomplete({
          source: 'query.php',
          select: function(event, ui) {
            event.preventDefault();
            $("#data").val(ui.item.value);
          },

          position: {
            my: "left top",
            at: "left bottom",
            collision: "fit flip"
          }
        });
      });
    });
  </script>

</body>

</html>