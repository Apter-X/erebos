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
        $return = $this->updateValue("files", "content", $newValue, $refKey, $refValue);
        return $return;
    }
}