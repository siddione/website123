<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products - o'clocks</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Add Font Awesome CDN for profile icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Cambria', serif;
        background-color: #f4f4f4;
    }

    /* Navbar with background image */
    .navbar {
        background-color: transparent;
        padding: 10px 20px;
    }

    .navbar .search-bar {
        width: 50%;
        padding: 8px;
        border-radius: 25px;
        border: 1px solid #fff;
        background-color: rgba(255, 255, 255, 0.7); /* Slightly transparent background */
    }

    .navbar .btn-profile {
        background-color: #fff;
        color: #000;
        border-radius: 25px;
        border: 1px solid #000;
        padding: 8px 20px;
    }

    .navbar .btn-profile:hover {
        background-color: #000;
        color: #fff;
    }

    /* Search Button Styling */
    .navbar .btn-search {
        background-color: #000;
        color: #fff;
        border-radius: 25px;
        border: 1px solid #000;
        padding: 8px 20px;
        margin-left: 10px;
    }

    .navbar .btn-search:hover {
        background-color: #fff;
        color: #000;
        border: 1px solid #000;
    }

    /* Navbar Logo and brand name */
    .navbar img {
        height: 90px; /* Increased logo size */
    }

    .navbar .brand-name {
        font-size: 2rem;
        font-weight: bold;
        color: #000; /* Changed font color to black */
        margin-left: 5px; /* Reduced margin to bring logo and text closer */
        letter-spacing: 2px;
        text-transform: lowercase;
    }

    .navbar .navbar-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
    }

    /* Profile Icon */
    .navbar .profile-icon {
        font-size: 30px; /* Increased icon size */
        color: #000;
        margin-left: 20px;
    }

    /* Dropdown Menu */
    .dropdown-menu {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .dropdown-item {
        color: #000;
        padding: 10px 20px;
        font-size: 1rem;
    }

    .dropdown-item:hover {
        background-color: #f1f1f1;
        color: #007bff;
    }

    .product-card {
        margin-bottom: 30px;
        border: 1px solid #ddd;
        border-radius: 12px;
        background-color: #fff;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        background-color: #f8f9fa; /* Light background behind product card */
    }

    .product-img {
        width: 100%;
        height: 250px;
        object-fit: cover; /* Ensures all images are the same size */
        background-color: #000; /* Background color for images */
    }

    .product-name {
        font-size: 1.2rem;
        font-weight: bold;
        margin: 10px;
        color: #333;
    }

    .product-price {
        font-size: 1rem;
        margin: 10px;
        color: #007bff;
    }

    .product-card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }

    .product-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        gap: 20px;
        padding: 20px;
    }

    .product-card .btn {
        width: 100%;
        background-color: #000;
        color: #fff;
        border: none;
        padding: 12px;
        font-weight: bold;
        font-size: 1rem;
        border-radius: 8px;
        margin-top: 10px;
    }

    .product-card .btn:hover {
        background-color: #fff;
        color: #000;
        border: 1px solid #000;
    }

    /* Background image for navbar */

    /* Styling for the banner (New Arrivals) */
    .banner {
        font-size: 2.5rem; /* Increase font size for better visibility */
        font-weight: bold; /* Makes the text thicker */
        text-align: center;
        color: #000;
        text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.3); /* Adds shadow to the text */
        margin-top: 50px;
        margin-bottom: 30px;
    }

    /* Adding itempagebg.jpg as background with shadow */
    .container {
        background-image: url('itempagebg.jpg');
        background-size: cover;
        background-position: center;
        box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.7); /* Shadow effect */
        padding: 20px;
    }
