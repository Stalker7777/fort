<?php

include ($dir_root . '/models/model.php');

/**
 * Class SiteModel
 */
class SiteModel extends Model
{
    public $name;
    public $note;
    
    /**
     * get data from form
     *
     * @param array|null $post
     */
    public function load(array $post = null)
    {
        if(isset($post['name'])) {
            $this->name = $post['name'];
        }
        
        if(isset($post['note'])) {
            $this->note = $post['note'];
        }
    }
    
    /**
     * ckecked data from form
     *
     * @return array
     */
    public function valid(): array
    {
        $error_text = '';
        
        if(empty($this->name)) {
            $error_text .= 'Заполните поле Наименование' . '<br>';
        }
        
        if(empty($this->note)) {
            $error_text .= 'Заполните поле Описание' . '<br>';
        }
        
        if(empty($error_text)) {
            return ['error' => false];
        }
        
        return ['error' => true, 'message' => $error_text];
    }
    
    /**
     * add object to DB
     *
     * @return array
     */
    public function insert(): array
    {
        $time = time();
        
        $sql = "INSERT INTO objects (name, note, created_at) VALUES ('$this->name', '$this->note', $time);";
        
        return $this->execSQL($sql);
    }
    
    /**
     * select list object from DB
     *
     * @param array|null $find
     * @return array
     */
    public function select(array $find = null): array
    {
        $fields = ['id', 'name', 'note'];
    
        if($find == null) {
            $sql = "SELECT * FROM objects";
        }
        else {
        
            $finds = [];
        
            foreach ($find as $key => $value) {
                $finds[] = " " . $key . " like '%" . $value . "%' ";
            }
        
            $sql = "SELECT * FROM objects WHERE " . implode(' AND ', $finds);
        }
        
        return $this->selectSQL($fields, $sql);
    }
    
    /**
     * delete object in DB
     *
     * @param int $id
     * @return array
     */
    public function delete(int $id): array
    {
        if($id == null) return [];
        
        $sql = "DELETE FROM objects WHERE id = $id;";
        
        return $this->execSQL($sql);
    }
    
}