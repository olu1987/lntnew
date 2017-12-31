<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once '../objects/item.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// initialize object
$product = new PrintSingle($db);

// query products
$stmt = $product->read();
$num = $stmt->rowCount();

// check if more than 0 record found
if($num>0){

    // products array
    $products_arr=array();
    $products_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $product_item=array(
            "id" => $id,
            "item_name" => $item_name,
            "item_description" => html_entity_decode($item_description),
            "item_price" => $item_price,
            "character_name" => $character_name,
            "item_image_url" => $item_image_url,
            "button_id" => $button_id,
            "sub_text" => $sub_text,
            "item_type" => $item_type
        );

        array_push($products_arr["records"], $product_item);
    }

    echo json_encode($products_arr);
}

else{
    echo json_encode(
        array("message" => "No items found.")
    );
}
?>