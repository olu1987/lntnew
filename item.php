<?php include './factory/item-factory.php'; ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $rows[0]['item_name']; ?> | LNT LONDON</title>
    <meta name="description" content="London based luxury fashion brand. Specializing in prints and clothing">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="build/css/main-v1.4.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body class="item">
<?php include_once("analytics.php") ?>
<div id="loader" class="loader-container active">
    <img class="icon-key" src="img/icon-key-small.jpg"/>
    <div class="sp sp-circle"></div>
</div>
<div class="navigation text-center">
    <ul class="list-inline text-right toggle-button">
        <li><a data-toggle="collapse" data-target="#nav" class="btn fa fa-bars"></a></li>
    </ul>
    <ul id="nav" class="list-inline collapse">
        <li><a href="index.html">. LNT . LONDON .</a></li>
        <li><a href="about">. ABOUT .</a></li>
        <li><a href="prints">. PRINTS .</a></li>
        <li><a href="accessories">. ACCESSORIES .</a></li>
        <li><a href="clothing">. CLOTHING .</a></li>
        <li><a href="contact">. CONTACT .</a></li>
        <li class="social">
            <form class="item-bag-wrap" target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
                <input class="item-bag" type="image" src="img/view-bag.png" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
            </form>
            <a target="_blank" href="https://en-gb.facebook.com/lntlondon/"><i class="fa fa-facebook"></i></a>
            <a target="_blank" href="https://twitter.com/LNTLondon"><i class="fa fa-twitter"></i></a>
            <a target="_blank" href="https://www.instagram.com/lntlondon/?hl=en"><i class="fa fa-instagram"></i></a>
        </li>
    </ul>
</div>
<div class="container">

    <div class="row">
        <div class="col-md-6">
              <?php include $config->imageUrl ?>
        </div>
        <div class="col-md-6 text-center item-details">
            <h1><strong><span class="left-dot">.</span><?= $rows[0]['item_name']; ?><span class="right-dot">.</span></strong></h1>
            <h1><small><?= $rows[0]['sub_text']; ?></small></h1>
            <hr class="line-through">
            <p class="price">£<?= $rows[0]['item_price']; ?></p>
            <p class="text-left description"><?= $rows[0]['item_description']; ?></p>
            <hr>
            <?php if(isset($config->printItemDetails)): ?>
                 <?php include $config->printItemDetails; ?>
            <?php else: ?>
            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="<?= $rows[0]['button_id']; ?>">
                <div class="row">
                    <div class="col-md-12 col-sm-12">

                    <!-- size/item select -->
                    <table class="sizes-select">
                    <?php isset($config->sizeItemPartial) ? include $config->sizeItemPartial:false; ?>
                    <?php isset($config->sizeGuideLink) ? include $config->sizeGuideLink:false; ?>
                    </table>

                    <!-- Item details --> 
                    <p data-toggle="collapse" data-target="#details" class="info text-left <?php if($table == 'accessories'):?>accessories-details <?php endif; ?>">DETAILS</p>
                    <?php if($table == 'clothing' && $rows[0]['item_type'] == 'top' || isset($table) && $table == 'accessories' && $rows[0]['item_type'] == 'pocket_square'):?>
                        <?php include './layouts/partials/silk-details.php'; ?>
                    <?php elseif(isset($table) && $table == 'accessories' && $rows[0]['item_type'] == 'phone_case'): ?>
                        <?php include './layouts/partials/phone-details.php'; ?>
                    <?php else: ?>
                        <?php include './layouts/partials/pvc-skirt-details.php'; ?>
                    <?php endif ?>

                    <!-- size guidance -->
                    <?php if($rows[0]['item_type'] != 'phone_case'):?><p data-toggle="collapse" data-target="#size" class="text-left info">SIZE & FIT</p><?php endif; ?>
                    <ul class="collapse text-left" id="size">
                    <?php if(($table == 'clothing') && $rows[0]['item_type'] == 'top'):?>
                        <?php include './layouts/partials/size-guidance-top.php'; ?>
                    <?php elseif($table == 'accessories' && $rows[0]['item_type'] == 'pocket_square'):?>
                        <?php include './layouts/partials/size-guidance-pocket-square.php'; ?>
                    <?php else: ?>
                        <?php include './layouts/partials/size-guidance-skirt.php'; ?>
                    <?php endif ?>
                    </ul>
                    <p data-toggle="collapse" data-target="#delivery" class="text-left info">DELIVERY & RETURNS</p>
                    <ul id="delivery" class="text-left collapse">
                        <li>free worldwide shipping on orders over £50.00</li>
                        <li>Your order will be dispatched within 1-14 days depending on your order</li>
                        <li>Returns and exchanges are accepted within 14 days - see our full policy <a href="delivery"><strong>here</strong></a>.</li>
                    </ul>
                    </div>
                </div>
                <input class="add-to-cart-btn" type="image" src="http://lntlondon.com/img/add-to-cart.jpg" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
            </form>
            <?php endif ?>
            <a href="<?= $table ?>">back to <?= $table ?></a>
        </div>
      </div>
    </div>


<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!-- Add your site or application content here -->


<div class="container-fluid">
    <footer class="row">
        <div class="col-md-12">
            <ul>
                <li><a href="index.html">. LNT . LONDON .</a></li>
                <li><a href="about">. ABOUT .</a></li>
                <li><a href="sitemap.xml">. SITEMAP .</a></li>
                <li><a href="contact">. CONTACT .</a></li>
                <li><a href="terms">. TERMS & CONDITIONS .</a></li>
                <li><a href="privacy">. PRIVACY .</a></li>
                <li class="social">
                    <a target="_blank" href="https://en-gb.facebook.com/lntlondon/"><i class="fa fa-facebook"></i></a>
                    <a target="_blank" href="https://twitter.com/LNTLondon"><i class="fa fa-twitter"></i></a>
                    <a target="_blank" href="https://www.instagram.com/lntlondon/?hl=en"><i class="fa fa-instagram"></i></a>
                </li>
            </ul>
        </div>
    </footer>
</div>
<div id="myModal" class="modal fade size-modal" role="dialog">
    <div class="modal-dialog">
        <?php if($_GET['table'] == 'prints'): ?>
        <img class="img-responsive" src="img/prints-sizing.jpg"/>
        <?php elseif ($_GET['table'] == 'clothing'): ?>
        <img class="img-responsive" src="img/garment-sizing.jpg"/>
        <?php endif; ?>
    </div>
</div>


<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.12.0.min.js"><\/script>')</script>
<script src="node_modules/angular/angular.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="build/js/main-3.min.js"></script>

</body>
</html>

