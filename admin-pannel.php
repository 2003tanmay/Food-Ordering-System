 <?php
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header("location: admin-login.php");
        exit;
    }

    $showAlert = false;
    $showAlert1 = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        require 'dbconnect.php';
        $name = $_POST["pName"];
        $detail = $_POST["pDetails"];
        $price = $_POST["pPrice"];
        $image = $_FILES["pImage"];

        $filename = $image['name'];
        $fileerror = $image['error'];
        $filetmp = $image['tmp_name'];

        $fileext = explode('.', $filename);
        $filecheck = strtolower(end($fileext));
        $fileextstored = array('png', 'jpg', 'jpeg');
        if ($name == NULL || $detail == NULL || $price == NULL || $image == NULL) {
            $showAlert1 = "Value can not be empty.";
        } elseif (in_array($filecheck, $fileextstored)) {
            $destinationfile = 'menu_image/' . $filename;
            move_uploaded_file($filetmp, $destinationfile);
            $sql = "INSERT INTO `menu` (`Name`, `Details`, `Price`, `Image`) VALUES ('$name', '$detail', '$price', '$destinationfile')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        } else {
            $showAlert1 = "File format should be png, jpg or jpeg.";
        }
    }
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="index.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 </head>

 <body>
     <?php
        if ($showAlert) {
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Dish stored in database succesfully.
        </div> ';
        }
        if ($showAlert1) {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $showAlert1 . '
        </div> ';
        }
     ?>
     <div>
         <form action="admin-pannel.php" method="post" enctype="multipart/form-data">
             <input class="input phone" type="text" name="pName" placeholder="Dish name">
             <input class="input pass" type="text" name="pDetails" placeholder="Dish details">
             <input class="input phone" type="number" name="pPrice" placeholder="Dish price">
             <input class="input pass" type="file" name="pImage">
             <div class="btn">
                 <button>Add Dish</button>
             </div>
         </form>
     </div>
 </body>

 </html>