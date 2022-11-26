<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
  <?php
  session_start();

  //Account Verification
  include "dbcon.php";
  if (isset($_POST['submit'])) {

    $user = $_POST['email'];
    $pass = $_POST['pass'];
    if ($con->connect_error) {
      die("Failed to connect: " . $con->connect_error);
    } else {
      $stmt = $con->prepare("SELECT * FROM rtu_admin WHERE admin_user = ?");
      $stmt->bind_param("s", $user);
      $stmt->execute();
      $stmt_result = $stmt->get_result();
      if ($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if ($data['admin_pass']  === $pass) {
          setcookie("email", $user, time() + 60 * 60 * 24);
          setcookie("pass", $pass, time() + 60 * 60 * 24);
          $_SESSION['user'] = $user;
          $_SESSION['whoactive'] = "0";
          header('location: adminpanelfinal.php#adminpanelcon');
          exit();
        } else {

          $_SESSION['pass_log'] = '0';
          header("refresh:0.5;url=homepage.php");
          exit();
        }
      } else {

        $_SESSION['pass_log'] = '0';
        header("refresh:0.5;url=homepage.php");
        exit();
      }
    }
  } elseif (isset($_COOKIE['email']) && isset($_COOKIE['pass'])) {
    header('location: adminpanelfinal.php#adminpanelcon');
    exit();
  }
  ?>
</body>

</html>