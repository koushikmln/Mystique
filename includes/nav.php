<nav class='navbar navbar-static-top' role='navigation'>
    <div class='container'>
        <ul class="nav navbar-nav">
            <li><a href="<?php echo SITE_URL; ?>">Home</a></li>
            <li><a href="<?php echo SITE_URL; ?>leaderboard.php">Leaderboard</a></li>
            <li><a href="https://apps.facebook.com/forumforpages/page/131461430229574" target='_blank'>Forum</a></li>
            <li><a href="https://apps.facebook.com/forumforpages/131461430229574/a5788ada-7a0c-4f63-9784-824185871ecb/0" target='_blank'>Rules</a></li>
            <li><a href='http://qbitmesra.blogspot.in/' target='_blank'>Our Blog</a></li>
            <li><div style='margin-top: 15px; margin-left: 5px;' class="fb-like" data-href="https://www.facebook.com/qbitmesra" data-layout="button" data-action="like" data-show-faces="true" data-share="true"></div></li>
        </ul>
        <?php if (isset($_SESSION['nick'])) { ?>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo SITE_URL . "?logoff"; ?>">Logout</a></li>
            </ul>
        <?php } ?>
    </div>
</nav>