<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin-login.css">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
    <title>Castelo Medical Clinic</title>
</head>

<body>
    <div class="login-wrapper">
        <div class="login-content">
            <div class="login-logo">
                <img src="images/hospital-logo.jpg" alt="castelo-logo" id="castelo-logo">
            </div>
            <div class="form">
                <form action="login.php" method="POST">
                    <h4>Welcome admin</h4>
                    <h4>SIGN IN</h4>
                    <div class="input-field">
                        <i class="material-icons prefix">person</i>
                        <input class="input" type="text" name="username">
                        <label for="username">Username</label>
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">lock</i>
                        <input  class="input" type="password" name="password">
                        <label for="password">Password:</label>
                    </div>
                    <p id="forgot-pass">forgot password?</p>
                    <div class="btn-container">
                        <input type="submit" value="Login" id="submit-button" class="btn waves-effect waves-light">
                    </div>
                </form>
            <a href="../index.php"><p class="return">&laquo;Return to Home</p></a>
            </div>
        </div>
    </div>
</body>
</html>
