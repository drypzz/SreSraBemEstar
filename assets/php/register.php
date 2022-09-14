<?php
    include '../mysql/pdo.php';

    function checkString($str){
        $str = trim($str);
        $str = stripslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    };

    function infoBox($page, $msg, $resp, $type){
        if($type == 'success'){
            $return = header('Location: '.$page.'?info='.$msg.'&type=success&resp='.$resp);
        }else if($type == 'error'){
            $return = header('Location: '.$page.'?info='.$msg.'&type=error&resp='.$resp);
        }else{
            $return = header('Location: '.$page.'?info='.$msg.'&type=error&resp='.$resp);
        };

        return $return;
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
                infoBox('../pages/register.php', 'Insira corretamente as informações: CPF, DATA DE NASCIMENTO, TELEFONE.', 'nao', 'error');
            }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                infoBox('../pages/register.php', 'Insira um email valido.', 'nao', 'error');
            }else if($passwordC === $password){
                $query = $pdo->prepare('SELECT * FROM cadidoso WHERE CPF_Idoso = ? AND Email_Idoso');
                if($query->execute(array($cpf))){
                    if($query->execute(array($email))){
                        if(!$query->rowCount() > 0){
                            $sql = $pdo->prepare("INSERT INTO cadidoso(`Nome_Idoso`, `Email_Idoso`, `Dat_Nasc_Idoso`, `Telefone_Idoso`, `CPF_Idoso`, `CPF_Resp`, `Senha_Idoso`) VALUES(?, ?, ?, ?, ?, NULL, ?)");
                            $sql->execute(array($name, $email, $date, $phone, $cpf, md5($password)));
                            infoBox('../pages/register.php', 'Cadastro efetuado com sucesso.', 'nao', 'success');
                            exit();
                        };
                    }else{
                        infoBox('../pages/register.php', 'Email ja cadastrado.', 'nao', 'error');
                        exit();
                    };
                }else{
                    infoBox('../pages/register.php', 'CPF ja cadastrado.', 'nao', 'error');
                    exit();
                };
            }else{
                infoBox('../pages/register.php', 'Senhas não coincidem', 'nao', 'error');
                exit();
            };
        }else{
            infoBox('../pages/register.php', 'Insira todas as informações', 'nao', 'error');
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
                infoBox('../pages/register.php', 'Insira corretamente as informações: CPF, DATA DE NASCIMENTO, TELEFONE.', 'sim', 'error');
            }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                infoBox('../pages/register.php', 'Insira um email valido.', 'sim', 'error');
            }else if($passwordC === $password){
                $query = $pdo->prepare('SELECT * FROM cadresponsavel WHERE CPF_Resp = ? AND Email_Resp');
                if($query->execute(array($cpf))){
                    if($query->execute(array($email))){
                        if(!$query->rowCount() > 0){
                            $sql = $pdo->prepare("INSERT INTO cadresponsavel(`CPF_Resp`, `Nome_Resp`, `Email_Resp`, `Dat_Nasc_Resp`, `Telefone_Resp`, `Senha_Resp`) VALUES(?, ?, ?, ?, ?, ?)");
                            $sql->execute(array($cpf, $name, $email, $date, $phone, md5($password)));
                            infoBox('../pages/register.php', 'Cadastro efetuado com sucesso.', 'sim', 'success');
                            exit();
                        }else{
                            infoBox('../pages/register.php', 'Erro interno.', 'sim', 'error');
                            exit();
                        };
                    }else{
                        infoBox('../pages/register.php', 'Email já cadastrado.', 'sim', 'error');
                        exit();
                    };
                }else{
                    infoBox('../pages/register.php', 'CPF já cadastrado.', 'sim', 'error');
                    exit();
                };
            }else{
                infoBox('../pages/register.php', 'Senhas não coincidem', 'sim', 'error');
                exit();
            };
        }else{
            infoBox('../pages/register.php', 'Insira todas as informações', 'sim', 'error');
            exit();
        };
    };

?>