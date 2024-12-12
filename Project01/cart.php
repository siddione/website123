cart.php
<?php 
session_start();

// Initialize the cart if it's not already initialized
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Define some sample products
$products = [
    1 => ['name' => 'Santos de Cartier Medium Watch - WSSA0061', 'price' => 456775, 'image' => 'prod1.jpg'],
    2 => ['name' => 'Santos de Cartier Leather Watch - Square Watch', 'price' => 430671, 'image' => 'prod2.jpg'],
    3 => ['name' => 'Santos de Cartier Rose Gold Watch  - Square Watch ', 'price' => 1396768, 'image' => 'prod3.jpg'],
    4 => ['name' => 'Rolex Day-Date 40', 'price' => 3201898, 'image' => 'prods4.jpg'],
    5 => ['name' => 'CASIO Quartz Womens Analog Brown Watch LTP-V007L-9B', 'price' => 1700, 'image' => 'prod5.jpg'],
    6 => ['name' => 'Rolex Lady-Datejust watch: 18 kt Everose gold - m279135rbr-0001', 'price' => 753568, 'image' => 'prod9.jpg']
];

// Handle adding product to the cart
if (isset($_GET['add_to_cart'])) {
    $productId = $_GET['add_to_cart'];
    if (isset($products[$productId])) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId]['quantity']++;
        } else {
            $_SESSION['cart'][$productId] = [
                'name' => $products[$productId]['name'],
                'price' => $products[$productId]['price'],
                'quantity' => 1
            ];
        }
    }
}

// Handle quantity updates (increase and decrease)
if (isset($_GET['increase_quantity'])) {
    $productId = $_GET['increase_quantity'];
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId]['quantity']++;
    }
}

if (isset($_GET['decrease_quantity'])) {
    $productId = $_GET['decrease_quantity'];
    if (isset($_SESSION['cart'][$productId])) {
        if ($_SESSION['cart'][$productId]['quantity'] > 1) {
            $_SESSION['cart'][$productId]['quantity']--;
        } else {
            unset($_SESSION['cart'][$productId]);
        }
    }
}

// Get search query
$searchQuery = isset($_GET['search_query']) ? $_GET['search_query'] : '';

// Filter products based on the search query
if ($searchQuery) {
    $filteredProducts = array_filter($products, function($product) use ($searchQuery) {
        return stripos($product['name'], $searchQuery) !== false; // Case-insensitive search
    });
} else {
    $filteredProducts = $products; // No search, display all products
}

// Get cart content
$cart = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My O'Clocks' Cart</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Set a nice background */
        body {
            font-family: Cambria, serif;
            background: url('cartt.jpg') no-repeat center center fixed;
            background-size: cover;
            color: white;
        }

        .header {
            background: linear-gradient(to right, #f0f0f0, gray); /* Gradient from light gray to white */
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 75px;
        }

        /* Logo and search bar section */
        .logo-and-search {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-grow: 1;
        }

        .search-bar {
            width: 350px;
            padding-left: 10px;
            background-color: white;
            color: black;
            border-radius: 300px;
        }

        .account-link {
            color: black;
            text-decoration: none;
            margin-left: auto; /* This will push it to the right */
        }

        /* Adjust the logo size */
        .logo-and-search img {
            height: 80px;
            width: auto;
        }

        .container {
            margin-top: 30px;
        }

        /* Custom styles for cart and product cards */
        .card {
            background-color: #f4f1e1;
            border: none;
            color: black;
            border-radius: 10px;
        }

        .table {
            background-color: transparent;
            color: black;
            border: none;
        }

        .btn-primary {
            background-color: black;
            border-color: black;
            color: white;
        }

        .btn-primary:hover {
            background-color: #333;
            border-color: #333;
            color: white;
        }

        .total-price {
            color: black;
            font-weight: bold;
        }

        /* "You May Also Like" section */
        .you-may-like {
            text-align: center;
            font-size: 28px;
            color: black;
            font-weight: bold;
            margin-top: 30px;
        }

        .recommended-products {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 20px;
        }

        /* Adjust the images in "You May Also Like" */
        .recommended-products .card {
            background-color: #f4f1e1;
            border: none;
            color: black;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .recommended-products .card-img-top {
            width: 100%;
            height: auto;
            object-fit: contain;
            object-position: center;
        }

        .recommended-products .card-body {
            padding: 10px;
        }

        /* Make "My O'Cart" heading black */
        .cart-heading {
            color: black;
            font-size: 2em;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <div class="header">
        <!-- Logo and Search Bar beside each other on the left side -->
        <div class="logo-and-search">
            <a href="index.php"><img src="oclocks.png" alt="O'Clocks Logo"></a>
            <form method="GET" action="">
                <input type="text" name="search_query" class="form-control search-bar" placeholder="Search for products..." value="<?= htmlspecialchars($searchQuery); ?>">
            </form>
        </div>

        <!-- "My Account" link on the right side -->
        <a href="myaccount.php" class="account-link">My Account</a>
    </div>

    <div class="container">
        <h2 class="cart-heading">Clock's Running – Your Cart is Ready!</h2>

        <!-- Shopping Cart Table -->
        <?php if (!empty($cart)): ?>
            <form action="checkout.php">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cart as $productId => $product): ?>
                            <tr>
                                <td><?= htmlspecialchars($product['name']); ?></td>
                                <td><?= number_format($product['price'], 2); ?> PHP</td>
                                <td>
                                    <a href="?decrease_quantity=<?= $productId; ?>" class="btn btn-outline-secondary">-</a>
                                    <?= $product['quantity']; ?>
                                    <a href="?increase_quantity=<?= $productId; ?>" class="btn btn-outline-secondary">+</a>
                                </td>
                                <td><?= number_format($product['price'] * $product['quantity'], 2); ?> PHP</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Checkout Button -->
                <div class="d-flex justify-content-between">
                    <div class="total-price">
                        Total Price: <?= number_format(array_sum(array_map(function ($product) {
                            return $product['price'] * $product['quantity'];
                        }, $cart)), 2); ?> PHP
                    </div>
                    <button type="submit" class="btn btn-primary">Proceed to Checkout</button>
                </div>
            </form>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>

        <!-- "You May Also Like" Section -->
        <div class="you-may-like">Clocking in New Finds</div>
        <div class="recommended-products">
            <?php foreach ($filteredProducts as $productId => $product): ?>
                <div class="card">
                    <img src="<?= $product['image']; ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']); ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($product['name']); ?></h5>
                        <p class="card-text"><?= number_format($product['price']); ?> PHP</p>
                        <a href="?add_to_cart=<?= $productId; ?>" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>