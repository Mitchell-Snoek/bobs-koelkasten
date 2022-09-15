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
        reparatie page
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

    <div style="text-align: center;" >
    <h1>Reparatie pagina</h1>
        <form method="post">
            <h3>naam</h3>
            <input name="naam"></input>
            <h3>adres</h3>
            <input name="adres"></input>
            <h3>type koelkast</h3>
            <input name="koelkast"></input>
            <h3>probleem</h3>
            <input name="probleem"></input>
            <br>
            <br>
            <input type="submit" value="submit" name="submit">
        </form>
    </div>
    <?php

    if (isset($_REQUEST['naam'])) {
        $naam = $_REQUEST['naam'];
    }
    if (isset($_REQUEST['adres'])) {
        $adres = $_REQUEST['adres'];
    }
    if (isset($_REQUEST['koelkast'])) {
        $koelkast = $_REQUEST['koelkast'];
    }
    if (isset($_REQUEST['probleem'])) {
        $probleem = $_REQUEST['probleem'];
    }
    if (isset($_POST['submit'])) {
        if (empty($_POST["naam"])) {
            echo "naam is required";
        } elseif (empty($_POST["adres"])) {
            echo "adres is required";
        } elseif (empty($_POST["koelkast"])) {
            echo "koelkast type is required";
        } elseif (empty($_POST["probleem"])) {
            echo "probleem is required";
        } else {
            $row =  "INSERT INTO `reparaties` (`naam`, `adres`, `koelkast`, `probleem`) VALUES
                (:naam, :adres, :koelkast, :probleem)";
            $stmt = $pdo->prepare($row);
            $stmt->execute([
                ":naam" => $naam,
                ":adres" => $adres,
                ":koelkast" => $koelkast,
                ":probleem" => $probleem
            ]);
            header("Refresh: 0; URL = index.php");
        }
    }
    ?>
</body>