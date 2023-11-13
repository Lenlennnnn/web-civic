<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/forgot.css" />
    <style>
        /* Reset Container Styles */
        .reset-container {
            width: 400px;
            margin: 0 auto;
            text-align: center;
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Heading Styles */
        .reset-container h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        /* HR Styles */
        .reset-container hr {
            border: none;
            height: 1px;
            background-color: #ddd;
            margin: 20px 0;
        }

        /* Paragraph Styles */
        .reset-container p {
            font-size: 16px;
            margin-bottom: 20px;
            color: #666;
        }

        /* Reset Method Styles */
        .reset-method {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            /* Align labels to the left */
            margin-bottom: 20px;
        }

        .reset-method label {
            font-size: 16px;
            margin-bottom: 5px;
            color: #333;
            text-align: left;
            /* Align label text to the left */
        }

        .reset-method input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .reset-method input[type="text"]:hover {
            animation: pulse 0.5s infinite alternate;
            /* Apply a pulsating border color on hover */
        }

        .reset-method input[type="text"]:hover,
        .reset-method input[type="text"]:focus {
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
            /* Add a box shadow on hover and focus */
        }

        /* Direct Login Button Styles */
        .direct {
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
        }

        .direct:hover {
            background-color: green;
        }

        /* Proceed to Login Page Link Styles */
        .reset-container a {
            text-decoration: none;
            color: #28a745;
            font-size: 16px;
        }

        .reset-container a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="reset-container">
        <h1>Type your new password</h1>
        <hr />
        <p>
            Please insert your new password
        </p>

        <div class="reset-method">
            <label for="text">New password</label>
            <input type="text" placeholder="Enter your new password" />
        </div>

        <div class="reset-method">
            <label for="text">Confirm password</label>
            <input type="text" placeholder="Re-type your new password" />
        </div>
        <a href="dashboard.php"><button class="direct">Login</button>
        </a>
        <br>
        <br>
        <a href="../Civic-web/login/login.php">Proceed to login page</a>
    </div>
</body>

</html>