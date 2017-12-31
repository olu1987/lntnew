<?php
class PrintSingle{


    // database connection and table name
    private $conn;

    // object properties
    public $id;
    public $item_name;
    public $item_description;
    public $character_name;
    public $item_image_url;
    public $button_id;
    public $item_price;
    public $sub_text;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){

        // select all query
        $query = "SELECT
                item_name, id, item_description, item_price, character_name, item_image_url, button_id, sub_text, item_type
            FROM
                " . htmlspecialchars($_GET["table"]) . " ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
}