<?php
include 'config.php';
if (isset($_GET['logoff'])) {
    $_SESSION = array();
    session_destroy();
    redirectToAndExit(SITE_URL);
}
if (!isset($_SESSION['nick'])) {
    $title = "Mystique :: Home";
    include INCLUDE_PATH . "header.php";
    ?>
    <div class='remain' style="margin-top:10%;">
        <div class='container' align="center">
            <?php
            if (strtotime($actualDateDisplay) < strtotime($targetDateDisplay)) {
                displayTimer();
            } else {
                echo "<div class='timer' style='width:100%;padding-top:50px;'><span style='font-size: 80px;'>Mystique 3.0 has begun!</span></div>";
            }
            ?>
        </div>
    </div>
    <div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
             <a id="modal-370558" href="#modal-container-370558" role="button" class="btn" data-toggle="modal"><button class="btn btn-default">Register</button></a>
            
            <div class="modal fade" id="modal-container-370558" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <div class='wrap-box'>
                            <h2>Register</h2>
                            <form class="form-horizontal"  method="post" action="<?php echo SITE_URL; ?>register.php">
                                <?php
                                if (isset($_SESSION['msg']['reg-err'])) {
                                    if ($_SESSION['msg']['reg-err']) {
                                        echo ('<div class="alert alert-danger">' . $_SESSION['msg']['reg-err'] . '</div>');
                                        unset($_SESSION['msg']['reg-err']);
                                    }
                                }
                                if (isset($_SESSION['msg']['reg-success'])) {
                                    if ($_SESSION['msg']['reg-success']) {
                                        echo ('<div class="alert alert-success">' . $_SESSION['msg']['reg-success'] . '</div>');
                                        unset($_SESSION['msg']['reg-success']);
                                    }
                                }
                                ?>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="inputEmail">Name</label>
                                    <div class="col-sm-6">
                                        <input class='form-control' name="fname" placeholder="So that we know who you are" type="text" maxlength="255" value="<?php echo SessionData::get("data", "fname"); ?>"/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="inputEmail">College Name</label>
                                    <div class="col-sm-6">
                                        <input class='form-control' name="college" type="text" maxlength="255" value="<?php echo SessionData::get("data", "college"); ?>"/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="inputEmail">Email ID</label>
                                    <div class="col-sm-6">
                                        <input class='form-control' name="email" placeholder="For communicating with you" type="text" maxlength="255" value="<?php echo SessionData::get("data", "email"); ?>"/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="inputEmail">Nickname</label>
                                    <div class="col-sm-6 controls">
                                        <input class='form-control' name="nickname" placeholder="Visible in the leaderboard" type="text" maxlength="255" value="<?php echo SessionData::get("data", "nickname"); ?>"/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="inputEmail">Password</label>
                                    <div class="col-sm-6">
                                        <input class='form-control' name="password" type="password" maxlength="255" value="<?php echo SessionData::get("data", "password"); ?>"/> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-sm-6">
                                        <input type="submit" name="submitbutton" id="submitbutton" class="btn btn-success" value="Register" />
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
    </div>
    <?php     include INCLUDE_PATH . "footer.php"; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6">
                <?php
                if (strtotime($actualDateDisplay) >= strtotime($targetDateDisplay)) {
                    ?>
                    <div class='wrap-box'>
                        <h2>Login</h2>
                        <form class="form-horizontal" method="post" action="login.php">
                            <?php
                            if (isset($_SESSION['msg']['login-err'])) {
                                if ($_SESSION['msg']['login-err']) {
                                    echo '<div class="alert alert-danger">' . $_SESSION['msg']['login-err'] . '</div>';
                                    unset($_SESSION['msg']['login-err']);
                                }
                            }
                            ?>
                            <p>You will begin from where you last logged off.</p>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputEmail">Nickname</label>
                                <div class="col-sm-6">
                                    <input class='form-control' name="nickname" type="text" maxlength="255" value=""/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label" for="inputEmail">Password</label>
                                <div class="col-sm-6">
                                    <input class='form-control' name="password" type="password" maxlength="255" value=""/>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-success" name="submitbutton" id="submitbutton" value="Login" />
                        </form>
                        <a href="<?php echo SITE_URL; ?>forgotpassword.php" target="_blank"><h3>Forgot password?</h3></a>
                    </div>
                    <?php
                }
                ?>
                
            </div>
        </div>
    </div>
    <?php
} else {
    $details = getUserDetails($_SESSION['nick']);
    $sql = "select * from levelmaster where levelcode=:level";
    $row = DB::findOneFromQuery($sql, array(":level" => $details['levelcode']));
    $url = implode('.', array_slice(explode('.', $row['starting_url']), 0, -1));
    if (isset($_GET['level']) && $url == $_GET['level']) {
        $title = $row['page_title'];
        include INCLUDE_PATH . "header.php";
        include INCLUDE_PATH . "nav.php";
        ?>
        <div class='col-md-3'>
            <?php require_once INCLUDE_PATH . "sidebar2.php" ?>
        </div>
        <script>
            $(document).ready(function() {
                $('#skip').submit(function() {
                    var r = confirm("Are you sure you want to skip this question?");
                    return r;
                });
            });
        </script>
        <div class='col-md-9'>
            <div class='wrap-box' style='margin-bottom: 50px;'>
                <h2>Level : <?php echo $details['levelcode']; ?></h2>
                <?php echo $row['page_content']; ?>
                <div id='postcontainer' align='center' style="margin-top: 20px;">
                    <?php if ($details['levelcode'] != 31) { ?>
                        <form  action='<?php echo SITE_URL; ?>levelupdate.php' method='post'>
                            <input class='form-control gameanswer' type="text" name="answer"/>
                            <input style="margin-right: 50px" class="btn btn-success" type="submit" name="submit" value="Answer"/>
                        </form><br/>
                        <form  id='skip' action='<?php echo SITE_URL; ?>levelupdate.php' method='post'>
                            <div class='btn-group'>
                                <?php
                                if ($details['levelcode'] <= 20) {
                                    for ($i = 1; $i <= $details['skips']; $i++) {
                                        ?>
                                        <input class="btn <?php
                                               if ($details['skips'] - $i == 2)
                                                   echo "btn-success";
                                               else if ($details['skips'] - $i == 1)
                                                   echo "btn-warning";
                                               else
                                                   echo "btn-danger"
                                                   ?>" type="submit" name="submit" value="Skip"/>
                                               <?php
                                           }
                                       }
                                       ?>
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php
        include INCLUDE_PATH . "footer.php";
    } else {
        redirectToAndExit(SITE_URL . $url);
    }
}
