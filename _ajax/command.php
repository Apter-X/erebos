<?php
require '../core/init.php';

if (isset($_POST['method']) && !empty($_POST['method'])) {

    $erebos = new Erebos();
    $method = $_POST['method'];

    if ($method == 'response') {
        $responses = $erebos->response();

        if (empty($responses)) {
            ?>
                <div class="card-body">
                    <h1 class="card-text float-left">Welcome to <a href="#">Erebos</a></h1>
                </div>
            <?php
        } else {
            foreach ($responses as $response) {
                ?>
                    <div class="card-body">
                        <p class="card-text float-left"><?= $response ?></p>
                    </div>
                <?php
            }
        }
    }
}
