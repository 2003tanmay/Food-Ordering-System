<?php
    require 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en-us">

<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Ordering System</title>
</head>

<body>
    <div class="Home-page" id="home">
        <div class="Navbar-layout">
            <div class="Navbar">
                <div class="Nav-left">
                    <h6>FOODIE</h6>
                </div>
                <div class="Nav-right">
                    <div class="nav-menu">
                        <ul class="nav-name">
                            <li><a href="#home">Home</a></li>
                            <li><a href="#menu">Menu</a></li>
                            <li><a href="favorite_food.php">Favorite Food</a></li>
                            <li><a href="#cart">Cart</a></li>
                            <li><a href="login.php">Login</a></li>
                            <li><a href="signup.php">Sign Up</a></li>
                        </ul>
                        <ul class="nav-icon">
                            <li><a href="#home"><img src="icon/home.svg" alt="Home"
                                        style="width: 17px;height: 17px;"></a></li>
                            <li><a href="#menu"><img src="icon/restaurant-menu.svg" alt="Menu"
                                        style="width: 17px;height: 17px;"></a></li>
                            <li><a href="favorite_food.php"><img src="icon/favorite.svg" alt="Favorite Food"
                                        style="width: 17px;height: 17px;"></a></li>
                            <li><a href="#cart"><img src="icon/cart.svg" alt="Cart"
                                        style="width: 17px;height: 17px;"></a></li>
                            <li><a href="login.php"><img src="icon/login.svg" alt="Login"
                                        style="width: 17px;height: 17px;"></a></li>
                            <li><a href="signup.php"><img src="icon/sign-up.svg" alt="Sign Up"
                                        style="width: 17px;height: 17px;"></a></li>
                        </ul>
                        <div class="hamburger-icon">
                            <a href="javascript:void(0)" class="hamburger" onclick="openNav()">
                                <img src="icon/hamburger.svg" alt="hamburger" style="width: 30px;height: 20px;">
                            </a>
                            <a href="javascript:void(0)" class="cross" onclick="closeNav()">
                                <img src="icon/cross.svg" alt="cross" style="width: 20px;height: 20px;">
                            </a>

                            <div class="dropdown-content" id="drop">
                                <div class="dropdown">
                                    <a href="#home">Home</a>
                                    <a href="#menu">Menu</a>
                                    <a href="favorite_food.php">Favorite Food</a>
                                    <a href="#cart">Cart</a>
                                    <a href="login.php">Login</a>
                                    <a href="signup.php">Sign Up</a>
                                </div>     
                            </div>
                            <script>
                                function openNav() {
                                    document.getElementById("drop").style.height = "247px";
                                    document.getElementsByClassName("cross")[0].style.display = "block";
                                    document.getElementsByClassName("hamburger")[0].style.display = "none";
                                }
                                
                                function closeNav() {
                                    document.getElementById("drop").style.height = "0%";
                                    document.getElementsByClassName("hamburger")[0].style.display = "block";
                                    document.getElementsByClassName("cross")[0].style.display = "none";
                                }
                                </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="Background">

            <div class="background-left">
                <div>
                    <h1 class="font">Order<br>Best Food Of</h1>
                    <h1 class="indore">INDORE</h1>
                </div>
            </div>

            <div class="background-right">
            </div>
        </div>
        
    </div>
    <div class="Menu-page" id="menu">
        <div class="Menu">
            <?php
                $sql = "SELECT * FROM `menu` LIMIT 6";
                $result = mysqli_query($conn,$sql);                
                while ($data = mysqli_fetch_array($result)){
            ?>         
            <div class="card">
                <div class="card-link">
                    <div class="card-image" style="background-image: url(<?php echo $data['Image'];?>);"></div>
                    <div class="container">
                        <div class="container-boundry">
                            <div class="dish-name"><?php echo $data['Name'];?></div>
                            <div class="details"><?php echo $data['Details'];?></div>
                            <div class="more-detail">
                                <button class="add-to-favorite-food"></button>
                                <div class="prize">₹<?php echo $data['Price'];?></div>
                            </div>
                        </div>     
                    </div>
                    <div class="add-to-cart">
                        <button>Add to Cart</button>
                    </div>
                </div>
            </div>
            <?php
                }
            ?>
        </div>
        <a class="more-menu" href="menu.php">Explore more</a>
    </div>
    <div class="About-us">
        <h1 style="color: white;">ABOUT US</h1>
        <a href="admin-login.php" style="color: white;">Admin Pannel</a>
    </div>
</body>

</html>