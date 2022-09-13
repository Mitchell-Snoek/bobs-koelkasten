<?php

//connect database
$host = 'localhost';
$db = 'bob';
$user = 'root';
$password = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$pdo = new PDO($dsn, $user, $password);

$id = $_GET["id"];
$query = "SELECT * FROM koelkast WHERE id = $id";
$query = $pdo->prepare($query);
$query->execute();
$row = $query->fetch(PDO::FETCH_ASSOC);

$sql = "DELETE FROM koelkast WHERE id = $id;";
if ($pdo->query($sql) === true) {
    echo "Record deleted successfully";
    header('Refresh: 0; URL = admin.php');
    exit();
} else {
    echo "Error deleting record: ";
    header('Refresh: 0; URL = admin.php');
}
  
?>