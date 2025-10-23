<!-- [
    author: drypzz;
    type: config;
] -->

<?php
    $config = array(
        $database = array(
            'host' => getenv('DB_HOST') ?: 'localhost',
            'port' => getenv('DB_PORT') ?: '3306',
            'dbname' => getenv('DB_NAME') ?: 'sbe',
            'user' => getenv('DB_USER') ?: 'root',
            'password' => getenv('DB_PASS') ?: null,
        ),
    );
?>