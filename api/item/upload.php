<?php
if(!empty($_FILES['image'])){
    $ext = pathinfo($_FILES['image']['name'],PATHINFO_EXTENSION);
    $image = $_FILES['image']['name'];
    move_uploaded_file($_FILES["image"]["tmp_name"], '../../img/'.$image);
    echo "Image uploaded successfully as ".$image;
}else{
    echo "Image Is Empty";
}
?>