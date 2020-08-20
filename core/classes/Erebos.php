<?php
Class Erebos extends Core 
{
    public function debug($table)
    {
        $request = <<<EOT
            SELECT * FROM $table
        EOT;

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $values = $this->fetch($request);

        echo "<div class=\"col\"><pre>";
        var_dump($values);
        echo "<div>----------------------</div>";
        echo "</pre></div>";
    }

    public function login()
    {

    }

    public function insertData($table, $targets, $values)
    {
        $entry = str_replace(':', '', $targets);

        $request = <<<EOT
            INSERT INTO $table ($entry) VALUES ($targets)
        EOT;

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $response = $this->execute($request, $values);
        return $response;
    }

    public function fetchValue($target, $table, $key, $value)
    {
        $request = <<<EOT
            SELECT $target FROM $table WHERE $key=$value
        EOT;

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $response = $this->fetch($request);

        $return = implode(array_values($response[0]));
        return $return;
    }

    public function listValues($table){
        $request = <<<EOT
            SELECT * FROM $table
        EOT;

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $query = $this->fetch($request);
        $values = array_map(function($var){ return $var['name']; }, $query);

        return $values;
    }

    public function createFolder($path, $name){
        $folder = array(
            "id_user"=>1,
            "path"=>$path,
            "name"=>$name
        );

        $this->insertData('folders', ':id_user, :path, :name', $folder);
    }
}