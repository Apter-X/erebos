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
            $erebos = new Erebos();

            $query2 = $erebos->fetchData('username', 'users', 'user_id', $_SESSION['user']);
            printed($query2);

            $query3 = $erebos->fetchData('ip', 'users', 'user_id', $_SESSION['user']);
            printed(long2ip($query3));

            // $erebos->setFetchMode(PDO::FETCH_ASSOC);
            // $query = $erebos->fetch('SELECT * FROM users');
            // $values = array_map(function($var){ return $var['ip']; }, $query);
            // printed($values);

            
        ?>

        <?php include_once 'includes/body.php' ?>
        
        <?php include_once 'includes/scripts.php' ?>
    </body>
</html>