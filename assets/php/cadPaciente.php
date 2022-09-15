<?php
    $name = $email = $date = $phone = $cpf = $password = $passwordC = "";

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cadastro'])){
        if (!empty($_POST['name'])){
            $name = test_input($_POST["name"]);
        }
        if (!empty($_POST['email'])){
            $email = test_input($_POST["email"]);
        }
        if (!empty($_POST['date'])){
            $date = test_input($_POST["date"]);
        }
        if (!empty($_POST['phone'])){
            $phone = test_input($_POST["phone"]);
        }
        if (!empty($_POST['cpf'])){
            $cpf = test_input($_POST["cpf"]);
        }
        if (!empty($_POST['password'])){
            $password = test_input($_POST["password"]);
        }
        if (!empty($_POST['passwordC'])){
            $passwordC = test_input($_POST["passwordC"]);
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