<?php
// require '../core/init.php';

if (isset($_POST['method']) && !empty($_POST['method'])) {
    $method = $_POST['method'];

    if ($method == 'response') {
        $responses = NULL;
        
        if (empty($responses)) {
            ?>
                <div class="card-body">
                    <h1 class="card-text float-left">Welcome to</h1><br>
                    <div class="card-text float-left ascii-art">
___________             ___.                 
\_   _____/______   ____\_ |__   ____  ______
 |    __)_\_  __ \_/ __ \| __ \ /  _ \/  ___/
 |        \|  | \/\  ___/| \_\ (  <_> )___ \
/_______  /|__|    \___  >___  /\____/____  >
        \/             \/    \/           \/
                    </div>
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

    else if($method == 'request' && isset($_POST['request']))
    {
        //recuperation du message
        $command = $_POST['command'];

        if(!empty($command))
        {
            $erebos->request($command);
        }    
    }
}