</style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-content">
            <a href="homepage.php">
                <img src="oclocks.png" alt="o'clocks Logo">
            </a>
            <span class="brand-name">o'clocks</span>
            <input class="search-bar form-control" type="text" placeholder="Search products...">
            <!-- Search Button -->
            <button class="btn-search">Search</button>

            <!-- Profile Dropdown -->
            <div class="dropdown">
                <a class="profile-icon dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user-circle"></i> <!-- Profile icon -->
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                    <li><a class="dropdown-item" href="#">My Orders</a></li>
                    <li><a class="dropdown-item" href="#">My Messages</a></li>
                    <li><a class="dropdown-item" href="#">Switch Accounts</a></li>
                    <li><a class="dropdown-item" href="#">Sign Out</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2 class="banner">o'clocks new arrivals!</h2>
        <div class="product-container">
            <!-- Product 1 -->
            <div class="product-card col-md-3 col-sm-6">
                <img src="prod1.jpg" class="product-img" onclick="location.href='product1.php';" href="product1" alt="Product 1">
                <div class="product-name">Santos de Cartier Medium Watch</div>
                <div class="product-price">$456,774.95</div>
                <a href="cart.php">
                <button class="btn" >Add to Cart</button>
                </a>
            </div>
            
            
            <!-- Product 2 -->
            <div class="product-card col-md-3 col-sm-6">
                <img src="prod2.jpg" class="product-img"onclick="location.href='product2.php';" alt="Product 2">
                <div class="product-name">Cartier Baignoire</div>
                <div class="product-price">$368,366</div>
                <button class="btn">Add to Cart</button>
            </div>

            <!-- Product 3 -->
            <div class="product-card col-md-3 col-sm-6">
                <img src="prod3.jpg" class="product-img" onclick="location.href='product3.php';" alt="Product 3">
                <div class="product-name">Cartier Drive de Cartier</div>
                <div class="product-price">$200,580</div>
                <button class="btn">Add to Cart</button>
            </div>

            <!-- Product 4 -->
            <div class="product-card col-md-3 col-sm-6">
                <img src="prods4.jpg" class="product-img" onclick="location.href='product4.php';" alt="Product 4">
                <div class="product-name">Cartier Silver Delux Vintage</div>
                <div class="product-price">$20,550</div>
                <button class="btn">Add to Cart</button>
            </div>

            <!-- Product 5 -->
            <div class="product-card col-md-3 col-sm-6">
                <img src="prod5.jpg" class="product-img" onclick="location.href='product5.php';" alt="Product 5">
                <div class="product-name">Casio Vintage</div>
                <div class="product-price">$1,080</div>
                <button class="btn">Add to Cart</button>
            </div>

            <!-- Product 6 -->
            <div class="product-card col-md-3 col-sm-6">
                <img src="prod6.jpg" class="product-img" onclick="location.href='product6.php';" alt="Product 6">
                <div class="product-name">Rolex Day-Date 40</div>
                <div class="product-price">$120,280</div>
                <button class="btn">Add to Cart</button>
            </div>

            <!-- Product 7 -->
            <div class="product-card col-md-3 col-sm-6">
                <img src="prod7.jpg" class="product-img" onclick="location.href='product7.php';" alt="Product 7">
                <div class="product-name">Rolex Milgauss </div>
                <div class="product-price">$130,280</div>
                <button class="btn">Add to Cart</button>
            </div>

            <!-- Product 8 -->
            <div class="product-card col-md-3 col-sm-6">
                <img src="prod8.jpg" class="product-img" onclick="location.href='product8.php';" alt="Product 8">
                <div class="product-name">Rolex Lady-Datejust </div>
                <div class="product-price">$220,350</div>
                <button class="btn">Add to Cart</button>
            </div>

            <!-- Product 9 -->
            <div class="product-card col-md-3 col-sm-6">
                <img src="prod9.jpg" class="product-img" onclick="location.href='product9.php';" alt="Product 9">
                <div class="product-name">Rolex Oyster Perpetual </div>
                <div class="product-price">$210,350</div>
                <button class="btn">Add to Cart</button>
            </div>

            <!-- Product 10 -->
            <div class="product-card col-md-3 col-sm-6">
                <img src="prods10.jpg" class="product-img" onclick="location.href='product10.php';" alt="Product 10">
                <div class="product-name">Cartier Ronde Louis Cartier</div>
                <div class="product-price">$175,290</div>
                <button class="btn">Add to Cart</button>
            </div>
        </div>
    </div> 

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>    