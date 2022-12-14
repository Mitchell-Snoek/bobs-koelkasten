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
        contact page
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
    <h1>Contact pagina</h1>
        <form method="post">
            <h3>naam</h3>
            <input name="naam"></input>
            <h3>email</h3>
            <input type="email" name="email"></input>
            <h3>waar wilt u contact over hebben</h3>
            <input name="contact"></input>
            <br>
            <br>
            <input type="submit" value="submit" name="submit"></input>
        </form>
        <?php
        
        if (isset($_POST['submit'])) {
            if (empty($_POST["naam"])) {
                echo "naam is required";
            } elseif (empty($_POST["email"])) {
                echo "email is required";
            } elseif (empty($_POST["contact"])) {
                echo "contact is required";
            } else {
                $naam = $_REQUEST['naam'];
                $email = $_REQUEST['email'];
                $contact = $_REQUEST['contact'];
                $row =  "INSERT INTO `contact` (`naam`, `email`, `info`) VALUES
                (:naam, :email, :info)";
                $stmt = $pdo->prepare($row);
                $stmt->execute([
                    ":naam" => $naam,
                    ":email" => $email,
                    ":info" => $contact
                ]);
                header("Refresh: 0; URL = index.php");
            }
        }
        ?>
    </div>
</body>