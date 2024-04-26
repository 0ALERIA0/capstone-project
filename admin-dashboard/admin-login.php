<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin-login.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Castelo Medical Clinic</title>
</head>

<body>
    <div class="login-wrapper">
        <div class="login-content">
            <div class="login-logo">
                <img src="images/hospital-logo.jpg" alt="castelo-logo" id="castelo-logo">
            </div>
            <div class="form">
                <form action="">
                    <h2>Welcome admin</h2>
                    <h3 class="sign-in-title">SIGN IN</h3>
                    <label for="username">Username:</label>
                    <input class="input" type="text" name="username" placeholder="Admin Username">
                    <label for="password">Password:</label>
                    <input  class="input" type="password" name="password" placeholder="Password">
                    <p id="forgot-pass">forgot password?</p>
                    <div class="btn-container">
                        <input type="submit" value="Login" id="submit-button">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
