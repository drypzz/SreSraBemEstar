<!-- [
    author: drypzz (functions little thing);
    type: .php;
] -->

<?php
    // db
    include '../mysql/pdo.php';

    // start
    session_start();

    // function's
    function checkString($str){
        $str = trim($str);
        $str = stripslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    };

    function validateDateTime($dateStr, $format){
        date_default_timezone_set('UTC');
        $date = DateTime::createFromFormat($format, $dateStr);
        return $date && ($date->format($format) === $dateStr);
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

    // session
    $_SESSION['logged'] = $_SESSION['logged'] ?? NULL;

    if($_GET['type'] == 'register'){
        
        $name = checkString($_POST['name']);
        $email = checkString($_POST['email']);
        $date = checkString($_POST['date']);
        $phone = checkString($_POST['phone']);
        $cpf = checkString($_POST['cpf']);
        $password = checkString($_POST['password']);
        $passwordC = checkString($_POST['passwordC']);
        $cpfr = checkString($_POST['cpfR']);

        $checked = (isset($_POST['resp']) ? true : false);

        if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['date']) && isset($_POST['phone']) && isset($_POST['cpf']) && isset($_POST['password']) && isset($_POST['passwordC']) ){
            
            if( $checked == true ){
                
                if(isset($cpfr)){
                    
                    if(empty($date) && empty($phone) && empty($cpf)){
                        infoBox('../pages/register.php', 'Insira corretamente as informações: CPF, DATA DE NASCIMENTO, TELEFONE.', 'sim', 'error');
                    
                    }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        infoBox('../pages/register.php', 'Insira um email valido.', 'sim', 'error');
                    
                    }else if($passwordC === $password){
                        $validCPF = $pdo->prepare('SELECT * FROM cadresponsavel WHERE CPF_Resp = ?');

                        $queryCpf = $pdo->prepare('SELECT * FROM cadidoso WHERE CPF_Idoso = ?');
                        $queryEmail = $pdo->prepare('SELECT * FROM cadidoso WHERE Email_Idoso = ?');
                        $queryTel = $pdo->prepare('SELECT * FROM cadidoso WHERE Telefone_Idoso = ?');

                        if( ($queryCpf->execute(array($cpf))) && ($queryEmail->execute(array($email))) && ($queryTel->execute(array($phone))) ){

                            if($validCPF->execute(array($cpfr))){

                                if($validCPF->rowCount() > 0){

                                    if((!$queryCpf->rowCount() > 0) || (!$queryEmail->rowCount() > 0) || (!$queryTel->rowCount() > 0)){

                                        if(validateDateTime($date, 'd-m-Y')){

                                            $currentDate = date('d-m-Y');
                                            $age = date_diff(date_create($date), date_create($currentDate));

                                            if($age->format('%y') >= 18){
                                                $sql = $pdo->prepare("INSERT INTO cadidoso(`Nome_Idoso`, `Email_Idoso`, `Dat_Nasc_Idoso`, `Telefone_Idoso`, `CPF_Idoso`, `CPF_Resp`, `Senha_Idoso`) VALUES(?, ?, ?, ?, ?, ?, ?)");
                                                $sql->execute(array($name, $email, $date, $phone, $cpf, $cpfr, $password));
                                                infoBox('../pages/register.php', 'Cadastro de Paciente efetuado com sucesso.', 'sim', 'success');
                                                exit();
                                            
                                            }else{
                                                infoBox('../pages/register.php', 'Você é menor de idade', 'sim', 'error');
                                                exit();
                                            };
                                        
                                        }else{
                                            infoBox('../pages/register.php', 'Insira uma DATA DE NASCIMENTO valida.', 'sim', 'error');
                                            exit();
                                        };

                                    }else{
                                        infoBox('../pages/register.php', 'CPF, Email ou Telefone já cadastrado(s).', 'sim', 'error');
                                        exit();
                                    };

                                }else{
                                    infoBox('../pages/register.php', 'CPF do responsável não cadastrado.', 'sim', 'error');
                                    exit();
                                };

                            }else{
                                infoBox('../pages/register.php', 'Email ja cadastrado.', 'sim', 'error');
                                exit();
                            };

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
                    
                    $queryCpf = $pdo->prepare('SELECT * FROM cadresponsavel WHERE CPF_Resp = ?');
                    $queryEmail = $pdo->prepare('SELECT * FROM cadresponsavel WHERE Email_Resp = ?');
                    $queryTel = $pdo->prepare('SELECT * FROM cadresponsavel WHERE Telefone_Resp = ?');
                    
                    if( ($queryCpf->execute(array($cpf))) && ($queryEmail->execute(array($email))) && ($queryTel->execute(array($phone))) ){
                            
                        if( ($queryCpf->rowCount() > 0) || ($queryEmail->rowCount() > 0) || ($queryTel->rowCount() > 0) ){
                            infoBox('../pages/register.php', 'CPF, Email ou Telefone já cadastrado(s).', 'sim', 'error');
                            exit();
                        
                        }else{
                            if(validateDateTime($date, 'd-m-Y')){

                                $currentDate = date('d-m-Y');
                                $age = date_diff(date_create($date), date_create($currentDate));

                                if($age->format('%y') >= 18){
                                    $sql = $pdo->prepare("INSERT INTO cadresponsavel(`CPF_Resp`, `Nome_Resp`, `Email_Resp`, `Dat_Nasc_Resp`, `Telefone_Resp`, `Senha_Resp`) VALUES(?, ?, ?, ?, ?, ?)");
                                    $sql->execute(array($cpf, $name, $email, $date, $phone, $password));
                                    infoBox('../pages/register.php', 'Cadastro de Responsavel efetuado com sucesso.', 'sim', 'success');
                                    exit();
                                
                                }else{
                                    infoBox('../pages/register.php', 'Você é menor de idade.', 'sim', 'error');
                                    exit();
                                };

                            }else{
                                infoBox('../pages/register.php', 'Insira uma DATA DE NASCIMENTO valida.', 'sim', 'error');
                                exit();
                            };
                            
                        };

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

        $cpfLogin = checkString($_POST['cpfLogin']);
        $passwordLogin = checkString($_POST['passwordLogin']);

        if( isset($_POST['cpfLogin']) && isset($_POST['passwordLogin']) ){
            
            if( empty($cpfLogin) && empty($passwordLogin) ){
                infoBox('../pages/register.php', 'Insira corretamente as informações: CPF, SENHA.', 'nao', 'error');
            
            }else{
                $query = $pdo->prepare('SELECT * FROM cadresponsavel WHERE `CPF_Resp` = ? AND `Senha_Resp` = ?');

                if($query->execute(array($cpfLogin, $passwordLogin))){

                    $row = $query->fetchAll(PDO::FETCH_ASSOC);

                    foreach($row as $k){
                        $nameRes = $k['Nome_Resp'];
                        $cpfResp = $k['CPF_Resp'];
                        $passResp = $k['Senha_Resp'];
                    };

                    if(count($row) > 0){
                        $_SESSION['name'] = $nameRes;
                        $_SESSION['cpf'] = $cpfResp;
                        $_SESSION['password'] = $passResp;
                        $_SESSION['logged'] = true;
                        header('Location: ../pages/admin.php');
                    
                    }else{
                        unset($_SESSION['name']);
                        unset($_SESSION['logged']);
                        unset($_SESSION['cpf']);
                        unset($_SESSION['password']);
                        infoBox('../pages/register.php', 'CPF ou Senha incorretos.', 'nao', 'error');
                    };

                };

            };

        }else{
            infoBox('../pages/register.php', 'Insira todas as informações.', 'nao', 'error');
            exit();
        };

    }else if($_GET['type'] == 'remedio'){

        if( isset($_POST['desc-remedio']) && isset($_POST['name-remedio'])){

            if(empty($_POST['desc-remedio']) && empty($_POST['name-remedio'])){
                infoBox('../pages/remedio.php', 'Insira corretamente as informações: NOME DO REMÉDIO E DESCRIÇÃO.', 'remedio', 'error');
            
            }else{
                $query = $pdo->prepare('SELECT * FROM remedio WHERE Nome_Remed = ?');
                
                $queryRemedio = $pdo->prepare('SELECT * FROM remedio');

                if($queryRemedio->execute()){
                    $row = $queryRemedio->fetchAll(PDO::FETCH_ASSOC);
                    foreach($row as $key => $i){
                        $idRemedio = ($i['Cod_Remedio'] ?? 0);
                    };
                };

                if($query->execute(array($_POST['name-remedio']))){

                    if(!$query->rowCount() > 0){

                        $sql = $pdo->prepare("INSERT INTO remedio(`Cod_Remedio`, `Nome_Remed`, `Descricao_Remed`, `CPF_Resp`) VALUES(?, ?, ?, ?)");
                        $sql->execute(array( (isset($idRemedio) ? $idRemedio + 1 : 1), $_POST['name-remedio'], $_POST['desc-remedio'], $_SESSION['cpf']));
                        header('Location: ../pages/admin.php#list');
                        exit();

                    }else{
                        infoBox('../pages/remedio.php', 'Remedio ja cadastrado.', 'remedio', 'error');
                        exit();
                    };

                }else{
                    infoBox('../pages/remedio.php', 'Erro ao cadastrar.', 'remedio', 'error');
                    exit();
                };

            };

        };

    }else if($_GET['type'] == 'agenda'){

        if( isset($_POST['Data-Tarefa']) && isset($_POST['Hora-Tarefa']) && isset($_POST['select-agend']) ){

            if(empty($_POST['Data-Tarefa']) && empty($_POST['Hora-Tarefa']) && empty($_POST['select-agend'])){
                infoBox('../pages/agenda.php', 'Insira corretamente as informações: Data e Hora e CPF.', 'agenda', 'error');
            
            }else{
                $query = $pdo->prepare('SELECT * FROM agenda');

                if($_POST['select-agend'] != NULL){
                    
                    if($query->execute()){

                        $row = $query->fetchAll(PDO::FETCH_ASSOC);
                        foreach($row as $key => $i){
                            $codAgend = ($i['Cod_Agen'] ?? 0);
                        };

                        $sql = $pdo->prepare("INSERT INTO agenda(`Cod_Agen`, `CPF_Idoso`, `Data_Tarefa`, `Hora_Tarefa`, `CPF_Resp`) VALUES(?, ?, ?, ?, ?)");
                        $sql->execute(array(($codAgend + 1), $_POST['select-agend'], $_POST['Data-Tarefa'], $_POST['Hora-Tarefa'], $_SESSION['cpf']));
                        header('Location: ../pages/admin.php#list');
                        exit();

                    };

                }else{
                    infoBox('../pages/agenda.php', 'Selecione um Idoso(a)', 'agenda', 'error');
                    exit();
                };

            };

        };



    }else if($_GET['type'] == 'tarefa'){

        if( isset($_POST['Desc_Tarefa']) && isset($_POST['select-agend']) && isset($_POST['select-remed']) ){

            if(empty($_POST['Desc_Tarefa']) && empty($_POST['select-agend']) && empty($_POST['select-remed'])){
                infoBox('../pages/agenda.php', 'Insira corretamente as informções', 'tarefa', 'error');

            }else{
                $query = $pdo->prepare('SELECT * FROM tarefa');

                if($_POST['select-agend'] != NULL){

                    if($_POST['select-remed'] != NULL){

                        if($query->execute()){

                            $row = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($row as $key => $i){
                                $codTare = ($i['Cod_Tarefa'] ?? 0);
                            };

                            $sql = $pdo->prepare("INSERT INTO tarefa(`Cod_Tarefa`, `Desc_Tarefa`, `Cod_Remedio`, `Cod_Agen`, `CPF_Resp`) VALUES(?, ?, ?, ?, ?)");
                            $sql->execute(array(($codTare + 1), $_POST['Desc_Tarefa'], $_POST['select-remed'], $_POST['select-agend'], $_SESSION['cpf']));
                            header('Location: ../pages/admin.php#list');
                            exit();
                        };

                    }else{
                        infoBox('../pages/agenda.php', 'Selecione um remédio', 'tarefa', 'error');
                        exit();
                    };

                }else{
                    infoBox('../pages/agenda.php', 'Selecione uma agenda', 'tarefa', 'error');
                    exit();
                };

            };

        };

    }else if($_GET['type'] == 'idoso'){

        $name = checkString($_POST['name']);
        $email = checkString($_POST['email']);
        $date = checkString($_POST['date']);
        $phone = checkString($_POST['phone']);
        $cpf = checkString($_POST['cpf']);
        $passwordC = checkString($_POST['passwordC']);

        if( isset($_POST['name']) && isset($_POST['email']) && isset($_POST['date']) && isset($_POST['phone']) && isset($_POST['cpf']) && isset($_POST['passwordC']) ){

            if(empty($date) && empty($phone) && empty($cpf)){
                infoBox('../pages/register.php', 'Insira corretamente as informações: CPF, DATA DE NASCIMENTO, TELEFONE.', 'sim', 'error');

            }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                infoBox('../pages/register.php', 'Insira um email valido.', 'sim', 'error');

            }else if($passwordC === $_SESSION['password']){
                $query = $pdo->prepare('SELECT * FROM cadidoso WHERE CPF_Idoso = ?');

                if($query->execute(array($cpf))){

                    if(!$query->rowCount() > 0){
                        
                        if(validateDateTime($date, 'd-m-Y')){

                            $currentDate = date('d-m-Y');
                            $age = date_diff(date_create($date), date_create($currentDate));

                            if($age->format('%y') >= 18){
                                $sql = $pdo->prepare("INSERT INTO cadidoso(`Nome_Idoso`, `Email_Idoso`, `Dat_Nasc_Idoso`, `Telefone_Idoso`, `CPF_Idoso`, `CPF_Resp`, `Senha_Idoso`) VALUES(?, ?, ?, ?, ?, ?, NULL)");
                                $sql->execute(array($name, $email, $date, $phone, $cpf, $_SESSION['cpf']));
                                header('Location: ../pages/admin.php#list');
                                exit();

                            }else{
                                infoBox('../pages/register.php', 'Idoso(a) menor de idade', 'sim', 'error');
                                exit();
                            };

                        }else{
                            infoBox('../pages/register.php', 'Insira uma DATA DE NASCIMENTO valida.', 'sim', 'error');
                        };

                    }else{
                        infoBox('../pages/register.php', 'CPF ja cadastrado.', 'sim', 'error');
                        exit();
                    };

                };

            }else{
                infoBox('../pages/register.php', 'Senhas não corresponde com a do Responsável.', 'sim', 'error');
                exit();
            };

        };
        
    }else if($_GET['type'] == 'delete'){

        if($_GET['on'] == 'idoso'){

            if(isset($_GET['value'])){

                $value = $_GET['value'];

                $sql = $pdo->prepare("DELETE FROM cadidoso WHERE `CPF_Idoso` = ?");
                if ($sql->execute(array($value))){
                    header('Location: ../pages/admin.php#list');
                };

            };

        }else if($_GET['on'] == 'agenda'){
            if(isset($_GET['value'])){

                $value = $_GET['value'];

                $sql = $pdo->prepare("DELETE FROM agenda WHERE `Cod_Agen` = ?");
                if ($sql->execute(array($value))){
                    header('Location: ../pages/admin.php#list');
                };

            };

        }else if($_GET['on'] == 'remedio'){
            if(isset($_GET['value'])){

                $value = $_GET['value'];

                $sql = $pdo->prepare("DELETE FROM remedio WHERE `Cod_Remedio` = ?");
                if ($sql->execute(array($value))){
                    header('Location: ../pages/admin.php#list');
                };

            };

        }else if($_GET['on'] == 'tarefa'){
            if(isset($_GET['value'])){

                $value = $_GET['value'];

                $sql = $pdo->prepare("DELETE FROM tarefa WHERE `Cod_Tarefa` = ?");
                if ($sql->execute(array($value))){
                    header('Location: ../pages/admin.php#list');
                };

            };

        };

    };
?>