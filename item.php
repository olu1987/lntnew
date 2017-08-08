<?php include 'header.php'; ?>
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

?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img class="img-responsive" src="<?= $rows[0]['item_image_url']; ?>"/>
        </div>
        <div class="col-md-6">
            <h1><?= $rows[0]['item_name']; ?></h1>
            <p><?= $rows[0]['item_description']; ?></p>
            <p>£<?= $rows[0]['item_price']; ?></p>
        </div>
      </div>
    </div>


<?php include 'footer.php'; ?>
