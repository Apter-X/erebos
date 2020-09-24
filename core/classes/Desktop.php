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

    public function createFile($folder_id, $name, $format)
    {
        $file = array(
            "folder_id"=>$folder_id,
            "name"=>$name,
            "format"=>$format
        );

        $return = $this->insertRow('files', ':folder_id, :name, :format', $file);
        return $return;
    }

    public function editContent($newValue, $refKey, $refValue)
    {
        $return = $this->updateValue("files", "content", $newValue, $refKey, $refValue);
        return $return;
    }
}
