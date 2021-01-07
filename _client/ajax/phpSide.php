<?php
include_once '../classes/Database.php';

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
    <?php
        echo htmlspecialchars_decode($database->fetchContent('foot01'));
    ?>
    </body>
    <?php
}
