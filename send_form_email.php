<?php
if(isset($_POST['email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "olu@claymoreminds.com";
    $email_subject = "LNT CONTACT REQUEST";

    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }


    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])  ||
        !isset($_POST['country']) ||
        !isset($_POST['subject'])
    ) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }



    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required
    $country = $_POST['country']; // required
    $subject = $_POST['subject']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if(!preg_match($email_exp,$email_from)) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if(!preg_match($string_exp,$first_name)) {
        $error_message .= 'The First Name you entered does not appear to be valid.<br />';
    }

    if(!preg_match($string_exp,$last_name)) {
        $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
    }

    if(strlen($comments) < 2) {
        $error_message .= 'The Comments you entered do not appear to be valid.<br />';
    }

    if(strlen($country) < 2) {
        $error_message .= 'Please select the country you are enquiring from.<br />';
    }
    if(strlen($subject) < 2) {
        $error_message .= 'Please select the subject of your enquiry.<br />';
    }

    if(strlen($error_message) > 0) {
        died($error_message);
    }

    $email_message = "Form details below.\n\n";


    function clean_string($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }



    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";
    $email_message .= "Country: ".clean_string($country)."\n";

// create email headers
    $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
    ?>

    <!doctype html>
    <html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>HOME | LNT LONDON</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->
        <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    </head>
    <body class="home">
    <div class="slideshow-wrapper">
        <div id="slideshow" class="container-fluid">

            <div class="row home-bg pic-one">
            </div>
            <div class="row home-bg pic-two">
            </div>
            <div class="row home-bg pic-three">
            </div>
        </div>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="navigation text-center">
            <ul class="list-inline text-right toggle-button">
                <li><a data-toggle="collapse" data-target="#nav" class="btn fa fa-bars"></a></li>
            </ul>
            <ul id="nav" class="list-inline collapse text-left">
                <li><a href="index.html">. LNT . LONDON .</a></li>
                <li><a href="about.html">. ABOUT .</a></li>
                <li><a href="prints.html">. PRINTS .</a></li>
                <li><a href="accessories.html">. ACCESSORIES .</a></li>
                <li><a href="clothing.html">. CLOTHING .</a></li>
                <li><a href="#">. BLOG .</a></li>
                <li><a href="#">. PRESS .</a></li>
                <li><a href="#">. CONTACT .</a></li>
                <li class="social">
                    <a target="_blank" href="https://en-gb.facebook.com/lntlondon/"><i class="fa fa-facebook"></i></a>
                    <a target="_blank" href="https://twitter.com/LNTLondon"><i class="fa fa-twitter"></i></a>
                    <a target="_blank" href="https://www.instagram.com/lntlondon/?hl=en"><i class="fa fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container-fluid">
        <footer class="row">
            <div class="col-md-12">
                <ul>
                    <li><a href="index.html">. LNT . LONDON .</a></li>
                    <li><a href="about.html">. ABOUT .</a></li>
                    <li><a href="#">. SITEMAP .</a></li>
                    <li><a href="#">. BLOG .</a></li>
                    <li><a href="#">. PRESS .</a></li>
                    <li><a href="#">. CONTACT .</a></li>
                    <li class="social">
                        <a target="_blank" href="https://en-gb.facebook.com/lntlondon/"><i class="fa fa-facebook"></i></a>
                        <a target="_blank" href="https://twitter.com/LNTLondon"><i class="fa fa-twitter"></i></a>
                        <a target="_blank" href="https://www.instagram.com/lntlondon/?hl=en"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>


    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-XXXXX-X','auto');ga('send','pageview');
    </script>
    </body>
    </html>


    Thank you for contacting us. We will be in touch with you very soon.

    <?php

}
?>
