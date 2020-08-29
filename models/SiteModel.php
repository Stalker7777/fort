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
     * @return array
     */
    public function insert(): array
    {
        $time = time();
        
        $sql = "INSERT INTO objects (name, note, created_at) VALUES ('$this->name', '$this->note', $time);";
        
        return $this->execSQL($sql);
    }
    
    /**
     * @return array
     */
    public function select(): array
    {
        $fields = ['id', 'name', 'note'];

        $sql = "SELECT * FROM objects";
        
        return $this->selectSQL($fields, $sql);
    }
    
    
}