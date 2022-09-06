<?php
    include '../../config.php';

    try{
        $pdo = new PDO('mysql:host='.$database['host'].';port='.$database['port'].';dbname='.$database['dbname'].'', $database['user'], $database['password']);
    }catch (PDOException $e){
        print 'Error!: ' . $e->getMessage() . '<br/>';
        die();
    };
?>