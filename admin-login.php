<?php
    $showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'dbconnect.php';
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    
    $sql = "SELECT * FROM `admin` WHERE `Mobile Number` = '$phone' AND `Password` = '$password'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_fetch_row($result);
    if (isset($check)) {
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['Mobile Number'] = $phone;
        header("location: admin-pannel.php");
        exit;
    }
    else{
        $showError = "Invalid Credentials";
    }
}
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-page</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body style="background-color: #023047;">
    <div class="alert">
<?php
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
    </div> ';
    }
    ?>
    </div>
    <div class="Login-page">
        <div class="layout">
            <div class="logo">
                <h1>FOODIE</h1>
            </div>
            <form action="admin-login.php" method="post">
                <input class="input phone" type="tel" name="phone" placeholder="Phone No.">
                <input class="input pass" type="password" name="password" placeholder="Password">
                <div class="btn">
                    <button>Login</button>
                </div>
            </form>            
        </div>
    </div>
</body>

</html>