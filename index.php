<?php
    include_once '_helpers/functions.php';
    include_once '_config/config.php';
    require 'core/init.php'; 
?>

<!DOCTYPE html>
<html>
    <head>
        <?php include_once 'includes/head.php' ?>
    </head>
    <body>
        <?php 
            // $database = new Database;
            // $query = $database->fetch('SELECT * FROM users');
            // debug($query);
        ?>
        <?php include_once 'includes/body.php' ?>
        
        <?php include_once 'includes/scripts.php' ?>
    </body>
</html>