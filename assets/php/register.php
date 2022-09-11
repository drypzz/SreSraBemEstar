<?php
    include '../mysql/pdo.php';

    function checkString($str){
        $str = trim($str);
        $str = stripslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    };

    function infoError($page, $error){
        return header('Location: '.$page.'?error='.$error);
    };

    if( ($_GET['type'] === 'paciente') ){
        if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['date']) && isset($_POST['phone']) && isset($_POST['cpf']) && isset($_POST['password']) && isset($_POST['passwordC']) ){
            $name = checkString($_POST['name']);
            $email = checkString($_POST['email']);
            $date = checkString($_POST['date']);
            $phone = checkString($_POST['phone']);
            $cpf = checkString($_POST['cpf']);
            $password = checkString($_POST['password']);
            $passwordC = checkString($_POST['passwordC']);
            
            if(empty($date) && empty($phone) && empty($cpf)){
                infoError('../pages/register.php', 'Insira corretamente as informações: CPF, DATA DE NASCIMENTO, TELEFONE.');
            }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                infoError('../pages/register.php', 'Insira um email valido.');
            }else if($passwordC === $password){
                $query = $pdo->prepare('SELECT * FROM paciente WHERE email = ?');
                if($query->execute(array($email))){
                    if(!$query->rowCount() > 0){
                        $sql = $pdo->prepare("INSERT INTO paciente(`id`, `nome`, `email`, `data`, `telefone`, `cpf`, `senha`) VALUES(NULL, ?, ?, ?, ?, ?, ?)");
                        $sql->execute(array($name, $email, $date, $phone, $cpf, md5($password)));
                        header('Location: ../../index.html');
                        exit();
                    }else{
                        infoError('../pages/register.php', 'Email ja cadastrado.');
                        exit();
                    };
                };
            }else{
                infoError('../pages/register.php', 'Senhas não coincidem');
                exit();
            };
        }else{
            infoError('../pages/register.php', 'Insira todas as informações');
            exit();
        };
    }else{
        if( isset($_POST['nameR']) && isset($_POST['emailR']) && isset($_POST['dateR']) && isset($_POST['phoneR']) && isset($_POST['cpfR']) && isset($_POST['passwordR']) && isset($_POST['passwordCR']) ){
            $name = checkString($_POST['nameR']);
            $email = checkString($_POST['emailR']);
            $date = checkString($_POST['dateR']);
            $phone = checkString($_POST['phoneR']);
            $cpf = checkString($_POST['cpfR']);
            $password = checkString($_POST['passwordR']);
            $passwordC = checkString($_POST['passwordCR']);

            if(empty($date) && empty($phone) && empty($cpf)){
                infoError('../pages/register.php', 'Insira corretamente as informações: CPF, DATA DE NASCIMENTO, TELEFONE.');
            }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                infoError('../pages/register.php', 'Insira um email valido.');
            }else if($passwordC === $password){
                $query = $pdo->prepare('SELECT * FROM responsavel WHERE email = ?');
                if($query->execute(array($email))){
                    if(!$query->rowCount() > 0){
                        $sql = $pdo->prepare("INSERT INTO responsavel(`id`, `nome`, `email`, `data`, `telefone`, `cpf`, `senha`) VALUES(NULL, ?, ?, ?, ?, ?, ?)");
                        $sql->execute(array($name, $email, $date, $phone, $cpf, md5($password)));
                        header('Location: ../../index.html');
                        exit();
                    }else{
                        infoError('../pages/register.php', 'Email ja cadastrado.');
                        exit();
                    };
                };
            }else{
                infoError('../pages/register.php', 'Senhas não coincidem');
                exit();
            };
        }else{
            infoError('../pages/register.php', 'Insira todas as informações');
            exit();
        };
    };

?>