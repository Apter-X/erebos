<?php
Class Desktop extends Erebos 
{
    public function createFolder($path, $name)
    {
        $folder = array(
            "path"=>$path,
            "name"=>$name
        );

        $return = $this->insertRow('folders', ':path, :name', $folder);
        return $return;
    }

    public function createFile($path, $name, $meta)
    {
        $file = array(
            "path"=>$path,
            "name"=>$name,
            "meta"=>$meta
        );

        $return = $this->insertRow('files', ':path, :name, :meta', $file);
        return $return;
    }

    public function editContent($newValue, $refKey, $refValue)
    {
        $espValue = str_replace('&esp;', ' ', $newValue); //str_replace present an issue and don't replace our string

        $return = $this->updateValue("files", "content", $espValue, $refKey, $refValue);
        return $return;
    }
}