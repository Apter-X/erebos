<?php
require '../core/init.php';

$cmd = new Command;
$commands = array();

//if is a textarea post
if (isset($_POST['isTxt']) && !empty($_POST['isTxt'])){

    $content = str_secure($_POST['content']);
    $refKey = str_secure($_POST['refKey']);
    $refValue = str_secure($_POST['refValue']);

    array_push($commands, "vim " . $refKey . " " . $refValue);
    $cmd->vim($content, $refKey, $refValue);

    foreach ($commands as $command)
    {
        ?>
            <ul>
                <li>
                    <?= $command; ?>
                </li>
            </ul>
        <?php
    }
}

//if is for fetch an information
else if (isset($_POST['isFetch']) && !empty($_POST['isFetch'])){
    
    $command = str_secure($_POST['command']);

    ?>
        <?= $cmd->post($command); ?>
    <?php
}

// determine and execute if there is no command or not or if its about debug
else if (isset($_POST['isOn']) && !empty($_POST['isOn'])) {
    if(empty($_POST['command']))
    {
        ?>
            <div class="card-body">
                <!-- <h1 class="card-text float-left">Welcome to</h1><br><br><br> -->
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

    else if(isset($_POST['command']) && !empty($_POST['command'])) 
    {
        $command = str_secure($_POST['command']);
        $path = str_secure($_POST['path']);
        $arr = explode(' ', $command);

        if($arr[0] == "debug"){ //too much conditions
            array_push($commands, $cmd->post($command));
        } 
        
        else if($arr[0] == "cd") { 
            ?>
                <?= $cmd->post($command, trim($path)); ?>
            <?php
        } 
        
        else {
            array_push($commands, $command);
            array_push($commands, $cmd->post($command, trim($path)));
            
            foreach ($commands as $command) 
            {
                ?>
                <ul>
                    <li>
                        <?= $command; ?>
                    </li>
                </ul>
                <?php
            }
        }
    }
}