<h3>MySQL</h3>

1. создать базу данных
2. настроить соединение в файле models/Model.php

    <div>
        private $host = '127.0.0.1';
    </div>
    <div>
        private $username = 'root';
    </div>
    <div>
        private $password = 'root';
    </div>
    <div>
        private $dbname = 'fort';
    </div>

<h3>Console</h3>

для создания таблицы использовать консольную команду

1. открыть консоль
2. перейти в директорию приложения
3. запустить команду

<h5>php console.php migration имя_файла<h5>

<div>
    <b>php</b> - возможно нужно указать полный путь к файлу php.exe
</div>
<div>
    <b>имя_файла</b> - имя файла из папки migrations
<div>