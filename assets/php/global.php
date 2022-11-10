<?php
    include '../mysql/pdo.php';

    session_start();

    $_SESSION['logged'] = $_SESSION['logged'] ?? NULL;

    function checkString($str){
        $str = trim($str);
        $str = stripslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    };

    // OBGD PELO CARINHO S2
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
                    };

                    if(count($row) > 0){
                        $_SESSION['name'] = $nameRes;
                        $_SESSION['cpf'] = $cpfResp;
                        $_SESSION['logged'] = true;
                        header('Location: ../pages/admin.php');
                    
                    }else{
                        unset($_SESSION['name']);
                        unset($_SESSION['logged']);
                        unset($_SESSION['cpf']);
                        infoBox('../pages/register.php', 'CPF ou Senha incorretos.', 'nao', 'error');
                    };

                };

            };

        }else{
            infoBox('../pages/register.php', 'Insira todas as informações.', 'nao', 'error');
            exit();
        };

        // REMEDIO
    }else if($_GET['type'] == 'remedio'){

        if( isset($_POST['desc-remedio']) && isset($_POST['name-remedio'])){

            if(empty($_POST['desc-remedio']) && empty($_POST['name-remedio'])){
                infoBox('../pages/agenda.php', 'Insira corretamente as informações: NOME DO REMÉDIO E DESCRIÇÃO.', 'remedio', 'error');
            
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
                        $sql->execute(array( (isset($idRemedio) ? $idRemedio + 1 ? 1), $_POST['name-remedio'], $_POST['desc-remedio'], $_SESSION['cpf']));
                        infoBox('../pages/agenda.php', 'Remedio cadastrado com sucesso.', 'remedio', 'success');
                        exit();

                    }else{
                        infoBox('../pages/agenda.php', 'Remedio ja cadastrado.', 'remedio', 'error');
                        exit();
                    };

                }else{
                    infoBox('../pages/agenda.php', 'Erro ao cadastrar.', 'remedio', 'error');
                    exit();
                };
            };
        };
        // AGENDA
    }else if($_GET['type'] == 'agenda'){

        if( isset($_POST['Data-Tarefa']) && isset($_POST['Hora-Tarefa']) && isset($_POST['select-agend']) ){

            if(empty($_POST['Data-Tarefa']) && empty($_POST['Hora-Tarefa']) && empty($_POST['select-agend'])){
                infoBox('../pages/agenda.php', 'Insira corretamente as informações: Data e Hora e CPF.', 'agenda', 'error');
            
            }else{
                $query = $pdo->prepare('SELECT * FROM agenda');

                if($query->execute()){

                    $row = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($row as $key => $i){
                        $codAgend = ($i['Cod_Agen'] ?? 0);
                    };

                    $sql = $pdo->prepare("INSERT INTO agenda(`Cod_Agen`, `CPF_Idoso`, `Data_Tarefa`, `Hora_Tarefa`) VALUES(?, ?, ?, ?)");
                    $sql->execute(array(($codAgend + 1), $_POST['select-agend'], $_POST['Data-Tarefa'], $_POST['Hora-Tarefa']));
                    infoBox('../pages/agenda.php', 'Agenda cadastrada com sucesso', 'agenda', 'success');
                    exit();

                };

            };

        };

        //NIVEL E COMORBIDADE
    } else if($_GET['type'] == 'nivel'){

        if( isset($_POST['Descricao_Nivel']) ){

            if(empty($_POST['Descricao_Nivel']) ){
                infoBox('../pages/nivel.php', 'Insira corretamente as informções: DESCRIÇÃO E O NÍVEL', 'nivel', 'error');

            }else{
                $query = $pdo->prepare('SELECT * FROM nivel');

                if($query->execute()){

                    $row = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($row as $key => $i){
                        $codNivel = ($i['Cod_Nivel'] ?? 0);
                    };


                    $sql = $pdo->prepare("INSERT INTO nivel(`Cod_Nivel`, `Descricao_Nivel`) VALUES(?, ?)");
                    $sql->execute(array(($codNivel + 1), $_POST['Descricao_Nivel']));
                    infoBox('../pages/nivel.php', 'Nível cadastrado com sucesso', 'nivel', 'success');
                    exit();

                };
            };

        };

    }else if($_GET['type'] == 'comorbidade'){

        if( isset($_POST['comorbidade']) ){

            if(empty($_POST['comorbidade']) ){
                infoBox('../pages/nivel.php', 'Insira corretamente as informções: COMORBIDADE', 'comorbidade', 'error');

            }else{
                $query = $pdo->prepare('SELECT * FROM comorbidade');

                if($query->execute()){

                    $row = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($row as $key => $i){
                        $codComo = ($i['Cod_Como'] ?? 0);
                    };


                    $sql = $pdo->prepare("INSERT INTO comorbidade(`Cod_Como`, `Comorbidade`) VALUES(?, ?)");
                    $sql->execute(array(($codComo + 1), $_POST['comorbidade']));
                    infoBox('../pages/nivel.php', 'Comorbidade cadastrada com sucesso', 'comorbidade', 'success');
                    exit();

                };
            };

        };
        // tarefa
    }else if($_GET['type'] == 'tarefa'){

        if( isset($_POST['Desc_Tarefa']) ){

            if(empty($_POST['Desc_Tarefa']) ){
                infoBox('../pages/agenda.php', 'Insira corretamente as informções: DESCRIÇÃO DA TAREFA', 'tarefa', 'error');

            }else{
                $query = $pdo->prepare('SELECT * FROM tarefa');

                if($query->execute()){

                    $row = $query->fetchAll(PDO::FETCH_ASSOC);
                    foreach($row as $key => $i){
                        $codTare = ($i['Cod_Tarefa'] ?? 0);
                    };

                    $sql = $pdo->prepare("INSERT INTO tarefa(`Cod_Tarefa`, `Desc_Tarefa`) VALUES(?, ?)");
                    $sql->execute(array(($codTare + 1), $_POST['Desc_Tarefa'] ));
                    infoBox('../pages/agenda.php', 'Descrição da Tarefa cadastrada com sucesso', 'tarefa', 'success');
                    exit();
                };
            };

        };
    };    
?>