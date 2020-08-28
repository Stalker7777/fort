<?php

include ('console/Console.php');

// php console.php migration create_table

$console = new Console();

if(isset($argv[1]) && $argv[1] == 'migration') {
    if(isset($argv[2])) {
        $result = $console->migration($argv[2]);
        echo $result['message'] . PHP_EOL;
        return;
    }
}

echo 'Bad params' . PHP_EOL;