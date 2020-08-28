<?php

include ('migrations/create_table.php');

/**
 * Class Console
 */
class Console
{
    /**
     * @param string $param
     * @return array
     */
    public function migration(string $param): array
    {
        switch ($param) {
            case 'create_table':
                $migration = new CreateTable();
                return $migration->run();
                break;
        }
        
        return ['error' => true, 'message' => 'Not file for migration'];
    }
}