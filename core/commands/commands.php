<?php
function Command($command)
{
    $erebos = new Erebos();
    $request = explode(" ", $command);

    if($request[0] == "debug"){
        if(count($request) == 2){
            $erebos->debug($request[1]);
            return "test";
        } else {
            $erebos->debug("Invalid Parameter!");
        }
    }

    elseif($request[0] == "folder") {
        
        if(count($request) == 3){
            $erebos->createFolder($request[1], $request[2]);
            return "Folder Created! Path: $request[1] - Name: $request[2]";
        } else {
            return "Invalid Parameter!";
        }
    }

    elseif($request[0] == "list") {
        if(count($request) == 2){
            $return = $erebos->listValues($request[1]);
            return $return;
        } else {
            return "Invalid Parameter!";
        }
    }

    elseif($request[0] == "fetch") {
        if(count($request) == 5){
            $return = $erebos->fetchValue($request[1], $request[2], $request[3], intval($request[4]));
            return $return;
        } else {
            return "Invalid Parameter!";
        }
    }

    elseif($request[0] == "insert") {
        if(count($request) == 4){
            $return = $erebos->insertData($request[1], $request[2], $request[3]);
            return $return;
        } else {
            return "Invalid Parameter!";
        }
    }

    else {
        return "Invalid Command!";
    }
}