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
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
<header>
    <title>
        reparatie overzicht page
    </title>
    <link href="css/style_home.css" rel="stylesheet">
</header>
<body>
    <nav>
        <ul>
            <li><a href="index.php" class="left" style="color: black; text-decoration: none;"><h1>Home</h1></a></li>
            <li><a href="admin.php" class="right" style="color: black; text-decoration: none;"><h1>Admin</h1></a></li>
            <li><a href="logout.php" class="right" style="color: black; text-decoration: none;"><h1>Logout</h1></a></li>
        </ul>
    </nav>

    <div class="insert" style="text-align: center;">
    <h1>reparaties</h1>
    <?php

    $stmt = $pdo->query('SELECT * FROM reparaties');
    while ($row = $stmt->fetch()) {
        ?><a class="koelkasten" href="reparatie-overzicht.php?id=<?php echo $row["id"] ?>"><?php
        echo "<h3>" . $row['naam'] . "\n", '</h3><h3>' . $row['adres'] . '</h3><h3>' . $row['koelkast'] . '</h3><h3>' . $row['probleem'] . '</h3>'; ?></a><br><br>
        <?php
    }
    ?>
    </div>
<?php
//

?>
</body>