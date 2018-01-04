<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// get database connection
include_once '../config/database.php';

// instantiate product object
include_once '../objects/item.php';

$database = new Database();
$db = $database->getConnection();

$product = new Item($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

// set product property values
$product->item_name = $data->item_name;
$product->item_price = $data->item_price;
$product->item_description = $data->item_description;
$product->character_name = $data->character_name;
$product->button_id = $data->button_id;
$product->item_image_url = $data->button_id;
$product->item_image_url_2 = $data->button_id;
$product->sub_text = $data->button_id;

// create the product
if($product->create()){
    echo '{';
    echo '"message": "Product was created."';
    echo '}';
}

// if unable to create the product, tell the user
else{
    echo '{';
    echo '"message": "Unable to create product."';
    echo '}';
}
?>