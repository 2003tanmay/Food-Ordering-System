<?php
session_start();

if(!isset($_SESSION['logged-in']) || $_SESSION['logged-in']!=true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favorite-food</title>
</head>
<body>
    <div class="Favorite-food">
        <div class="Menu">          
            
        </div>
    </div>
</body>
</html>