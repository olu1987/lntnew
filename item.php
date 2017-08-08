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
    <link rel="stylesheet" href="build/css/main.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body class="item">
<?php
function db_connect() {

    // Define connection as a static variable, to avoid connecting more than once
    static $connection;

    // Try and connect to the database, if a connection has not been established yet
    if(!isset($connection)) {
        // Load configuration as an array. Use the actual location of your configuration file
        $config = parse_ini_file('/configs/config.ini');
        $connection = mysqli_connect('localhost',$config['username'],$config['password'],$config['dbname']);
    }

    // If connection was not successful, handle the error
    if($connection === false) {
        // Handle error - notify administrator, log to a file, show an error screen, etc.
        return mysqli_connect_error();
    }
    return $connection;
}

function db_query($query) {
    // Connect to the database
    $connection = db_connect();

    // Query the database
    $result = mysqli_query($connection,$query);

    return $result;
}

// A select query. $result will be a `mysqli_result` object if successful
$result = db_query("SELECT * FROM ".$_GET['table']." WHERE id = ".$_GET['id']);

if($result === false) {
    // Handle failure - log the error, notify administrator, etc.
} else {
    // Fetch all the rows in an array
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
}

if($_GET['table'] == 'clothing'){

    $image = 'item_image_url_2';

}else{

    $image = 'item_image_url';

}

?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img class="img-responsive" src="<?= $rows[0][$image]; ?>"/>
        </div>
        <div class="col-md-6">
            <h1><?= $rows[0]['item_name']; ?></h1>
            <p><?= $rows[0]['item_description']; ?></p>
            <p>£<?= $rows[0]['item_price']; ?></p>
        </div>
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
    <ul id="nav" class="list-inline collapse">
        <li><a href="index.html">. LNT . LONDON .</a></li>
        <li><a href="about.html">. ABOUT .</a></li>
        <li><a href="prints.html">. PRINTS .</a></li>
        <li><a href="accessories.html">. ACCESSORIES .</a></li>
        <li><a href="clothing.html">. CLOTHING .</a></li>
        <li><a href="blog.html">. BLOG .</a></li>
        <li><a href="contact.html">. CONTACT .</a></li>
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
                <li><a href="blog.html">. BLOG .</a></li>
                <li><a href="contact.html">. CONTACT .</a></li>
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
<script src="build/js/main.min.js"></script>

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

