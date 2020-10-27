<?php
/**
* Class Erebos
* This PHP class regroup basic methods of the program
* ___________             ___.                 
* \_   _____/______   ____\_ |__   ____  ______
*  |    __)_\_  __ \_/ __ \| __ \ /  _ \/  ___/
*  |        \|  | \/\  ___/| \_\ (  <_> )___ \
* /_______  /|__|    \___  >___  /\____/____  >
*         \/             \/    \/           \/
*/
Class Erebos extends Core 
{
    /**
    * Debug the database by fetching data on screen
    * @param string $target key
    * @param string $selected table
    * @param string|null $reference key
    * @param string|null $reference value
    * @return void
    */
    public function debug($target, $table, $refKey = NULL, $refValue = NULL)
    {
        if(empty($refKey) && empty($refValue)){
            $sql = <<<EOT
                SELECT $target FROM $table
            EOT;
        } else {
            $sql = <<<EOT
                SELECT $target FROM $table WHERE $refKey='$refValue'
            EOT;
        }

        $this->setFetchMode(PDO::FETCH_OBJ);
        $values = $this->fetch($sql);
        
        echo "<div class=\"col\"><pre>";
            print_r($values);
        echo "</pre></div>";
    }

    /**
    * Add a row of data 
    * @param string $selected table
    * @param string $reference key
    * @param string $row values
    * @return requestSQL+PDOStatement
    */
    public function insertRow($table, $targets, $values)
    {
        $entry = str_replace(':', '', $targets);

        $sql = <<<EOT
            INSERT INTO $table ($entry) VALUES ($targets)
        EOT;

        $return = $this->execute($sql, $values);
        return $sql . " | " . $return;
    }

    /**
    * Update a unique value
    * @param string $selected table
    * @param string $value key
    * @param string $new value
    * @param string $reference key
    * @param string|int $reference value
    * @return requestSQL+PDOStatement
    */
    public function updateValue($table, $key, $newValue, $refKey, $refValue)
    {
        $sql = <<<EOT
            UPDATE $table SET $key='$newValue' WHERE $refKey='$refValue'
        EOT;

        $return = $this->execute($sql);
        return $sql . " | " . $return;
    }

    /**
    * Fetch a unique value
    * @param string $target key
    * @param string $selected table
    * @param string $reference key
    * @param string|int $reference value
    * @return string
    */
    public function fetchValue($target, $table, $refKey, $refValue)
    {
        $sql = <<<EOT
            SELECT $target FROM $table WHERE $refKey='$refValue'
        EOT;

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $response = $this->fetch($sql);

        $return = implode(array_column($response, $target)); //Remove the array and the key
        return $return;
    }

    public function fetchColumn($column, $table, $refKey = NULL, $refValue = NULL)
    {
        if(empty($refKey) && empty($refValue)){
            $sql = <<<EOT
                SELECT $column FROM $table
            EOT;
        } else {
            $sql = <<<EOT
                SELECT $column FROM $table WHERE $refKey='$refValue'
            EOT;
        }

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $return = $this->fetch($sql);

        return $return;
    }

    /**
    * Fetch a raw of data
    * @param string $selected table
    * @param string $reference key
    * @param string|int $reference value
    * @return PDOStatement
    */
    public function fetchObject($table, $refKey, $refValue){
        $sql = <<<EOT
            SELECT * FROM $table WHERE $refKey='$refValue'
        EOT;

        $this->setFetchMode(PDO::FETCH_ASSOC);
        $query = $this->fetch($sql);

        $values = $query;
        return $values;
    }

    /**
    * Delete a raw of data
    * @param string $selected table
    * @param string $reference key
    * @param string|int $reference value
    * @return requestSQL+PDOStatement
    */
    public function deleteRow($table, $refKey, $refValue){
        $sql = <<<EOT
            DELETE FROM $table WHERE $refKey='$refValue'
        EOT;

        $return = $this->execute($sql);
        return $sql . " | " . $return;
    }

    /**
    * Add column table
    * (Need to add the size value as a parameter)
    * @param string $selected table
    * @param string $name new column
    * @param string $type data
    * @param string $agency
    * @return requestSQL+PDOStatement
    */
    public function addColumn($table, $name, $type, $after){  
        $sql = <<<EOT
            ALTER TABLE $table ADD $name $type NOT NULL AFTER $after
        EOT;

        $return = $this->execute($sql);
        return $sql . " | " . $return;
    }

     /**
    * Delete column table
    * @param string $selected table
    * @param string $name new column
    * @param string $type data
    * @return requestSQL+PDOStatement
    */
    public function deleteColumn($table, $name, $type){  
        $sql = <<<EOT
            
        EOT; //+ new request to code

        $return = $this->execute($sql);
        return $sql . " | " . $return;
    }
}
