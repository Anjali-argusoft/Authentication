<?php
session_start();
include "controller.php";
?>
<style>
.error {color: #FF0000;}
</style>
<html>
<head>
</head>
<body>
<?php
// define variables and set to empty values
$fnameErr = $lnameErr = $nameErr = $emailErr = $passerror = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['firstname'])) {
        $fnameErr = "firstname is required";
    } else {
        $firstname = $_POST['firstname'];
    }
    if (empty($_POST['lastname'])) {
        $lnameErr = "lastname is required";
    } else {
        $lastname = $_POST['lastname'];
    }
    if (empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else {
        $email = $_POST['email'];
    }
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

<form action="" method="POST">
<h2>Register</h2>
First Name: <input type="text" name="firstname" value="<?php echo $firstname; ?>">
<span class="error">*<?php echo $fnameErr; ?></span>
<br><br>
Last Name: <input type="text" name="lastname" value="<?php echo $lastname; ?>">
<span class="error">*<?php echo $lnameErr; ?></span>
<br><br>
E-mail: <input type="text" name="email" value="<?php echo $email; ?>">
  <span class="error">*<?php echo $emailErr; ?></span>
  <br><br>
Username: <input type="text" name="username" value="<?php echo $username; ?>">
  <span class="error">*<?php echo $nameErr; ?></span>
  <br><br>
Password: <input type="password" name="password" value="<?php echo $password; ?>">
<span class="error">*<?php echo $passerror; ?></span>
<br><br>
<input type="submit" name ="register" value="Register"><br><br>
</form>

<?php
if (isset($_POST["register"])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($firstname != "" && $lastname != "" && $email != "" && $username != "" && $password != "") {
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        $controller = new Controller();
        $result = $controller->register($firstname, $lastname, $email, $username, $password);
        echo "result is " . $result;
        if ($result) {
            header('location:login.php');
        }

    } else {
        echo "Enter all valid fields";
    }

}
?>

</body>

</html>