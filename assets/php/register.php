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
            $return = header('Location: '.$page.'?info='.$msg.'&type=success&reg='.$resp);
        }else if($type == 'error'){
            $return = header('Location: '.$page.'?info='.$msg.'&type=error&reg='.$resp);
        }else{
            $return = header('Location: '.$page.'?info='.$msg.'&type=error&reg='.$resp);
        };

        return $return;
    };

    $name = checkString($_POST['name']);
    $email = checkString($_POST['email']);
    $date = checkString($_POST['date']);
    $phone = checkString($_POST['phone']);
    $cpf = checkString($_POST['cpf']);
    $password = checkString($_POST['password']);
    $passwordC = checkString($_POST['passwordC']);
    $cpfr = checkString($_POST['cpfR']);

    $cpfLogin = checkString($_POST['cpfLogin']);
    $passwordLogin = checkString($_POST['passwordLogin']);

    $checked = (isset($_POST['resp']) ? true : false);

    if($_GET['type'] == 'register'){
        
        if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['date']) && isset($_POST['phone']) && isset($_POST['cpf']) && isset($_POST['password']) && isset($_POST['passwordC']) ){
            
            if( $checked == true ){
                
                if(isset($cpfr)){
                    
                    if(empty($date) && empty($phone) && empty($cpf)){
                        infoBox('../pages/register.php', 'Insira corretamente as informações: CPF, DATA DE NASCIMENTO, TELEFONE.', 'sim', 'error');
                    
                    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        infoBox('../pages/register.php', 'Insira um email valido.', 'sim', 'error');
                    
                    }else if($passwordC === $password){
                        $validCPF = $pdo->prepare('SELECT * FROM cadresponsavel WHERE CPF_Resp = ?');

                        $query = $pdo->prepare('SELECT * FROM cadidoso WHERE CPF_Idoso = ? AND Email_Idoso');
                        
                        if($query->execute(array($cpf))){

                            if($query->execute(array($email))){

                                if($validCPF->execute(array($cpfr))){

                                    if($validCPF->rowCount() > 0){

                                        if(!$query->rowCount() > 0){

                                            $currentDate = date('d-m-Y');
                                            $age = date_diff(date_create($date), date_create($currentDate));

                                            if($age->format('%y') > 18){
                                                $sql = $pdo->prepare("INSERT INTO cadidoso(`Nome_Idoso`, `Email_Idoso`, `Dat_Nasc_Idoso`, `Telefone_Idoso`, `CPF_Idoso`, `CPF_Resp`, `Senha_Idoso`) VALUES(?, ?, ?, ?, ?, ?, ?)");
                                                $sql->execute(array($name, $email, $date, $phone, $cpf, $cpfr, $password));
                                                infoBox('../pages/register.php', 'Cadastro de Paciente efetuado com sucesso.', 'sim', 'success');
                                                exit();
                                            
                                            }else{
                                                infoBox('../pages/register.php', 'Você é menor de idade', 'sim', 'error');
                                                exit();
                                            };

                                        };

                                    }else{
                                        infoBox('../pages/register.php', 'CPF do responsável não cadastrado.', 'sim', 'error');
                                        exit();
                                    };

                                }else{
                                    infoBox('../pages/register.php', 'CPF do responsável não encontrado.', 'sim', 'error');
                                    exit();
                                };

                            }else{
                                infoBox('../pages/register.php', 'Email ja cadastrado.', 'sim', 'error');
                                exit();
                            };

                        }else{
                            infoBox('../pages/register.php', 'CPF ja cadastrado.', 'sim', 'error');
                            exit();
                        };

                    }else{
                        infoBox('../pages/register.php', 'Senhas não coincidem', 'sim', 'error');
                        exit();
                    };

                }else{
                    infoBox('../pages/register.php', 'Insira o CPF do responsavel.', 'sim', 'error');
                    exit();
                };
            }else{
                if(empty($date) && empty($phone) && empty($cpf)){
                    infoBox('../pages/register.php', 'Insira corretamente as informações: CPF, DATA DE NASCIMENTO, TELEFONE.', 'sim', 'error');
                
                }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    infoBox('../pages/register.php', 'Insira um email valido.', 'sim', 'error');
               
                }else if($passwordC === $password){
                    
                    $query = $pdo->prepare('SELECT * FROM cadresponsavel WHERE CPF_Resp = ? AND Email_Resp');
                    
                    if($query->execute(array($cpf))){
                        
                        if($query->execute(array($email))){
                            
                            if(!$query->rowCount() > 0){

                                $currentDate = date('d-m-Y');
                                $age = date_diff(date_create($date), date_create($currentDate));

                                if($age->format('%y') > 18){
                                    $sql = $pdo->prepare("INSERT INTO cadresponsavel(`CPF_Resp`, `Nome_Resp`, `Email_Resp`, `Dat_Nasc_Resp`, `Telefone_Resp`, `Senha_Resp`) VALUES(?, ?, ?, ?, ?, ?)");
                                    $sql->execute(array($cpf, $name, $email, $date, $phone, $password));
                                    infoBox('../pages/register.php', 'Cadastro de Responsavel efetuado com sucesso.', 'sim', 'success');
                                    exit();
                                
                                }else{
                                    infoBox('../pages/register.php', 'Você é menor de idade.', 'sim', 'error');
                                    exit();
                                };
                            
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
                    infoBox('../pages/register.php', 'Senhas não coincidem.', 'sim', 'error');
                    exit();
                };

            };

        }else{
            infoBox('../pages/register.php', 'Insira todas as informações.', 'sim', 'error');
            exit();
        };

    }else if($_GET['type'] == 'login'){
        
        if( isset($_POST['cpfLogin']) && isset($_POST['passwordLogin']) ){
            
            if( empty($cpfLogin) && empty($passwordLogin) ){
                infoBox('../pages/register.php', 'Insira corretamente as informações: CPF, SENHA.', 'nao', 'error');       
            
            }else{
                $query = $pdo->prepare('SELECT * FROM cadresponsavel WHERE `CPF_Resp` = ? AND `Senha_Resp` = ?');
                $queryPaciente = $pdo->prepare('SELECT * FROM cadidoso WHERE CPF_Idoso = ?');

                if($queryPaciente->execute(array($cpf))){
                    $keys = $queryPaciente->fetchAll(PDO::FETCH_ASSOC);
                            
                    foreach($keys as $k){
                        $cpfKeys = $k['CPF_Idoso'];
                    };

                    if($query->execute(array($cpfLogin, $passwordLogin))){
                        $row = $query->fetchAll(PDO::FETCH_ASSOC);
                        
                        foreach($row as $k){
                            $cpfDate = $k['CPF_Resp'];
                            $nameDate = $k['Nome_Resp'];
                            $passwordResp = $k['Senha_Resp'];
                        };

                        if(!$queryPaciente->rowCount() > 0){
                            
                            if($cpfKeys != $cpfDate){

                                if($passwordLogin === $passwordResp){
                                    infoBox('../pages/register.php', 'Logado com sucesso.', 'nao', 'success');
                                
                                }else{
                                    infoBox('../pages/register.php', 'Verifique sua senha.', 'nao', 'error');
                                    exit();
                                };
                                
                            }else{
                                infoBox('../pages/register.php', 'Você deve fazer login utilizando o CPF do Responsável.', 'nao', 'error');
                                exit();
                            };

                        }else{
                            infoBox('../pages/register.php', 'CPF do responsável não cadastrado.', 'nao', 'error');
                            exit();
                        };

                    }else{
                        infoBox('../pages/register.php', 'CPF ou Senha estão incorretos.', 'nao', 'error');
                    };

                };
                
            };

        };

    };

?>