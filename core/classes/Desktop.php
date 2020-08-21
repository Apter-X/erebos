<?php
Class Desktop extends Erebos 
{
    public function createFolder($path, $name){
        $folder = array(
            "path"=>$path,
            "name"=>$name
        );

        $return = $this->insertData('folders', ':path, :name', $folder);
        return $return;
    }

    public function createFile($path, $name, $format, $link){
        $file = array(
            "path"=>$path,
            "name"=>$name,
            "format"=>$format,
            "link"=>$link
        );

        $return = $this->insertData('files', ':path, :name, :format, :link', $file);
        return $return;
    }
}