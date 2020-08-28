<?php

/**
 * Class Model
 */
class Model
{
    private $host = '127.0.0.1';
    private $username = 'root';
    private $password = 'root';
    private $dbname = 'fort';
    
    /**
     * @param string $sql
     * @return array
     */
    public function execSQL(string $sql): array
    {
        $mysqli = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        
        if ($mysqli->connect_errno) {
            return ['error' => true, 'message' => 'Не удалась создать соединение с базой данных!'];
        }
        
        if (!$result = $mysqli->query($sql)) {
            return ['error' => true, 'message' => 'Ошибка при выполнении запроса!' /*. $mysqli->error*/];
        }
        
        $mysqli->close();
        
        return ['error' => false, 'message' => 'Запрос выполнен!'];
    }
    
    /**
     * @param array $fields
     * @param string $sql
     * @return array
     */
    public function selectSQL(array $fields, string $sql): array
    {
        $mysqli = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        
        if ($mysqli->connect_errno) {
            return ['error' => true, 'message' => 'Не удалась создать соединение с базой данных!'];
        }
        
        if (!$result = $mysqli->query($sql)) {
            return ['error' => true, 'message' => 'Ошибка при выполнении запроса!' /*. $mysqli->error*/];
        }
        
        if ($result->num_rows === 0) {
            return ['error' => false, 'message' => 'Данных нет!', 'data' => []];
        }
        
        $data = [];
        
        while ($item = $result->fetch_assoc()) {
            $result_temp = [];
            foreach ($fields as $field) {
                $result_temp[$field] = $item[$field];
            }
            $data[] = $result_temp;
        }
        
        $result->free();
        $mysqli->close();
        
        return ['error' => false, 'message' => 'Запрос выполнен!', 'data' => $data];
    }
}