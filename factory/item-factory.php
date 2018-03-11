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