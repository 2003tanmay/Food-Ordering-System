<?php
$showError = false;
$showAlert = false;
$showAlert1 = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'dbconnect.php';
    $text = $_POST["text"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];

    $existSql = "SELECT * FROM `users` WHERE `Mobile Number` = '$phone'";
    $result = mysqli_query($conn, $existSql);
    $numExistRow = mysqli_num_rows($result);
    if ($numExistRow > 0) {
        $showError = true;
    } elseif ($text == NULL || $phone == NULL || $password == NULL) {
        $showAlert1 = "Value can not be empty.";
    } else {
        $sql = "INSERT INTO `users` (`Name`, `Mobile Number`, `Password`) VALUES ('$text', '$phone', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up page</title>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body style="background-color: #023047;">
    <div class="alert">
        <?php
        if ($showAlert) {
            echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login.
        <a href="login.html">Login Yourself</a>
    </div> ';
        }
        if ($showError) {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Mobile No. already exists.
    </div> ';
        }
        if ($showAlert1) {
            echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> ' . $showAlert1 . '
        </div> ';
        }
        ?>
    </div>

    <div class="Login-page">
        <div class="layout">
            <div class="logo">
                <h1>FOODIE</h1>
            </div>
            <form action="signup.php" method="post">
                <input class="input name" type="text" name="text" placeholder="Name">
                <input class="input phone" type="tel" name="phone" placeholder="Phone No.">
                <input class="input pass" type="password" name="password" placeholder="Password">
                <div class="btn">
                    <button>Sign Up</button>
                </div>
            </form>

            <div class="sign-up">
                <a href="login.php">Already Have Account?</a>
            </div>
        </div>
    </div>
</body>

</html>