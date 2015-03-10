<?php
include 'config.php';
$err = array();
if (isset($_POST['email'])) {
  if ($_POST['email'] == "") {
    $err[] = 'You didnt fill up the box. How do you expect us to send you your password?!';
  } else if (!isValidEmail($_POST['email'])) {
    $err[] = 'Your email is not a valid email id!';
  } else {
    $sql = "select name, nickname, password from usermaster where email=?";
    $result = DB::findOneFromQuery($sql, array($_POST['email']));
    if (!$result) {
      $err[] = 'Sorry, there is no record of this email id with us!';
    }
    if (!count($err)) {
      $name = $result['name'];
      $nick = $result['nickname'];
      $pwd = $result['password'];
      $to = $_POST['email'];
      $subject = 'Mystique Treasure Hunt 2014 - Forgot Password';
      $body = 'Hi ' . $name . ',<br><br>Here are your login credentials: <br> Username: ' . $nick . '<br>Password: ' . $pwd . '<br> <br> Please <a href="http://mystique.bitotsav.in/">login to play Mystique</a>. <br>
			<br><br>Team Mystique';
      if (sendMail($to, $subject, $body, $name)) {
        $_SESSION['msg']['fp-success'] = 'Your password has been sent to ' . $to;
      } else {
        $err[] = 'Sorry, there was some error in sending the mail!';
      }
    }
  }
  if (count($err)) {
    $_SESSION['msg']['fp-err'] = implode('&nbsp;', $err);
  }
  redirectToAndExit("forgotpassword.php");
}

$title = "Mystique :: Forgot Password";
include INCLUDE_PATH . "header.php";
?>
<div class='remain'>
  <div class='container'><?php
    if (strtotime($actualDateDisplay) < strtotime($targetDateDisplay))
      displayTimer();
    else
      echo "<div class='timer' style='width:100%;padding-top:50px;'><span style='font-size: 80px;'>Mystique 3.0 has begun!</span></div>";
    ?></div>
</div>
</div>
<div class="container" style="margin-top: 20px;">
  <div class='col-md-6 col-md-offset-3'>
    <center>
      <div class='wrap-box'>
        <h2>Forgot Password</h2>
        Enter your email address:
        <form action="" method="post">
          <div class='col-md-10'><input class='form-control' type="text" name="email" id="email"/></div>
          <div class='col-md-2'><input class='btn btn-success' type="submit" name="submit" value="Send"/></div>
          <br/>
        </form>
        <br/> 
        <?php
        if (isset($_SESSION['msg']['fp-err'])) {
          if ($_SESSION['msg']['fp-err']) {
            echo ('<div class="alert alert-danger>"' . $_SESSION['msg']['fp-err'] . '</div>');
            unset($_SESSION['msg']['fp-err']);
          }
        }
        if (isset($_SESSION['msg']['fp-success'])) {
          if ($_SESSION['msg']['fp-success']) {
            echo ('<div class="alert alert-success">' . $_SESSION['msg']['fp-success'] . '</div>');
            unset($_SESSION['msg']['fp-success']);
          }
        }
        ?>
        Click <a href="index.php">here </a>to go back to the homepage.
      </div>
    </center>
  </div>
</div>
<?php include INCLUDE_PATH . "footer.php"; ?>