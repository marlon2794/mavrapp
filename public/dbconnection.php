<?php
    $nombres = $_POST['nombres'];
    $var = (bool) $_SERVER['APP_DEBUG'];
    echo "dbConnection \n" . $var;
    $db = $_SERVER['APP_ENV'];
    echo $nombres;
?>