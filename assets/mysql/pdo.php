<?php
    include '../../config.php';

    try{
        $pdo = new PDO('mysql:host='.$config[0]['host'].';port='.$config[0]['port'].';dbname='.$config[0]['dbname'].'', $config[0]['user'], $config[0]['password']);
    }catch (PDOException $e){
        print 'Error!: ' . $e->getMessage() . '<br/>';
        die();
    };
?>