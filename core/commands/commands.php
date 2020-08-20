<?php
function Command($command)
{
    $erebos = new Erebos();
    $request = explode(" ", $command);

    if($request[0] == "debug"){
        $erebos->debug($request[1]);
    }

    if($request[0] == "lorem"){
        return "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
    }

    elseif($request[0] == "folder") {
        
        if(count($request) == 3){
            $erebos->createFolder($request[1], $request[2]);
            return "Folder Created! Path: $request[1] - Name: $request[2]";
        } else {
            return 'Invalid Parameter! folder $path $name.';
        }
    }

    elseif($request[0] == "list") {
        if(count($request) == 2){
            $return = $erebos->listValues($request[1]);
            return  json_encode($return);
        } else {
            return 'Invalid Parameter! list $table';
        }
    }

    elseif($request[0] == "fetch") {
        if(count($request) == 5){
            $return = $erebos->fetchValue($request[1], $request[2], $request[3], intval($request[4]));
            return $return;
        } else {
            return 'Invalid Parameter! fetch $key $table $refKey $refValue';
        }
    }

    else {
        return "Invalid Command!";
    }
}