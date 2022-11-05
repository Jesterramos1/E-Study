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

$(document).ready(function () {
  $('#Search_bar').keyup(function () {
    var txt = $(this).val();
    if (txt != '') {
      $.ajax({
        url: "fetch.php",
        method: "post",
        data: { search: txt },
        dataType: "text",

        success: function (data) {
          $('#result').html(data);
        }

      });

      $('#mainContainer, #Openbtn').hide();

    } else {
      $('#result').html('');
      $('#mainContainer, #Openbtn').show();
    }
  });


});
