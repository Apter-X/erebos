<?php
Class Desktop extends Erebos 
{
    public function list($path)
    {
        $parent_id = $this->fetchValue('folder_id', 'folders', 'path', $path);
        $folder_names = json_encode(array_column($this->fetchColumn('name', 'folders', 'parent_id', $parent_id), 'name'));
        $file_names = json_encode(array_column($this->fetchColumn('name', 'files', 'parent_id', $parent_id), 'name'));
        
        $str_content = $folder_names . "<br>" . $file_names;

        return $str_content;
    }
    
    public function changePath($path, $target)
    {
        if ($target == ".."){
            $name = $this->fetchValue('name', 'folders', 'path', $path);

            $string_replace = str_replace("$name/", "", $path);
            return $string_replace;
        }

        $target_path = "$path$target/";
        $paths = $this->fetchColumn("path", "folders");
        $search = array_search($target_path, array_column($paths, 'path'));

        if(is_int($search))
        {
            return $target_path;
        } else {
            return "/";
        }
        
    }

    public function createFolder($path, $name)
    {
        $target_path = "$path$name/";

        $paths = $this->fetchColumn("path", "folders");
        $search = array_search($target_path , array_column($paths, 'path'));

        if(!is_int($search))
        {
            $parent_id = $this->fetchValue('folder_id', 'folders', 'path', $path);

            $folder = array(
                "parent_id"=>$parent_id,
                "path"=>$path . "$name/",
                "name"=>$name
            );
    
            $return = $this->insertRow('folders', ':parent_id, :path, :name', $folder);
            return $return;
        } else {
            return "Folder's already exist at position \"$search\" of the folders table !";
        }
    }

    public function createFile($path, $name, $format)
    {
        $parent_id = $this->fetchValue('folder_id', 'folders', 'path', $path);

        $names = $this->fetchColumn('name', 'files', 'parent_id', $parent_id);
        $search = array_search($name, array_column($names, 'name'));

        if(!is_int($search))
        {
            $file = array(
                "parent_id"=>$parent_id,
                "path"=>$path,
                "name"=>$name,
                "format"=>$format
            );
    
            $return = $this->insertRow('files', ':parent_id, :path, :name, :format', $file);
            return $return;
        } else {
            return "File's already exist at position \"$search\" of the files table !";
        }
    }

    public function editContent($newValue, $refKey, $refValue)
    {
        $return = $this->updateValue("files", "content", $newValue, $refKey, $refValue);
        return $return;
    }
}
