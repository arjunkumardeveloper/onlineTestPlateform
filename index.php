<?php
/**
 * The file doc comment
 * php version 7.2.10
 * 
 * @category Class
 * @package  Package
 * @author   Original Author <author@example.com>
 * @license  https://www.cedcoss.com cedcoss 
 * @link     link
 */
session_start();

require 'config.php';
require 'function.php';
$msg = '';
$mssg = '';

if (isset($_POST['register'])) {
    $name = $_POST['name'];     
    $uname = $_POST['username'];     
    $pass = $_POST['password'];     

    $user = array("name"=>$name, "uname"=>$uname, "pass"=>$pass);

    $msg = registerUser($user);
    
}

if (isset($_POST['login'])) {
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    $login = array("uname"=>$uname, "pass"=>$pass);

    $mssg = loginUser($login);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Online Test</title>
</head>

<body>
    <h2 class="fheading">Online Test Plateform</h2>
    <div class="container">
        <div class="login">
            <h3>Login</h3>
            <div><?php echo $mssg; ?></div>
            <form action="" method="post" name="loginForm">
                <div class="form-group">
                    <label for="username">Username/Email</label>
                    <input type="text" name="uname" id="username" 
                    class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="pass" id="password" 
                    class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Login" name="login" 
                    onclick="return loginValidate()">
                </div>
            </form>
        </div>
        <div class="register">
            <h3>Register</h3>
            <div><?php echo $msg; ?></div>
            <form action="index.php" method="post" name="regiForm">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" 
                    class="form-control">
                </div>
                <div class="form-group">
                    <label for="username">Username/Email</label>
                    <input type="text" name="username" id="username" 
                    class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" 
                    class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" value="Register" name="register" 
                    onclick="return validate()">
                </div>
            </form>
        </div>
    </div>
</body>
</html>