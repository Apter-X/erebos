<?php
Class Erebos extends Core 
{
    public function debug($target, $table, $refKey = NULL, $refValue = NULL)
    {
        if(empty($refKey) && empty($refValue)){
            $sql = <<<EOT
                SELECT $target FROM $table
            EOT;
        } else {
            $sql = <<<EOT
                SELECT * FROM $table WHERE $refKey='$refValue'
            EOT;
        }

        $this->setFetchMode(PDO::FETCH_OBJ);
        $values = $this->fetch($sql);
        
        echo "<div class=\"col\"><pre>";
            print_r($values);
        echo "</pre></div>";
    }

    public function insertRow($table, $targets, $values)
    {
        $entry = str_replace(':', '', $targets);

        $sql = <<<EOT
            INSERT INTO $table ($entry) VALUES ($targets)
        EOT;

        $return = $this->execute($sql, $values);
        return $sql . " | " . $return;
    }

    public function updateValue($table, $key, $newValue, $refKey, $refValue)
    {
        $sql = <<<EOT
            UPDATE $table SET $key="$newValue" WHERE $refKey='$refValue'
        EOT;

        $return = $this->execute($sql);
        return $sql . " | " . $return;
    }

    public function fetchValue($target, $table, $refKey, $refValue)
    {

        $sql = <<<EOT
            SELECT $target FROM $table WHERE $refKey='$refValue'
        EOT;


        $this->setFetchMode(PDO::FETCH_ASSOC);
        $response = $this->fetch($sql);

        $return = implode(array_values($response[0])); //Remove the key
        return $sql . " | " . $return;
    }

    public function fetchObject($table, $refKey, $refValue){

        $sql = <<<EOT
            SELECT * FROM $table WHERE $refKey='$refValue'
        EOT;

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $query = $this->fetch($sql);

        $values = $query;

        return $sql . " | " . $values;
    }

    public function deleteRow($table, $refKey, $refValue){
        $sql = <<<EOT
            DELETE FROM $table WHERE $refKey='$refValue'
        EOT;

        $return = $this->execute($sql);
        return $sql . " | " . $return;
    }

    public function addColumn($table, $name, $type, $after){  
        $sql = <<<EOT
            ALTER TABLE $table ADD $name $type NOT NULL AFTER $after;
        EOT;

        $return = $this->execute($sql);
        return $sql . " | " . $return;
    }
}
