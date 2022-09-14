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

$id = $_GET["id"];
$query = "SELECT * FROM koelkast WHERE id = $id";
$query = $pdo->prepare($query);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);
?>
<header>
    <title>
        edit page
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

    <div style="text-align: center;" class="insert">
    <h1>Edit de koelkast informatie</h1>
        <form method="post">
            <h3>naam</h3>
            <input name="title" value="<?php echo $row['title']; ?>"></input>
            <h3>prijs</h3>
            <input name="prijs" value="<?php echo $row['prijs']; ?>"></input>
            <h3>energie lable</h3>
            <input name="energie" value="<?php echo $row['energie']; ?>"></input>
            <h3>inhoud in L</h3>
            <input name="inhoud" value="<?php echo $row['inhoud']; ?>"></input>
            <h3>url van foto</h3>
            <input name="foto" value="<?php echo $row['foto']; ?>"></input>
            <h3>verzekeringen</h3>
            <label for="verzekering1">verzekering1</label>
            <input type='checkbox' name="verzekering1"></input>
            <br>
            <label for="verzekering2">verzekering2</label>
            <input type='checkbox' name="verzekering2"></input>
            <br>
            <label for="verzekering3">verzekering3</label>
            <input type='checkbox' name="verzekering3"></input>
            <br>
            <label for="verzekering4">verzekering4</label>
            <input type='checkbox' name="verzekering4"></input>
            <br>
            <label for="verzekering5">verzekering5</label>
            <input type='checkbox' name="verzekering5"></input>
            <h3>beschrijving (optioneel)</h3>
            <input value="<?php echo $row['beschrijving']; ?>" name="beschrijving"></input>
            <h3>artiekelnummer</h3>
            <input value="<?php echo $row['artiekelnummer']; ?>" name="artiekelnummer"></input>
            <h3>aantal op voorraad</h3>
            <input value="<?php echo $row['voorraad']; ?>" name="voorraad"></input>
            <h3>status</h3>
            <label for="nieuw">nieuw</label>
            <input type='checkbox' name="nieuw"></input>
            <br>
            <label for="gebruikt">gebruikt</label>
            <input type='checkbox' name="gebruikt"></input>
            <h3>datum</h3>
            <input value="<?php echo $row['datum']; ?>" name="datum"></input>
            <br>
            <br>
            <input type="submit" value="submit" name="submit">
        <?php
        $verzekeringen = "";
        if (isset($_REQUEST['title'])) {
            $title = $_REQUEST['title'];
        }
        if (isset($_REQUEST['prijs'])) {
            $prijs = $_REQUEST['prijs'];
        }
        if (isset($_REQUEST['energie'])) {
            $energie = $_REQUEST['energie'];
        }
        if (isset($_REQUEST['inhoud'])) {
            $inhoud = $_REQUEST['inhoud'];
        }
        if (isset($_REQUEST['foto'])) {
            $foto = $_REQUEST['foto'];
        }
        if (isset($_REQUEST['verzekering1'])) {
            $verzekeringen = $verzekeringen . " 1";
        }
        if (isset($_REQUEST['verzekering2'])) {
            $verzekeringen = $verzekeringen . " 2";
        }
        if (isset($_REQUEST['verzekering3'])) {
            $verzekeringen = $verzekeringen . " 3";
        }
        if (isset($_REQUEST['verzekering4'])) {
            $verzekeringen = $verzekeringen . " 4";
        }
        if (isset($_REQUEST['verzekering5'])) {
            $verzekeringen = $verzekeringen . " 5";
        }
        if (isset($_REQUEST['beschrijving'])) {
            $beschrijving = $_REQUEST['beschrijving'];
        }
        if (isset($_REQUEST['artiekelnummer'])) {
            $artiekelnummer = $_REQUEST['artiekelnummer'];
        }
        if (isset($_REQUEST['voorraad'])) {
            $voorraad = $_REQUEST['voorraad'];
        }
        if (isset($_REQUEST['nieuw'])) {
            $status = $_REQUEST['nieuw'];
        }
        if (isset($_REQUEST['gebruikt'])) {
            $status = $_REQUEST['gebruikt'];
        }
        if (isset($_REQUEST['datum'])) {
            $datum = $_REQUEST['datum'];
        }
        if (isset($_POST['submit'])) {
            $row = "UPDATE koelkast set title='" . $title . "',
            prijs='" . $prijs . "', energie='" . $energie . "',
            inhoud='" . $inhoud . "', foto='" . $foto . "',
            verzekert='" . $verzekeringen . "', beschrijving='" . $beschrijving . "',
            artiekelnummer='" . $artiekelnummer . "', voorraad='" . $voorraad . "',
            gebruikt='" . $status . "', datum='" . $datum . "'
            WHERE id='" . $id . "'";
            $message = "Record Modified Successfully";
            $stmt = $pdo->prepare($row);
            $stmt->execute([]);
            header("Refresh: 0; URL = admin.php");
        }
        ?>
        </form>
    </div>
<?php
//

?>
</body>