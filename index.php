<?php require "config.php"; ?>
<?php
$select = $conn->query("SELECT * FROM urls");
$rows = $select->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST['submit'])){
    if(empty($_POST['url'])){
        echo "Input field cannot be empty";
    }else{
        $url = $_POST['url'];

        $insert = $conn->prepare("INSERT INTO urls (url) VALUES (:url)");
        $insert->execute([
            ":url" => $url
        ]);

        header("location: http://localhost/short_urls/");
    }
}

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            body {overflow: hidden;}
            
            .margin {
                margin-top: 200px
            }
        </style>
    </head>
    <body>
       
        <div class="conatiner">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <form method="post" action="" class="card p-2 margin">
                        <div class="input-group">
                        <input type="text" name="url" class="form-control" placeholder="your url">
                        <div class="input-group-append">
                            <button type="submit" name="submit" class="btn btn-success">Shorten</button>
                        </div>
                        </div>
                    </form>
                </div>
           </div>
        </div>

        <div class="conatiner">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <table class="table mt-4">
                        <thead>
                            <tr>
                            <th scope="col">Long Urls</th>
                            <th scope="col">Short Urls</th>
                            <th scope="col">Click</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($rows as $row) : ?>
                            <tr>
                            <td><?= $row->url;?></td>
                            <td><a href="http://localhost/short_urls/u?id=<?= $row->id;?>" target="_blank">http://localhost/short_urls/u?id=<?= $row->id;?></a></td>
                            <td><?= $row->clicks;?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                 </div>
             </div>
        </div>
    
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>
        <!-- Core theme JS-->
    </body>
</html>


   