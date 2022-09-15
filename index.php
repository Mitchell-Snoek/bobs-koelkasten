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
        <form method="post">
            <label for="sort">sorteren</label>
            <select name="sort" id="sort">
                <option value="niet">niet</option>
                <option value="prijs">prijs</option>
                <option value="inhoud">inhoud</option>
                <option value="energie">energie label</option>
            </select>
            <input type="submit"></input>
        </form>
        <?php
        //echo koelkasten
        if (isset($_POST['sort'])) {
            $sort = $_POST['sort'];
            if ($sort == "niet") {
                $stmt = $pdo->query('SELECT * FROM koelkast');
                while ($row = $stmt->fetch()) {
                    ?><a style="text-decoration: none;" class="koelkasten" href="koelkast.php?id=<?php echo $row["id"] ?>"><?php
                    echo "<h3>" . $row['title'] . "\n", '</h3><br><img src="' . $row['foto'] . '" width="200" height="300"><br><h3>€' . $row['prijs'] . "\n" . '</h3><br>'; ?></a><br><br>
                    <?php
                }
            } elseif ($sort == "prijs") {
                $stmt = $pdo->query('SELECT * FROM koelkast ORDER BY prijs');
                while ($row = $stmt->fetch()) {
                    ?><a style="text-decoration: none;" class="koelkasten" href="koelkast.php?id=<?php echo $row["id"] ?>"><?php
                    echo "<h3>" . $row['title'] . "\n", '</h3><br><img src="' . $row['foto'] . '" width="200" height="300"><br><h3>€' . $row['prijs'] . "\n" . '</h3><br>'; ?></a><br><br>
                    <?php
                }
            } elseif ($sort == "inhoud") {
                $stmt = $pdo->query('SELECT * FROM koelkast ORDER BY inhoud');
                while ($row = $stmt->fetch()) {
                    ?><a style="text-decoration: none;" class="koelkasten" href="koelkast.php?id=<?php echo $row["id"] ?>"><?php
                    echo "<h3>" . $row['title'] . "\n", '</h3><br><img src="' . $row['foto'] . '" width="200" height="300"><br><h3>€' . $row['prijs'] . "\n" . '</h3><br>'; ?></a><br><br>
                    <?php
                }
            } elseif ($sort == "energie") {
                $stmt = $pdo->query('SELECT * FROM koelkast ORDER BY energie');
                while ($row = $stmt->fetch()) {
                    ?><a style="text-decoration: none;" class="koelkasten" href="koelkast.php?id=<?php echo $row["id"] ?>"><?php
                    echo "<h3>" . $row['title'] . "\n", '</h3><br><img src="' . $row['foto'] . '" width="200" height="300"><br><h3>€' . $row['prijs'] . "\n" . '</h3><br>'; ?></a><br><br>
                    <?php
                }
            }
        } else {
            $stmt = $pdo->query('SELECT * FROM koelkast');
            while ($row = $stmt->fetch()) {
                ?><a style="text-decoration: none;" class="koelkasten" href="koelkast.php?id=<?php echo $row["id"] ?>"><?php
                echo "<h3>" . $row['title'] . "\n", '</h3><br><img src="' . $row['foto'] . '" width="200" height="300"><br><h3>€' . $row['prijs'] . "\n" . '</h3><br>'; ?></a><br><br>
                <?php
            }
        }
        ?>
    </div>
</body>