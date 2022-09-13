<?php

//check if logged in
session_start();
if ($_COOKIE['login'] == 'loggedin') {
    echo "";
} else {
    header("Location: login.php");
}
//connect database
$host = 'localhost';
$db = 'bob';
$user = 'root';
$password = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $password);

?>
<header>
    <title>
        home page
    </title>
    <link href="style_home.css" rel="stylesheet">
</header>
<body>
    <!-- log out button -->
    <form method="post" class='uitloggen'>
        <input type="submit" name="uitloggen" value="uitloggen">
    </form>

<?php
//log out
if (isset($_POST['uitloggen'])) {
    header('Refresh: 0; URL = index.php');
    exit();
}
?>
</body>