<?php
session_start();
include "controller.php";
?>
<style>
.error {color: #FF0000;}
</style>
<?php

$nameErr = $passerror = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['username'])) {
        $nameErr = "Username is required";
    } else {
        $username = $_POST['username'];
    }
    if (empty($_POST['password'])) {
        $passerror = "Pasword is required";
    } else {
        $password = $_POST['password'];
    }
}

?>
<html>
<head>
</head>
<body>

<form action="" method="POST">
<h2>Login</h2>
Username: <input type="text" name="username" value="<?php echo $username; ?>">
<span class="error">*<?php echo $nameErr; ?></span><br><br>
Password: <input type="password" name="password" value="<?php echo $password; ?>">
<span class="error">*<?php echo $passerror; ?></span><br><br>
<input type="submit" name ="login" value="Login"><br><br>
<input type="submit" name ="Register" value="Register"><br><br>
</form>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username != "" && $password != "") {
        $_SESSION['username'] = $username;
        $controller = new Controller();
        $result = $controller->login($username, $password);
        if ($result) {
            header('location:home.php');
        } else {
            echo "Click on <a href='register.php'>Register</a> link to get login";

        }
    }
}
if ($_POST['Register']) {
    header('location:register.php');
}

?>



</body>

</html>