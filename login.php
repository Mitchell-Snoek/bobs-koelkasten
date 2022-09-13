<?php

session_start();
$host = 'localhost';
$db = 'bob';
$user = 'root';
$password = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $password);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>
<head>
    <title>
        login page
    </title>
    <link href="css/style_login.css" rel="stylesheet">
</head>
<body>
    <h1>Admin Panel</h1>
    <form name="login" method="post">
        <input type="text" name="username">
        <input type="password" name="password">
        <input type="submit" name="submit">
    </form>
</body>
<?php

if (isset($_POST['submit'])) {
    $uname = $_POST['username'];
    $upassword = $_POST['password'];
    $res = $pdo->prepare('SELECT *
    FROM gebruikers
    WHERE gebruikersnaam = :naam AND wachtwoord = :ww');
    $res->bindParam(':naam', $uname, PDO::PARAM_STR);
    $res->bindParam(':ww', $upassword, PDO::PARAM_STR);
    $res->execute();
    $result = $res->fetch();
    if (!$res) {
        printf("Error: %s\n", mysqli_error($con));
        exit();
    }
    if ($result) {
        setcookie("login", "loggedin");
        header("location: admin.php");
    } else {
        echo "<h2 style='
        color: white;
        position: absolute;
        text-align: center;
        margin: 0 auto;
        left: 30%;
        right: 30%;
        top: 55%;'>failed to log in</h2> ";
    }
}
?>