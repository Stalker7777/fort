<?php

include ($dir_root . '/models/model.php');

class SiteModel extends Model
{
    public function select()
    {
        $fields = ['id', 'name', 'note'];

        $sql = "SELECT * FROM objects";
        
        return $this->selectSQL($fields, $sql);
    }
}