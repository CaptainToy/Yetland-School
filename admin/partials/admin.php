<?php
require 'config/database.php';
session_start(); // Ensure session is started

if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id = $id"; // Corrected column name
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin</title>
</head>
<body>

    <!-- ===NAV BAR=== -->
    <nav>
        <div class="container nav-container">
            <a href="./Admin/index.php" class="logo">
                <h3>ADMi<span>N</span></h3>
            </a>
            <ul class="nav-link">
                <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Blog</a></li>
                <!-- <li><a href="./signUp.php">Sign in</a></li> -->
                <li>
                    <div class="nav-profile">
                        <div class="profile-img">
                            <?php if (isset($avatar['avatar']) && !empty($avatar['avatar'])): ?>
                                <img src="<?= ROOT_URL . 'img/' . $avatar['avatar'] ?>" alt="Avatar">
                            <?php endif; ?>
                        </div>
                        <ul>
                            <li><a href="./Admin/manageuser.php">Dashboard</a></li>
                            <li><a href="./home.php">Log Out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <button class="phone-button Open"><i class="fa fa-bars" aria-hidden="true"></i></button>
            <button class="phone-button close"><i class="fa fa-times" aria-hidden="true"></i></button>
        </div>
    </nav>
    <!-- =====End of nav===== -->

    <section>
        <div class="card-container">
            <div class="product-card">
                <div class="product-image">
                    <!-- Add your image here -->
                    <img src="" alt="Product Image" />
                </div>
                <div class="product-details">
                    <h2 class="product-title">Awesome</h2>
                    <h4 class="product-price">$10</h4>
                    <button class="add-to-cart-btn">Add to Cart</button>
                    <button class="view-btn">View</button>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="card-container">
            <div class="product-card">
                <div class="product-image">
                    <!-- Add your image here -->
                    <img src="" alt="Product Image" />
                </div>
                <div class="product-details">
                    <h2 class="product-title">Awesome</h2>
                    <h4 class="product-price">$10</h4>
                    <button class="add-to-cart-btn">Add to Cart</button>
                    <button class="view-btn">View</button>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="card-container">
            <div class="product-card">
                <div class="product-image">
                    <!-- Add your image here -->
                    <img src="" alt="Product Image" />
                </div>
                <div class="product-details">
                    <h2 class="product-title">Awesome</h2>
                    <h4 class="product-price">$10</h4>
                    <button class="add-to-cart-btn">Add to Cart</button>
                    <button class="view-btn">View</button>
                </div>
            </div>
        </div>
    </section>

    <!-- =====   ===== -->

    <script src="./js/index.js"></script>

    <style>
        body {
            display: flex;
            font-family: sans-serif;
        }

        .card-container {
            margin-top: 200px;
            text-align: center;
        }

        .product-card {
            background-color: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1px solid #ccc;
            padding: 10px;
            width: 300px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 60px;
        }

        .product-image {
            width: 100%;
            height: 200px;
            margin-bottom: 10px;
            text-align: center;
        }

        .product-image img {
            max-width: 100%;
            max-height: 100%;
        }

        .product-title {
            font-size: 24px;
            margin: 0;
            text-align: center;
        }

        .product-price {
            font-size: 20px;
            margin: 0;
            text-align: center;
        }

        .add-to-cart-btn,
        .view-btn {
            background-color: cornflowerblue;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin: 10px;
            cursor: pointer;
            border-radius: 3px;
            transition: all 0.25s ease;
        }

        .add-to-cart-btn:hover,
        .view-btn:hover {
            opacity: 0.8;
        }
    </style>
</body>
</html>
