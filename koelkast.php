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
        koelkast page
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

    <div style="width: 100%;">
        <?php

        $id = $_GET["id"];
        $query = "SELECT * FROM koelkast WHERE id = $id";
        $query = $pdo->prepare($query);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_ASSOC);
        ?>
        <h2 class="title"><?php echo $row['title'];?></h2>
        <h2 class="prijs">€<?php echo $row['prijs'];?></h2>
        <h2 class="energie">energie label <?php echo $row['energie'];?></h2>
        <h2 class="inhoud">inhoud:  <?php echo $row['inhoud'];?>L</h2>
        <?php


        $get = "SELECT * FROM koelkastverzekering WHERE koelkast = $id";
        $get = $pdo->prepare($get);
        $get->execute();
        $rows = $get->fetch(PDO::FETCH_ASSOC);
        $ver = $rows['verzekering'];
        $gett = "SELECT * FROM verzekeringen WHERE id = $ver";
        $gett = $pdo->prepare($gett);
        $gett->execute();
        $rowss = $gett->fetch(PDO::FETCH_ASSOC);
        echo '<h2>' . $rowss['naam'] . '</h2><h2>' . $rowss['verzekering'] . '</h2>';
        while ($rows = $get->fetch()) {
            $ver = $rows['verzekering'];
            $gett = "SELECT * FROM verzekeringen WHERE id = $ver";
            $gett = $pdo->prepare($gett);
            $gett->execute();
            $rowss = $gett->fetch(PDO::FETCH_ASSOC);
            echo '<h2>' . $rowss['naam'] . '</h2><h2>' . $rowss['verzekering'] . '</h2>';
        }
        

        //$verzekering = $row['verzekert'];
        //$verzekeringen = str_split($verzekering);
        //foreach ($verzekeringen as $ver) {
        //    if ($ver == " ") {
        //        //
        //    } elseif (empty($ver)) {
        //        //
        //    } else {
        //        $get = "SELECT * FROM verzekeringen WHERE id = $ver";
        //        $get = $pdo->prepare($get);
        //        $get->execute();
        //        $rows = $get->fetch(PDO::FETCH_ASSOC);
        //        echo '<h2>' . $rows['naam'] . '</h2><h2>' . $rows['verzekering'] . '</h2>';
        //    }
        //}
        ?>
        <img src="<?php echo $row['foto'] ?>">
        <p class="beschrijving">beschrijving: <?php echo $row['beschrijving'];?></p>
        <p class="gebruikt">status: <?php echo $row['gebruikt'];?></p>
        <p class="voorraad">voorraad: <?php echo $row['voorraad'];?></p>
        <p class="datum"><?php echo $row['datum'];?></p>
        <p class="artiekelnummer">artiekelnummer: <?php echo $row['artiekelnummer'];?></p>
    </div>
</body>