<?php
    $nameR = $emailR = $dateR = $phoneR = $cpfR = $passwordR = $passwordCR = "";


    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cadastro'])){
        if (!empty($_POST['nameR'])){
            $nameR = test_input($_POST["nameR"]);
        }
        if (!empty($_POST['emailR'])){
            $emailR = test_input($_POST["emailR"]);
        }
        if (!empty($_POST['dateR'])){
            $dateR = test_input($_POST["dateR"]);
        }
        if (!empty($_POST['phoneR'])){
            $phoneR = test_input($_POST["phoneR"]);
        }
        if (!empty($_POST['cpfR'])){
            $cpfR = test_input($_POST["cpfR"]);
        }
        if (!empty($_POST['passwordR'])){
            $passwordR = test_input($_POST["passwordR"]);
        }
        if (!empty($_POST['passwordCR'])){
            $passwordCR = test_input($_POST["passwordCR"]);
        }
        
        

        //Inserir no banco de dados
          $sql = $pdo->prepare('SELECT * FROM usuario WHERE email = ?');
          if($sql->execute(array($email))){
            if($sql->rowCount() > 0){
                echo 'Email ja cadastrado';
            }else {
                $sql = $pdo->prepare("INSERT INTO USUARIO (codigo, nome, email, senha, telefone, administrador)
                                    VALUES (null, ?, ?, ?, ?, ?)");
                if ($sql->execute(array($nome, $email, $senha, $telefone, $administrador))){
                $msgErr = "Dados cadastrados com sucesso!";
                header("location: login.php");  
                } else {
                $msgErr = "Dados não cadastrados!";
                };
            };
          };                    

    }
?>