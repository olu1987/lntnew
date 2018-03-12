<?php include 'configs/connect.php'; ?>
<?php include './classes/ClothingConfig.php'; ?>
<?php include './classes/PrintConfig.php'; ?>
<?php include './classes/PhoneCaseConfig.php'; ?>
<?php include './classes/PocketSquareConfig.php'; ?>

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

function itemFactory($table, $item){
    if($table === 'clothing'){
        $config = new ClothingConfig();
    } elseif($table === 'prints'){
        $config = new PrintConfig();
    } elseif($item['item_type'] === 'phone_case'){
        $config = new PhoneCaseConfig();
    } elseif($item['item_type'] === 'pocket_square'){
        $config = new PocketSquareConfig();
    }
    return $config;
}

$config = itemFactory($table, $rows[0]);
?>