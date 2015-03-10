<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?php echo isset($title) ? $title : "Mystique"; ?></title>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo IMAGE_URL; ?>favicon.ico" />
        <meta name="Mystique" content="Online Treasure Hunt" />
        <link rel="author" href="<?php echo SITE_URL; ?>humans.txt" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>normalize.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo CSS_URL; ?>view.<?php echo getNumberForCache(); ?>.css" />
        <script src="<?php echo JS_URL; ?>vendor/jquery-1.9.1.min.js"></script>
        <script src="<?php echo JS_URL; ?>bootstrap.js"></script>
        <script src="<?php echo JS_URL; ?>vendor/modernizr-2.6.2.min.js"></script>
        <script type="text/javascript" src="<?php echo JS_URL; ?>view.js"></script>
        <style type="text/css">
            a{text-decoration: underline; color: #173549;}
            a:hover {text-decoration: underline; color: #428bca;}
        </style>
    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
    <center>
        <div align="center" style='background:url(<?php echo IMAGE_URL . "type.png"; ?>);'>
            <a style='float: left; position: absolute; left: 0;' href="http://bitotsav.in" target="_blank"><img width="100%" style="padding:10px;" src="<?php echo IMAGE_URL; ?>bitotsav.png" /></a>
            <a style="text-decoration:none;" href="<?php echo SITE_URL; ?>" ><span style="text-decoration:underline;color:#1C2841;"><h2 id="title">MYSTIQUE</h2></span><!--<img src="<?php echo IMAGE_URL; ?>mystiquelogo.png"/>--></a>
        </div>
    </center>