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
        admin page
    </title>
    <link href="css/style_home.css" rel="stylesheet">
</header>
<body>
    <nav>
        <ul>
            <li><a href="index.php" class="left" style="color: black; text-decoration: none;"><h1>Home</h1></a></li>
            <li><a href="logout.php" class="right" style="color: black; text-decoration: none;"><h1>logout</h1></a></li>
        </ul>
    </nav>
    <form method="post" style="margin: 50px;">
        <input type="submit" name="toevoegen" value="toevoegen">
        <input type="submit" name="aanpassen" value="aanpassen">
        <input type="submit" name="verwijderen" value="verwijderen">
        <input type="submit" name="reparaties" value="reparaties">
        <input type="submit" name="contact" value="contact">
    </form>

<?php

if (isset($_POST['verwijderen'])) {
    header('Refresh: 0; URL = delete.php');
    exit();
}
if (isset($_POST['aanpassen'])) {
    header('Refresh: 0; URL = edit.php');
    exit();
}
if (isset($_POST['toevoegen'])) {
    header('Refresh: 0; URL = add.php');
    exit();
}
if (isset($_POST['reparaties'])) {
    header('Refresh: 0; URL = reparatie-overzicht.php');
    exit();
}
if (isset($_POST['contact'])) {
    header('Refresh: 0; URL = contact-overzicht.php');
    exit();
}
?>
</body>