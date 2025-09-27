<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">
        <div class="form-box">
            <!-- Buttons to Toggle Forms -->
            <div class="toggle-buttons">
                <button id="loginBtn" onclick="showLogin()">Log In</button>
                <button id="signupBtn" onclick="showSignup()">Sign Up</button>
            </div>

            <!-- Login Form -->
            <div id="login-form" class="form active">
                <h2>Log In</h2>
                <form action="login.php" method="POST">
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>
            </div>

            <!-- Signup Form -->
            <div id="signup-form" class="form">
                <h2>Sign Up</h2>
                <form action="signup.php" method="POST">
                    <input type="text" name="fullname" placeholder="Full Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Sign Up</button>
                </form>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
