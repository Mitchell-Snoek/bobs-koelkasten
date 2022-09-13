<?php

setcookie("login", "notlogged");
echo 'logout';
header('Refresh: 0; URL = login.php');
exit();