<?php
include_once '../_classes/Database.php';

if (isset($_POST['isOn']) && !empty($_POST['isOn'])) {
    $database = new Database;

    ?>
    <head>
    <?php
        echo htmlspecialchars_decode($database->fetchContent('head01'));
    ?>
    </head>
    <body id="page-top">
    <?php
        echo htmlspecialchars_decode($database->fetchContent('nav01'));
        echo htmlspecialchars_decode($database->fetchContent('about'));
        echo htmlspecialchars_decode($database->fetchContent('experience'));
        echo htmlspecialchars_decode($database->fetchContent('education'));
        echo htmlspecialchars_decode($database->fetchContent('skills'));
        echo htmlspecialchars_decode($database->fetchContent('interests'));
        echo htmlspecialchars_decode($database->fetchContent('awards'));        
    ?>
        <!-- Bootstrap core JS-->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="assets/js/scripts.js"></script>
    </body>
    <?php
}
