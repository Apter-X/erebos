<?php
/*
* ___________             ___.                 
* \_   _____/______   ____\_ |__   ____  ______
*  |    __)_\_  __ \_/ __ \| __ \ /  _ \/  ___/
*  |        \|  | \/\  ___/| \_\ (  <_> )___ \ 
* /_______  /|__|    \___  >___  /\____/____  >
*         \/             \/    \/           \/ 
*/

Class Erebos extends Core 
{
    public function insertData($table, $targets, $values)
    {
        $request = <<<EOT
            INSERT INTO $table ($targets) VALUES ($values)
        EOT;

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $response = $this->exec($request);
        return $response;
    }

    public function fetchData($target, $table, $key, $value)
    {
        $request = <<<EOT
            SELECT $target FROM $table WHERE $key=$value
        EOT;

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $response = $this->fetch($request);

        $return = implode(array_values($response[0]));
        return $return;
    }

    public function subscribe()
    {

    }

    public function login()
    {

    }

    public function createFolder($path, $name)
    {
        $folder = array(
            "path"=>$path,
            "name"=>$name,
            "content"=>array(),
            "size"=>1
        );
        return $folder;
    }

    public function createFile($path, $name, $type)
    {
        $file = array(
            "path"=>$path,
            "name"=>$name,
            "type"=>$type,
            "content"=>"",
            "size"=>10
        );
        return $file;
    }
}