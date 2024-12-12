<?php
session_start();

// Ensure the cart is not empty before proceeding
if (empty($_SESSION['cart'])) {
    echo "<p>Your cart is empty. Please add some items to the cart.</p>";
    exit;
}

// Handle the checkout form submission (no database)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user input from the form
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];  // New phone field

    // The payment method is automatically set to 'Cash on Delivery'
    $payment_method = 'Cash on Delivery';  // Fixed payment method

    // Calculate the total price from the cart
    $total_price = array_sum(array_map(function ($product) {
        return $product['price'] * $product['quantity'];
    }, $_SESSION['cart']));

    // Save order details into session
    $_SESSION['order_details'] = [
        'name' => $name,
        'address' => $address,
        'email' => $email,
        'phone' => $phone,
        'payment_method' => $payment_method,
        'total_price' => $total_price
    ];

    // Redirect to the order confirmation page
    header("Location: order.php");
    exit;
}

// Get the cart details
$cart = $_SESSION['cart'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - O'Clocks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styles for the checkout page */
        body {
            background-image: url('check.png'); /* Set the background image */
            background-size: cover; /* Ensure the image covers the entire page */
            background-position: center; /* Center the background image */
            background-repeat: no-repeat; /* Prevent the image from repeating */
            font-family: 'Cambria', serif; /* Set font to Cambria */
        }
        .checkout-form {
            background-color: white;
            padding: 20px;
            margin-top: 15px;  /* Reduced margin-top to move sections up */
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .cart-table th, .cart-table td {
            padding: 10px;
            text-align: center;
        }
        .cart-table th {
            background-color: #f8f9fa;
        }
        .btn-primary {
            background-color: #000;
            border-color: #000;
        }
        .btn-primary:hover {
            background-color: #333;
            border-color: #333;
        }
        .btn-small {
            padding: 8px 16px;  /* Adjust padding for smaller size */
            font-size: 14px;     /* Adjust font size */
        }
        /* Logo styling */
        .logo {
            width: 150px; /* Set logo width */
            height: auto; /* Maintain aspect ratio */
            margin-top: 20px;
        }
        /* Styling for the header */
        .header-container {
            display: flex;
            flex-direction: column; /* Stack logo and clock text vertically */
            align-items: center; /* Center content horizontally */
            justify-content: center; /* Center content vertically */
        }
        .checkout-header {
            font-size: 2rem;
            margin-top: 20px; /* Add some space between the logo and the clock text */
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Header with Logo and Clock In Your Order below it -->
    <div class="header-container">
        <div>
           <a href="homepage.php">
            <img src="oclocks.png" alt="O'Clocks Logo" class="logo">
            </a>
        </div>
        <div class="checkout-header">
            <h2>Clock In Your Order</h2>
        </div>
    </div>

    <!-- Cart Overview -->
    <div class="checkout-form">
        <h4>Your Cart</h4>
        <table class="table table-bordered cart-table">
            <thead>
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
                        <td><?= $product['quantity']; ?></td>
                        <td><?= number_format($product['price'] * $product['quantity'], 2); ?> PHP</td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" class="text-right"><strong>Total Price:</strong></td>
                    <td><strong><?= number_format(array_sum(array_map(function ($product) {
                        return $product['price'] * $product['quantity'];
                    }, $cart)), 2); ?> PHP</strong></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- User Information Form -->
    <div class="checkout-form">
        <h4>Billing Information</h4>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Shipping Address</label>
                <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <!-- New Phone Number Field -->
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>

            <!-- Payment Method (Cash on Delivery is fixed) -->
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <input type="text" class="form-control" id="payment_method" name="payment_method" value="Cash on Delivery" readonly>
            </div>

            <button type="submit" class="btn btn-primary btn-small btn-block">Place Order</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
