<?php
require '../core/init.php';
include_once '../_helpers/functions.php';

$cmd = new Command;
$commands = array();

if (isset($_POST['isTxt']) && !empty($_POST['isTxt'])){
    $command = $_POST['command'];
    array_push($commands, $cmd->post($command));
    
    foreach ($commands as $command) 
    {
        ?>
        <div class="card-body" id="padding">
            <p class="card-text float-left">
                <?= $command; ?>
            </p>
        </div>
        <?php
    } 
}

if (isset($_POST['isOn']) && !empty($_POST['isOn'])) {
    if(empty($_POST['command']))
    {
        ?>
            <div class="card-body">
                <h1 class="card-text float-left">Welcome to</h1><br><br>
                <div class=" float-left ascii-art">
___________             ___.                 
\_   _____/______   ____\_ |__   ____  ______
 |    __)_\_  __ \_/ __ \| __ \ /  _ \/  ___/
 |        \|  | \/\  ___/| \_\ (  <_> )___ \
/_______  /|__|    \___  >___  /\____/____  >
        \/             \/    \/           \/
                </div>
            </div><br><br><br><br><br><br>
        <?php
    }

    else if(isset($_POST['command']) && !empty('command')) 
    {
        $command = str_secure($_POST['command']);
        $arr = explode(' ', $command);

        if($arr[0] == "vim"){
            return;
        }

        else if($arr[0] != "debug"){
            array_push($commands, $command);
            array_push($commands, $cmd->post($command));
            
            foreach ($commands as $command) 
            {
                ?>
                <div class="card-body" id="padding">
                    <p class="card-text float-left">
                        <?= $command; ?>
                    </p>
                </div>
                <?php
            }
        } else {
            array_push($commands, $cmd->post($command));
        }
    }
}