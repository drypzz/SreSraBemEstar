<?php
    define('HOST', 'localhost');
    define('DB', 'bemestar');
    define('USER', 'root');
    define('PASS', '');

    try{
        //conexao
        $pdo = new PDO('mysql:host='.HOST.';port=3307;dbname='.DB,
                       USER,
                       PASS,
                       array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8'));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);                
    } catch (Exception $e){
        echo 'Erro';
        die();
    }
?>