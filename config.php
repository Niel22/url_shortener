<?php
// if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {
    
//     header("location:../index.html");
//     die;
// }

try{

    define("HOST", "localhost");
    define("DBNAME", "short_urls");
    define("USERNAME", "root");
    define("PASSWORD", "");
    
    $conn = new PDO("mysql:host=".HOST.";dbname=".DBNAME.";", USERNAME, PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected Successfully";
}catch(PDOException $e){
    echo "error" . $e->getMessage();
}

?>