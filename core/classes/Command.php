<?php
class Command extends Desktop
{
    public function vim($content, $refKey, $refValue)
    {
        $return = $this->editContent($content, $refKey, $refValue);
        return $return;
    }

    public function post($command, $path = NULL)
    {
        $request = explode(" ", $command);

        if($request[0] == "debug"){
            if(!empty($request[3]) && !empty($request[4])){
                $this->debug($request[1], $request[2], $request[3], $request[4]);
            } else {
                $this->debug($request[1], $request[2]);
            }
        }

        elseif($request[0] == "cd") {
            if(count($request) == 2){
                $return = $this->changePath($path, $request[1]);
                return $return;
            } else {
                return '/';
            }
        }

        elseif($request[0] == "ls") {
            if(count($request) == 1){
                $return = $this->list($path);
                return $return;
            } else {
                return '- No parameter required.';
            }
        }

        elseif($request[0] == "update") {
            if(count($request) == 6){
                $return = $this->updateValue($request[1], $request[2], $request[3], $request[4], $request[5]);
                return $return;
            } else {
                return '- At least 5 parameters are required, "update $table $key $newValue $refKey $refValue".';
            }
        }

        elseif($request[0] == "addColumn") {
            if(count($request) == 5){
                $return = $this->addColumn($request[1], $request[2], $request[3], $request[4]);
                return $return;
            } else {
                return '- At least 4 parameters are required, "addColumn $table $name $type $after".';
            }
        }

        elseif($request[0] == "delete") {
            if(count($request) == 4){
                $return = $this->deleteRow($request[1], $request[2], $request[3]);
                return $return;
            } else {
                return '- At least 3 parameters are required, "delete $table $refKey $refValue".';
            }
        }

        elseif($request[0] == "fetch") {
            if(count($request) == 5){
                $return = $this->fetchValue($request[1], $request[2], $request[3], $request[4]);
                return $return;
            } else {
                return '- At least 4 parameters are required, "fetch $key $table $refKey $refValue".';
            }
        }

        elseif($request[0] == "mkdir") { 
            if(count($request) == 2){
                $return = $this->createFolder($path, $request[1]);
                return $return;
            } else {
                return '- At least 1 parameters are required, "mkdir $name".';
            }
        }

        elseif($request[0] == "touch") {
            if(count($request) == 3){
                $return = $this->createFile($path, $request[1], $request[2]);
                return $return;
            } else {
                return '- At least 3 parameters are required, "touch $name $format".';
            }
        }

        elseif($request[0] == "object") {
            if(count($request) == 4){
                $return = $this->fetchObject($request[1], $request[2], $request[3]);
                return  json_encode($return);
            } else {
                return '- At least 3 parameter are required, "object $table $refKey $refValue".';
            }
        }

        elseif($request[0] == "lorem"){
            return '- Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.';
        }
        
        elseif($request[0] == "help"){
            return 
            '<p>- Erebos is a web-terminal database management system.</p>            

                <div><u>Database:</u></div>
                <li style="list-style-type:none;"><b>cd</b>    : Move into a specified folder.</li>
                <li style="list-style-type:none;"><b>update</b>    : Update a value.</li>
                <li style="list-style-type:none;"><b>addColumn</b> : Add a column on a table.</li>
                <li style="list-style-type:none;"><b>delete</b>    : Delete an object.</li>
                <li style="list-style-type:none;"><b>fetch</b>     : Read a specific value.</li>
                <li style="list-style-type:none;"><b>mkdir</b>     : Create a folder format and store it.</li>
                <li style="list-style-type:none;"><b>touch</b>     : Create a file format and store it.</li>
                <li style="list-style-type:none;"><b>object</b>    : Read an object.</li>

                <div><u>Tools:</u></div>
                <li style="list-style-type:none;"><b>debug</b>     : Get an array of a table vardumped on the left screen.</li>
                <li style="list-style-type:none;"><b>vim</b>       : Edit a file content.</li>

                <div><u>Utilities:</u></div>
                <li style="list-style-type:none;"><b>clear</b>     : Clear the principal screen.</li>
                <li style="list-style-type:none;"><b>reset</b>   : Refresh the page.</li>
                <li style="list-style-type:none;"><b>lorem</b>     : A lot of text.</li>
            ';
        }

        else {
            return "- Invalid Command! Please enter a valid command or use \"help\" for more information.";
        }
    }
}
