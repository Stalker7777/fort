<?php

include ('models/Model.php');

/**
 * Class CreateTable
 */
class CreateTable extends Model
{
    /**
     * @return array
     */
    public function run(): array
    {
        $sql = "
            CREATE TABLE IF NOT EXISTS objects (
              id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              name VARCHAR(500) NOT NULL,
              note TEXT NOT NULL,
              created_at INT NOT NULL,
              updated_at INT NULL
            ) CHARACTER SET utf8 COLLATE utf8_general_ci
        ";
        
        return $this->execSQL($sql);
    }
}