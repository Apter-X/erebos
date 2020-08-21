<?php
class Command extends Desktop
{
    public function post($command)
    {
        $request = explode(" ", $command);

        if($request[0] == "debug"){
            $this->debug($request[1], $request[2], $request[3], $request[4]);
        }

        elseif($request[0] == "mkdir") { 
            if(count($request) == 3){
                $return = $this->createFolder($request[1], $request[2]);
                return "- Create folder! Path: $request[1] - Name: $request[2] | $return.";
            } else {
                return '- Invalid Parameter! At least 2 parameters are required folder, "mkdir $path $name."';
            }
        }

        elseif($request[0] == "touch") {
            if(count($request) == 5){
                $return = $this->createFile($request[1], $request[2], $request[3], $request[4]);
                return "- Create file! Path: $request[1] - Name: $request[2]. $return.";
            } else {
                return '- Invalid Parameter! At least 4 parameters are required folder, "touch $path $name $format $link."';
            }
        }

        elseif($request[0] == "delete") {
            if(count($request) == 4){
                $return = $this->deleteRow($request[1], $request[2], $request[3]);
                return "- Remove file! From: $request[1] - Name: $request[3] | $return";
            } else {
                return '- Invalid Parameter! At least 3 parameters are required folder, "delete $table $refKey $refValue."';
            }
        }

        elseif($request[0] == "object") {
            if(count($request) > 0){
                $return = $this->fetchObject($request[1], $request[2], $request[3]);
                return  json_encode($return);
            } else {
                return '- Invalid Parameter! At least 3 parameter are required, "object $table $refKey $refValue"';
            }
        }

        elseif($request[0] == "fetch") {
            if(count($request) == 5){
                $return = $this->fetchValue($request[1], $request[2], $request[3], $request[4]);
                return $return;
            } else {
                return '- Invalid Parameter! At least 4 parameters are required, "fetch $key $table $refKey $refValue".';
            }
        }

        elseif($request[0] == "addColumn") {
            if(count($request) == 5){
                $return = $this->addColumn($request[1], $request[2], $request[3], $request[4]);
                return "- Database add column! From: $request[1] - Name: $request[3] | $return";
            } else {
                return '- Invalid Parameter! At least 4 parameters are required, "addColumn $table $name $type $after".';
            }
        }

        elseif($request[0] == "lorem"){
            return 
            '<div class="card-body" id="padding">
            <p class="card-text float-left">
                - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
            </p>
            </div><br><br>';
        }

        else {
            return "- Invalid Command! Please enter a valid command or use \"help\" for more information.";
        }
    }
}