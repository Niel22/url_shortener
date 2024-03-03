<?php require "../config.php" ?>
<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $update = $conn->query("UPDATE urls SET clicks = clicks + 1 WHERE id = $id");

    $select = $conn->query("SELECT * FROM urls WHERE id = $id");
    $url = $select->fetch(PDO::FETCH_OBJ);

    header("location:".$url->url."");
}

?>