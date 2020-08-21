<?php
Class Erebos extends Core 
{
    public function debug($target, $table, $refKey = NULL, $refValue = NULL)
    {
        if(empty($refKey) && empty($refValue)){
            $sql = <<<EOT
                SELECT $target FROM $table
            EOT;
        } elseif((intval($refValue) > 0)){
            $int_value = intval($refValue);

            $sql = <<<EOT
                SELECT * FROM $table WHERE $refKey=$int_value
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

    public function insertData($table, $targets, $values)
    {
        $entry = str_replace(':', '', $targets);

        $sql = <<<EOT
            INSERT INTO $table ($entry) VALUES ($targets)
        EOT;

        $return = $this->execute($sql, $values);
        return $return;
    }

    public function fetchValue($target, $table, $refKey, $refValue)
    {
        $int = intval($refValue);

        //If the value are int
        if($int > 0 ){
            $int_value = intval($refValue);

            $sql = <<<EOT
                SELECT $target FROM $table WHERE $refKey=$int_value
            EOT;
        } else {
            $sql = <<<EOT
                SELECT $target FROM $table WHERE $refKey='$refValue'
            EOT;
        }

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $response = $this->fetch($sql);

        $return = implode(array_values($response[0])); //Remove the key
        return $return;
    }

    public function fetchObject($table, $refKey, $refValue){
        if((intval($refValue) > 0)){
            $int_value = intval($refValue);
            $sql = <<<EOT
                SELECT * FROM $table WHERE $refKey=$int_value
            EOT;
        } else {
            $sql = <<<EOT
                SELECT * FROM $table WHERE $refKey='$refValue'
            EOT;
        }

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $query = $this->fetch($sql);

        $values = $query;

        return $values;
    }

    public function deleteRow($table, $refKey, $refValue){
        //If the value are int or not
        if((intval($refValue) > 0)){
            $int_value = intval($refValue);

            $sql = <<<EOT
                DELETE FROM $table WHERE $refKey=$int_value
            EOT;
        } else {
            $sql = <<<EOT
                DELETE FROM $table WHERE $refKey='$refValue'
            EOT;
        }

        $return = $this->execute($sql);
        return $return;
    }

    public function addColumn($table, $name, $type, $after){  
        $sql = <<<EOT
            ALTER TABLE $table ADD $name $type NOT NULL AFTER $after;
        EOT;

        $return = $this->execute($sql);
        return $return;
    }
}
