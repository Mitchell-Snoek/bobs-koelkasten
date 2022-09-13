<?php

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
    <link href="css/style_home.css" rel="stylesheet">
</header>
<body>
    <nav>
        <ul>
            <li><a href="index.php" class="left" style="color: black; text-decoration: none;"><h1>Home</h1></a></li>
            <li><a href="over-ons.php" class="left" style="color: black; text-decoration: none;"><h1>Over ons</h1></a></li>
            <li><a href="contact.php" class="left" style="color: black; text-decoration: none;"><h1>Contact</h1></a></li>
            <li><a href="reparatie.php" class="right" style="color: black; text-decoration: none;"><h1>Reparaties</h1></a></li>
            <li><a href="admin.php" class="right" style="color: black; text-decoration: none;"><h1>Admin</h1></a></li>
        </ul>
    </nav>

    <div>
        <?php
        //echo koelkasten
        $stmt = $pdo->query('SELECT * FROM koelkast');
        while ($row = $stmt->fetch()) {
            ?><a class="koelkasten" href="koelkast.php?id=<?php echo $row["id"] ?>"><?php
            echo "<h3>" . $row['title'] . "\n", '</h3><br><img src="' . $row['foto'] . '" width="200" height="300"><br><h3>prijs: €' . $row['prijs'] . "\n" . '</h3><br>'; ?></a><br><br>
            <?php
        }
        ?>
    </div>
</body>