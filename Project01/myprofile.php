
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <style>
        /* General Styles */
        body {
            font-family: Cambria, serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Navigation Bar */
        .navbar {
            background-color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 5px; /* Increased padding to ensure space */
            border-bottom: 1px solid #ddd;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            flex-wrap: nowrap; /* Ensures items stay on one line */
        }

        /* Logo */
        .navbar img {
            width: 120px;
            height: auto;
            border: none;
            outline: none;
        }

        /* Links in Navbar */
        .navbar div {
            display: flex;
            align-items: center;
        }

        .navbar a {
            text-decoration: none;
            color: black;
            font-size: 16px;
            padding: 5px 15px; /* Increased padding for better visibility */
            margin-left: 20px;
            white-space: nowrap; /* Prevent text from wrapping */
        }

        /* Specific styles for About Us button */
        .about-us-button {
            border: 2px solid black;
            border-radius: 4px;
            position: relative;
            right: 50px;
            transition: background-color 0.3s, color 0.3s;
        }

        /* Hover effects for About Us button */
        .about-us-button:hover {
            background-color: black;
            color: white;
        }

        /* Adjust the content and sidebar layout to prevent overflow */
        .container {
            display: flex;
            margin-top: 70px; /* Ensure content is pushed below the fixed navbar */
            height: calc(100vh - 70px);
        }

        /* Sidebar */
        .sidebar {
            width: 25%;
            background-color: white;
            padding: 20px;
            border-right: 1px solid #ddd;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 15px;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: black;
            font-size: 16px;
            display: block;
            padding: 8px;
            border-radius: 4px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: #333;
            color: white;
        }

        /* Content */
        .content {
            width: 75%;
            padding: 40px 20px;
        }

        .content h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            max-width: 600px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-group input[readonly] {
            background-color: #f0f0f0;
        }

        .btn-save {
            background-color: black;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-save:hover {
            background-color: #555;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <div class="navbar">
        <a href="homepage.php">
            <img src="oclocks.png" alt="O'Clocks Logo">
        </a>
        <div>
            <a href="aboutus.php" class="about-us-button">About Us</a>
        </div>
    </div>

    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <ul>
                <li><a href="myprofile.php">Profile</a></li>
                <li><a href="mypurchase.php">My Purchases</a></li>
                <li><a href="#">Change Password</a></li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="content">
            <h1>My Profile</h1>
            <form>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" value="<?= htmlspecialchars($user_data['user_name'] ?? ''); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" value="<?= htmlspecialchars($user_data['first_name'] ?? ''); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" value="<?= htmlspecialchars($user_data['email'] ?? ''); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" value="<?= htmlspecialchars($user_data['address'] ?? ''); ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="zip_code">Zip Code</label>
                    <input type="text" id="zip_code" value="<?= htmlspecialchars($user_data['zip_code'] ?? ''); ?>" readonly>
                </div>
    <!-- Add more fields as necessary -->
</form>

        </div>
    </div>

</body>
</html>
