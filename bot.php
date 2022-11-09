<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Chatbot with PHP, MySQL and JS fetch</title>
  <link rel="stylesheet" href="bot.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <!------<div id="bot">
  <div id="container">
    <div id="header">
        Online Chatbot App
    </div>

    <div id="body" class="chat-body">
        <div class="userSection">
          <div class="messages user-message">

          </div>
          <div class="seperator"></div>
        </div>
        <div class="botSection">
          <div class="messages bot-reply">

          </div>
          <div class="seperator"></div>
        </div>        
    </div>

    <div id="inputArea" class="chat-body">
      <input type="text" name="messages" id="userInput" autocomplete="off" placeholder="Please enter your message here" required>
      <input type="submit" id="send" value="Send">
    </div>
  </div>
  </div>

  <script type="text/javascript">
      
      document.querySelector("#send").addEventListener("click", async () => {
        let xhr = new XMLHttpRequest();
        var userMessage = document.querySelector("#userInput").value;
        let userHtml = '<div class="userSection">'+'<div class="messages user-message">'+userMessage+'</div>'+
        '<div class="seperator"></div>'+'</div>'
        if(userMessage.search(/Book/i) > -1 ){
          setTimeout(function() { 
            location.href = 'scheduling.php';
          }, 2000);
          

        }
        document.querySelector('#body').innerHTML+= userHtml;

        xhr.open("POST", "query.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(`messageValue=${userMessage}`);

        xhr.onload = function () {
            let botHtml = '<div class="botSection">'+'<div class="messages bot-reply">'+this.responseText+'</div>'+
            '<div class="seperator"></div>'+'</div>'
            
            document.querySelector('#body').innerHTML+= botHtml;
        }

      })
      
  </script>----->
  <div class="wrapper">
    <div class="title">Simple Online Chatbot</div>
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
        <input id="data" type="text" autocomplete="off" placeholder="Type something here.." required>
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
    });
  </script>

</body>

</html>