<?php
include_once '../_classes/Database.php';

if (isset($_POST['isOn']) && !empty($_POST['isOn'])) {
    $database = new Database;

    $nav = $database->fetchContent('nav01');
    $about = $database->fetchContent('about');
    // $experience = $database->fetchContent('experience');
    // $education = $database->fetchContent('education');
    // $skills = $database->fetchContent('skills');
    // $interests = $database->fetchContent('interests');
    // $awards = $database->fetchContent('awards');

    ?>
    <?php

    echo htmlspecialchars_decode($nav);
    echo htmlspecialchars_decode($about);
    // echo htmlspecialchars_decode($experience);
    // echo htmlspecialchars_decode($education);
    // echo htmlspecialchars_decode($skills);
    // echo htmlspecialchars_decode($interests);
    // echo htmlspecialchars_decode($awards);

    ?>
    <?php
}