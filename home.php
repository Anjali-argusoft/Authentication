<?php
session_start();
echo "Welcome " . $_SESSION['firstname'] . " " . $_SESSION['lastname']."<br>";

echo "This is home page! <br> ";

echo "<a href='logout.php'>Logout</a><br>";
