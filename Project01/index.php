<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to O'clock</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Cambria', serif;
            background: url('bg.png') no-repeat center center fixed;
            background-size: cover;
            color: #000; /* Set font color for all text to black */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
        }

        /* Add a semi-transparent overlay */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7); /* Black with 70% transparency */
            z-index: 1;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            padding: 30px;
            background-color: #fff;
            border: 1px solid #000;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 2;
        }

        .logo-container {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 30px;
        }

        .logo-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form-control {
            border-color: #000;
            background-color: #fff;
            color: #000; /* Black font color for input text */
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 8px;
            font-size: 1.1rem;
        }

        .form-control::placeholder {
            color: #000; /* Black placeholder text color */
        }

        .form-control:focus {
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.3);
        }

        .btn-outline-dark {
            border-color: #000;
            color: #000;
            background-color: #fff;
            padding: 15px 20px;
            font-weight: bold;
            border-radius: 8px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
        }

        .btn-outline-dark:hover {
            background-color: #000;
            color: #fff;
        }

        .text-center {
            text-align: center;
            color: #000; /* Black text color for center-aligned text */
        }

        .form-label {
            font-weight: bold;
            font-size: 1.1rem;
            color: #000; /* Black font color for labels */
        }

        a.text-decoration-none {
            color: #000; /* Black font color for links */
            font-weight: bold;
            font-size: 1rem;
        }

        a.text-decoration-none:hover {
            color: #555; /* Slightly different hover color */
        }

        /* Subtle animation for the form fields */
        .form-control, .btn-outline-dark {
            transition: all 0.3s ease;
        }

        .form-control:hover, .btn-outline-dark:hover {
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="form-container">
        <div class="logo-container">
            <img src="oclocks.png" alt="Logo">
        </div>
        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" placeholder="Enter your username" class="form-control" name="user_name" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" placeholder="Enter your password" class="form-control" name="password" required>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-outline-dark" href="homepage.php" >Login</button>
            </div>
            <div class="mt-3 text-center">
                <p>Don't have an account? <a href="register.php" class="text-decoration-none">Create New</a></p>
            </div>
        </form>
    </div>

    <script src="js/bootstrap.min.js"></script>
</body>
</html>   