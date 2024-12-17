<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: dashboard/{$_SESSION['role']}.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc; /* Light background for contrast */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: #007bff; /* Primary blue background */
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            color: white;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: 600;
        }

        .error-message {
            color: #f44336;
            font-size: 14px;
            margin-bottom: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            margin-bottom: 8px;
            color: #fff;
            font-weight: 500;
            text-align: left;
            width: 100%;
            font-size: 14px;
        }

        input {
            width: 100%;
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 8px;
            border: 1px solid #ddd;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        input:focus {
            border: 2px solid #0056b3; /* Darker blue for focus */
            box-shadow: 0 0 10px rgba(0, 86, 179, 0.4);
        }

        button {
            width: 100%;
            padding: 14px;
            background-color: #0056b3; /* Darker blue for button */
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #00408f; /* Even darker blue when hovering */
        }

        .login-container a {
            text-decoration: none;
            color: #ffffff;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .login-container {
                width: 90%;
                padding: 30px;
            }
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>

        <!-- Display error message if there is one -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <form action="process/login_process.php" method="POST">
            <label>Username:</label>
            <input type="text" name="username" required>

            <label>Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Login</button>
        </form>

        <!-- Link to Register page -->
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>

</body>
</html>
