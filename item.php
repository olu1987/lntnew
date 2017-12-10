<?php include 'configs/connect.php'; ?>
<?php

$table = $_GET['table'];

// A select query. $result will be a `mysqli_result` object if successful
$result = db_query("SELECT * FROM ".$table." WHERE id = ".$_GET['id']);

if($result === false) {
    // Handle failure - log the error, notify administrator, etc.
} else {
    // Fetch all the rows in an array
    $rows = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
}





?>
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
    <link rel="stylesheet" href="build/css/main-v1.3.css">
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body class="item">
<?php include_once("analytics.php") ?>
<div id="loader" class="loader-container active">
    <img class="icon-key" src="img/icon-key-small.jpg"/>
    <div class="sp sp-circle"></div>
</div>
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <?php if($_GET['table']== 'clothing'):?>
                <img id="big-picture" class="img-responsive item-image" src="<?= $rows[0]['item_image_url']; ?>"/>
                <div class="row thumbnails-row">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <img class="thumbnails img-responsive item-image active" src="<?= $rows[0]['item_image_url']; ?>"/>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <img class="thumbnails img-responsive item-image" src="<?= $rows[0]['item_image_url_2']; ?>"/>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <img class="thumbnails img-responsive item-image" src="<?= $rows[0]['item_image_url_3']; ?>"/>
                    </div>
                </div>
            <?php else: ?>
                <img class="img-responsive item-image" src="<?= $rows[0]['item_image_url']; ?>"/>
            <?php endif; ?>
        </div>
        <div class="col-md-6 text-center item-details">
            <h1><strong><span class="left-dot">.</span><?= $rows[0]['item_name']; ?><span class="right-dot">.</span></strong></h1>
            <h1><small><?= $rows[0]['sub_text']; ?></small></h1>
            <hr class="line-through">
            <p class="price">£<?= $rows[0]['item_price']; ?></p>
            <p class="text-left description"><?= $rows[0]['item_description']; ?></p>
            <hr>
            <?php if($_GET['table'] == 'prints'): ?>
                <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                    <input type="hidden" name="cmd" value="_s-xclick">
                    <input type="hidden" name="hosted_button_id" value="<?= $rows[0]['button_id']; ?>">
                        <table class="sizes-select">
                            <tr><td class="text-left"><input type="hidden" name="on0" value="Sizes">Sizes</td></tr><tr><td><select name="os0">
                                        <option value="Small">Small £50.00 GBP</option>
                                        <option value="Medium">Medium £70.00 GBP</option>
                                        <option value="Large">Large £130.00 GBP</option>
                                    </select>
                                </td>
                                <td class="size-link-wrap">
                                    <a class="size-link" data-toggle="modal" data-target="#myModal">SIZE GUIDE</a>
                                </td>
                            </tr>
                        </table>
                <p data-toggle="collapse" data-target="#details" class="info text-left">DETAILS</p>
                    <ul class="collapse text-left" id="details">
                        <li>limited edition of 50</li>
                        <li>unframed</li>
                        <li>printed in London England</li>
                    </ul>
                    <p data-toggle="collapse" data-target="#delivery" class="text-left info">DELIVERY & RETURNS</p>
                    <ul id="delivery" class="text-left collapse">
                        <li>Free worldwide delivery</li>
                        <li>Your order will be dispatched within 1-14 days depending on your order</li>
                        <li>Returns and exchanges are accepted within 14 days - see our full policy <a href="delivery"><strong>here</strong></a>.</li>
                    </ul>
                    <input type="hidden" name="currency_code" value="GBP">
                    <input type="image" src="http://lntlondon.com/img/add-to-cart.jpg" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
                    <img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
                </form>

            <?php else: ?>
            <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input type="hidden" name="cmd" value="_s-xclick">
                <input type="hidden" name="hosted_button_id" value="<?= $rows[0]['button_id']; ?>">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <?php if($_GET['table'] != 'accessories'): ?>
                        <table class="sizes-select">
                            <tr><td class="text-left" colspan="2"><input  type="hidden" name="on0" value="Sizes">Sizes</td></tr><tr><td>
                                    <select name="os0">
                                        <option value="Small">Small </option>
                                        <option value="Medium">Medium </option>
                                        <option value="Large">Large </option>
                                    </select> </td>
                        <?php elseif($_GET['table'] == 'accessories' && $rows[0]['item_type'] == 'phone_case'): ?>
                        <table class="sizes-select">
                            <tr><td class="text-left" colspan="2"><input  type="hidden" name="on0" value="Phone">Phones</td></tr><tr><td>
                                    <select name="os0">
                                        <option value="iPhone X">iPhone X </option>
                                        <option value="iPhone 8 Plus">iPhone 8 Plus </option>
                                        <option value="iPhone 8">iPhone 8 </option>
                                        <option value="iPhone 7 Plus">iPhone 7 Plus </option>
                                        <option value="iPhone 7">iPhone 7 </option>
                                        <option value="iPhone 6">iPhone 6 </option>
                                        <option value="iPhone 5">iPhone 5 </option>
                                        <option value="Samsung 8 Plus">Samsung 8 Plus </option>
                                        <option value="Samsung 8">Samsung 8 </option>
                                        <option value="Samsung 7 Edge">Samsung 7 Edge </option>
                                        <option value="Samsung 7">Samsung 7</option>
                                        <option value="Samsung 6 Edge">Samsung 6 Edge </option>
                                        <option value="Samsung 6">Samsung 6</option>
                                    </select>
                                </td><tr><td class="text-left" colspan="2"><input  type="hidden" name="on1" value="Material">Case Material Type</td></tr><tr><td>
                                    <select name="os1">
                                        <option value="Hard">Hard </option>
                                        <option value="Silicone">Silicone </option>
                                    </select> </td>
                          <?php if($_GET['table'] != 'accessories'): ?>
                                <td class="size-link-wrap">
                                    <a class="size-link" data-toggle="modal" data-target="#myModal">SIZE GUIDE</a>
                                </td>
                          <?php endif; ?>
                            </tr>
                        </table>
                        <?php endif; ?>
                        <?php if(isset($table) && $table == 'clothing' || isset($table) && $table == 'accessories'|| isset($table) && $table == 'prints' ):?>
                            <p data-toggle="collapse" data-target="#details" class="info text-left <?php if($table == 'accessories'):?>accessories-details <?php endif; ?>">DETAILS</p>
                            <?php if($table == 'clothing' && $rows[0]['clothing_type'] == 'top'):?>
                                <ul class="collapse text-left" id="details">
                                    <li>100% silk</li>
                                    <li>made in England</li>
                                    <li>dry clean only</li>
                                </ul>
                            <?php elseif(isset($table) && $table == 'accessories' && $rows[0]['item_type'] == 'pocket_square'): ?>
                                <ul class="collapse text-left" id="details">
                                    <li>100% silk</li>
                                    <li>made in England</li>
                                    <li>dry clean only</li>
                                </ul>
                                <?php elseif(isset($table) && $table == 'accessories' && $rows[0]['item_type'] == 'phone_case'): ?>
                                <ul class="collapse text-left" id="details">
                                    <li>Selected phones only (see drop down)</li>
                                    <li>Silicone or hard</li>
                                </ul>
                            <?php else: ?>
                                <ul class="collapse text-left" id="details">
                                    <li> 70% polyvinyl chloride, 20% polyurethane and 10% cotton</li>
                                    <li>made in England</li>
                                    <li>hand wash only</li>
                                </ul>
                            <?php endif ?>
                        <?php if($rows[0]['item_type'] != 'phone_case'):?><p data-toggle="collapse" data-target="#size" class="text-left info">SIZE & FIT</p><?php endif; ?>
                            <?php if(($table == 'clothing') && $rows[0]['clothing_type'] == 'top'):?>
                                <ul class="collapse text-left" id="size">
                                    <li> Loose fit</li>
                                    <li>Model is UK size 8. height
                                        174cm/5’7” and wears a
                                        size small</li>
                                </ul>
                                <?php elseif($table == 'accessories' && $rows[0]['item_type'] == 'pocket_square'):?>
                                <ul class="collapse text-left" id="size">
                                    <li>33cm x 33cm</li>
                                </ul>

                            <?php else: ?>
                                <ul class="collapse text-left" id="size">
                                    <li>Model is UK size 8. height
                                        174cm/5’7” and wears a
                                        size small
                                    </li>
                                </ul>
                            <?php endif ?>
                        <?php endif ?>
                        <p data-toggle="collapse" data-target="#delivery" class="text-left info">DELIVERY & RETURNS</p>
                        <ul id="delivery" class="text-left collapse">
                            <li>Free worldwide delivery</li>
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
</div>

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
<script src="build/js/main-1.min.js"></script>

</body>
</html>

