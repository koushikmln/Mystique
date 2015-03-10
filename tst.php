<form class="appnitro"  method="post" action="login.php">
  <div class="form_description">
    <?php
    if (isset($_SESSION['msg']['login-err'])) {
      if ($_SESSION['msg']['login-err']) {
        echo '<table><tr style="margin-top:2px"><td ><img src="' . IMAGE_URL . 'cross.png"></td><td><div style="padding-bottom:2px;font-size:11px"><br/>' . $_SESSION['msg']['login-err'] . '</div></td></tr></table>';
        unset($_SESSION['msg']['login-err']);
      }
    }
    ?>
    <h2>Login</h2>
    <p>Mystique Beta 2.0 has begun!</p>
    <p>You will begin from where you last logged off.</p>
  </div>
  <label class="description" for="element_1">Nickname </label>
  <div>
    <input name="nickname" class="element text medium" type="text" maxlength="255" value=""/>
  </div>
  <label class="description" for="element_2">Password </label>
  <div>
    <input name="password" class="element text medium" type="password" maxlength="255" value=""/>
  </div>
  <ul>
    <li class="buttons">
      <input type="submit" name="submitbutton" id="submitbutton" value="Login" />
    </li>
  </ul>
</form>