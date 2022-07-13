<?php
    include "../include/MySql.php";

   $emailr = $nomer = $foner = $senhar = $datar = "";
   $emailrErr = $nomerErr = $fonerErr = $senharErr = $datarErr = "";
   

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cadastro'])){

        if (empty($_POST['emailr'])){
            $emailrErr = "Email do responsável é obrigatório!";
        } else {
            $emailr = test_input($_POST["emailr"]);
        }

        if (empty($_POST['nomer'])){
            $nomerErr = "Nome do idoso é obrigatório!";
        } else {
            $nomer = test_input($_POST["nomer"]);
        }


        if (empty($_POST['foner'])){
            $fonerErr = "Número do responsável é obrigatório!";
        } else {
            $foner = test_input($_POST["foner"]);
        }

        if (empty($_POST['senhar'])){
            $senharErr = "Senha é obrigatório!";
        } else {
            $senhar = test_input($_POST["senhar"]);
        }

        if (empty($_POST['ididosor'])){
            $datarErr = "A idade é obrigatório!";
        } else {
            $datar = test_input($_POST["datar"]);
        }

        //Inserir no banco de dados
          $sql = $pdo->prepare('SELECT * FROM cadpaciente WHERE emailp = ?');
          if($sql->execute(array($email))){
            if($sql->rowCount() > 0){
                echo 'Email ja cadastrado';
            }else {
                $sql = $pdo->prepare("INSERT INTO cadpaciente (codigo, nomer, emailr, senhar, foner, datanascr)
                                    VALUES (null, ?, ?, ?, ?, ?)");
                if ($sql->execute(array($emailr, $nomer, $foner, $senhar, $datar))){
                $msgErr = "Dados cadastrados com sucesso!";
                header("location: login.php");  
                } else {
                $msgErr = "Dados não cadastrados!";
                };
            };
          };                    

    }
?>