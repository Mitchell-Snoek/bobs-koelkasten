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

        $id = $_GET["id"];
        $query = "SELECT * FROM koelkast WHERE id = $id";
        $query = $pdo->prepare($query);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        ?>

        <a href="index.php" name=""></a>
        <h1 class="title"><?php echo $row['title'];?></h1>
        <h3 class="prijs">prijs: <?php echo $row['prijs'];?></h3>
        <h4 class="awards">Awards: <?php echo $row['has_won_awards'];?></h4>
        <h4 class="country">Country:  <?php echo $row['country'];?></h4>
        <h4 class="taal">Language:  <?php echo $row['spoken_in_language'];?></h4>
        <h4 class="omsch"><?php echo $row['summary'];?></h4>

    </div>
</body>