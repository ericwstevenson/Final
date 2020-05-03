<?php
    $dsn = 'mysql:host=vhw3t8e71xdz9k14.cbetxkdyhwsb.us-east-1.rds.amazonaws.com;dbname=h33tkts51y3t6arv';
    $username = 'dpcan3kb42klrefc';
    $password = 'i8yi90ga20x31vgq';
    
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
