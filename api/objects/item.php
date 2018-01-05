<?php
class Item{


    // database connection and table name
    private $conn;

    // object properties
    public $id;
    public $item_name;
    public $item_description;
    public $character_name;
    public $item_image_url;
    public $item_image_url_2;
    public $item_image_url_3;
    public $button_id;
    public $item_price;
    public $sub_text;
    public $item_type;

    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
        $this->table = htmlspecialchars($_GET["table"]);
    }

    // read products
    function read(){

        // select all query
        $query = "SELECT
                item_name, id, item_description, item_price, character_name, item_image_url, button_id, sub_text, item_type
            FROM
                " . $this->table . " ORDER BY id DESC; ";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    // create product
    function create(){

        // query to insert record
        $query = "INSERT INTO
                " . $this->table . "
            SET
                item_name=:item_name, item_price=:item_price, item_description=:item_description,item_image_url=:item_image_url, character_name=:character_name, 
                item_type=:item_type,item_image_url_2=:item_image_url_2,item_image_url_3=:item_image_url_3,sub_text = :sub_text, button_id=:button_id";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->item_name=htmlspecialchars(strip_tags($this->item_name));
        $this->item_price=htmlspecialchars(strip_tags($this->item_price));
        $this->item_description=htmlspecialchars(strip_tags($this->item_description));
        $this->character_name=htmlspecialchars(strip_tags($this->character_name));
        $this->button_id=htmlspecialchars(strip_tags($this->button_id));
        $this->item_image_url=htmlspecialchars(strip_tags($this->item_image_url));
        $this->item_image_url_2=htmlspecialchars(strip_tags($this->item_image_url_2));
        $this->item_image_url_3=htmlspecialchars(strip_tags($this->item_image_url_3));
        $this->sub_text=htmlspecialchars(strip_tags($this->sub_text));
        $this->item_type=htmlspecialchars(strip_tags($this->item_type));

        // bind values
        $stmt->bindParam(":item_name", $this->item_name);
        $stmt->bindParam(":item_price", $this->item_price);
        $stmt->bindParam(":item_description", $this->item_description);
        $stmt->bindParam(":character_name", $this->character_name);
        $stmt->bindParam(":button_id", $this->button_id);
        $stmt->bindParam(":item_image_url", $this->item_image_url);
        $stmt->bindParam(":item_image_url_2", $this->item_image_url_2);
        $stmt->bindParam(":item_image_url_3", $this->item_image_url_3);
        $stmt->bindParam(":sub_text", $this->sub_text);
        $stmt->bindParam(":item_type", $this->item_type);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
    // delete the product
    function delete(){

        // delete query
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }

    function update(){

        // query to insert record
        $query = "UPDATE
                " . $this->table . "
            SET
                item_name=:item_name, item_price=:item_price, item_description=:item_description,item_image_url=:item_image_url, character_name=:character_name, 
                item_type=:item_type,item_image_url_2=:item_image_url_2,item_image_url_3=:item_image_url_3,sub_text = :sub_text, button_id=:button_id
        WHERE id = :id"
        ;

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->item_name=htmlspecialchars(strip_tags($this->item_name));
        $this->item_price=htmlspecialchars(strip_tags($this->item_price));
        $this->item_description=htmlspecialchars(strip_tags($this->item_description));
        $this->character_name=htmlspecialchars(strip_tags($this->character_name));
        $this->button_id=htmlspecialchars(strip_tags($this->button_id));
        $this->item_image_url=htmlspecialchars(strip_tags($this->item_image_url));
        $this->item_image_url_2=htmlspecialchars(strip_tags($this->item_image_url_2));
        $this->item_image_url_3=htmlspecialchars(strip_tags($this->item_image_url_3));
        $this->sub_text=htmlspecialchars(strip_tags($this->sub_text));
        $this->item_type=htmlspecialchars(strip_tags($this->item_type));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind values
        $stmt->bindParam(":item_name", $this->item_name);
        $stmt->bindParam(":item_price", $this->item_price);
        $stmt->bindParam(":item_description", $this->item_description);
        $stmt->bindParam(":character_name", $this->character_name);
        $stmt->bindParam(":button_id", $this->button_id);
        $stmt->bindParam(":item_image_url", $this->item_image_url);
        $stmt->bindParam(":item_image_url_2", $this->item_image_url_2);
        $stmt->bindParam(":item_image_url_3", $this->item_image_url_3);
        $stmt->bindParam(":sub_text", $this->sub_text);
        $stmt->bindParam(":item_type", $this->item_type);
        $stmt->bindParam(":id", $this->id);

        // execute query
        if($stmt->execute()){
            return true;
        }

        return false;

    }
}