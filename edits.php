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
                    <br>
                    <br>
                    <input type="submit" value="submit" name="submit">
        <?php
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
        if (isset($_POST['submit'])) {
            $row = "UPDATE koelkast set title='" . $title . "',
            prijs='" . $prijs . "', energie='" . $energie . "',
            inhoud='" . $inhoud . "', foto='" . $foto . "' WHERE id='" . $id . "'";
            $message = "Record Modified Successfully";
            var_dump($row);
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