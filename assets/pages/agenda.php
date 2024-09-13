<!-- [
    author: drypzz and functions;
    type: .html and .php;
] -->

<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>

        <title>Início - Sr. & Sra. Bem Estar</title>

        <link rel='stylesheet' href='../styled/global.css'>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css'>

        <link rel='shortcut icon' href='../gfx/primary/logo.png' type='image/x-icon'>

        <?php
            session_start();

            if((!isset($_SESSION['logged']))){
                header('location: ../../index.php');
                unset($_SESSION['name']);
                unset($_SESSION['logged']);
                unset($_SESSION['cpf']);
            };
        ?>
        
    </head>
    <body class='transition'>
        <!-- loader -->
        <div class='loader-container'>
            <div class='loader'></div>
        </div>
        
        <!-- navbar -->
        <nav class='navbar'>
            <div class='navbar-container'>
                <div class='navbar-logo'>
                    <a href='#'>
                        <img class='unselectable' draggable='false' (dragstart)='false;' src='../gfx/primary/logo.png' alt=''>
                    </a>
                </div>
                <div class='navbar-toggle' id='mobile-menu'>
                    <span class='bar'></span>
                    <span class='bar'></span>
                    <span class='bar'></span>
                </div>
                <ul class='navbar-menu'>
                    <li class='navbar-item'>
                        <a href='#' class='navbar-links active'>Agenda</a>
                    </li>
                    <li class='navbar-item'>
                        <a href='admin.php' class='navbar-links'>Voltar</a>
                    </li>
                </ul>
            </div> <!-- container -->
        </nav> <!-- navbar -->

        <!-- main -->
        <div class='transition main admin'>
            <div class='container'>
                <div class='main-content admin'>
                    <h1>ABA ADMINISTRATIVA<br>SR. & SRA. BEM ESTAR</h1>
                </div>
            </div> <!-- container -->
            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320' id='wave'><path class='transition' id='oathhhhs' fill-opacity='1' d='M0,96L80,90.7C160,85,320,75,480,96C640,117,800,171,960,165.3C1120,160,1280,96,1360,64L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z'></path></svg>
        </div> <!-- main -->


        <div class='transition register-main'>
            <div class='register-container'>
                <span class='info-span-content'>AGENDA</span>
                <div class='register-content-buttons'>
                    <div class='btn'>
                        <button class='button-control arrow-left'>Tarefas</button>
                    </div>
                    <div class='btn'>
                        <button class='button-control active-btn'>Agenda</button>
                    </div>
                </div>

                <div class='register-container-items'>

                    <div class='transition item-cards' style='display: none;'>
                        <form class='transition' action='../php/global.php?type=tarefa' method='post'>
                            <h2>Painel da tarefa.</h2>
                            <div class='transition form-container'>
                                <?php if(isset($_GET['reg'])){ ?>
                                    <?php if($_GET['reg'] == 'tarefa'){ ?>
                                        <?php if (isset($_GET['info']) && isset($_GET['type'])){ ?>
                                            <?php if($_GET['type'] == 'success'){ ?>
                                                <div class='success'>
                                                    <span><i class='fa-solid fa-circle-check'></i> *<?php echo $_GET['info'] ?></span>
                                                </div>
                                            <?php }else{; ?>
                                                <div class='error'>
                                                    <span><i class='fa-solid fa-circle-exclamation'></i> *<?php echo $_GET['info'] ?></span>
                                                </div>
                                            <?php }; ?>
                                        <?php }; ?>
                                    <?php }; ?>
                                <?php }; ?>
                                <div class='form-group'>
                                    <label>Selecione uma agenda</label>
                                    <div class='custom-select'>
                                        <select required class='form-control' name='select-agend' id='select-agend'>
                                            <option value=''>Selecione uma agenda</option>
                                            <?php
                                            include '../mysql/pdo.php';

                                            $query = $pdo->prepare('SELECT * FROM agenda WHERE CPF_Resp = ?');

                                            if($query->execute([$_SESSION['cpf']])){
                                                $row = $query->fetchAll(PDO::FETCH_ASSOC);
                                                if($query->rowCount() > 0){
                                                    foreach($row as $key => $i){ ?>
                                                        <?php $queryIdoso = $pdo->prepare("SELECT * FROM cadidoso WHERE `CPF_Idoso` = ?");
                                                            if($queryIdoso->execute(array($i['CPF_Idoso']))){
                
                                                            $row3 = $queryIdoso->fetchAll(PDO::FETCH_ASSOC);
                                                            foreach($row3 as $key => $kas){
                                                                $name = ($kas['Nome_Idoso'] ?? NULL);
                                                            };
                                                        ?>
                                                        <option value="<?php echo $i['Cod_Agen']; ?>"><b><?php echo '#'.$i['Cod_Agen'].' - Agenda de: '.$name.''; ?></b></option>
                                                        <?php }; ?>
                                                    <?php }; ?>
                                                <?php }else{ ?>
                                                    <option value=''><b style='color: red'>* Nenhuma Agenda encontrada *</b></option>
                                                <?php }; ?>
                                            <?php }; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class='form-group remed'>
                                    <label>Selecione um remédio(s)</label>
                                    <?php
                                        include '../mysql/pdo.php';

                                        $query = $pdo->prepare('SELECT * FROM remedio WHERE CPF_Resp = ?');
                                        if($query->execute([$_SESSION['cpf']])){
                                            $row = $query->fetchAll(PDO::FETCH_ASSOC);
                                            if($query->rowCount() > 0){
                                                foreach($row as $key => $i){ ?>
                                                    <input type='radio' id='<?php echo $i['Nome_Remed'] ?>' name='select-remed' value='<?php echo $i['Cod_Remedio'] ?>'>
                                                    <label for='<?php echo $i['Nome_Remed'] ?>'><?php echo $i['Nome_Remed'] ?></label>
                                                    <?php }; ?>
                                            <?php }else{ ?>
                                                <span><b style='color: red'>* Nenhum remédio encontrada *</b></span>
                                            <?php }; ?>
                                        <?php }; ?>
                                </div>
                                <div class='form-group'>
                                    <label for='Desc_Tarefa'>Descrição da Tarefa:<span style='color: red;'>*</span></label>
                                    <textarea name='Desc_Tarefa' id='Desc_Tarefa' cols='5' rows='5'></textarea>
                                    <span id='span-error-desc' style='color: red;'></span>
                                </div>

                                <div class='form-group'>
                                    <input type='submit' value='Salvar'>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id='register' class='transition item-cards top focus' style='display: block;'>
                        <form id='registro' action='../php/global.php?type=agenda' method='post'>
                            <h2>Painel Cadastro de Agenda.</h2>
                            <div class='form-container top'>
                                <?php if(isset($_GET['reg'])){ ?>
                                    <?php if($_GET['reg'] == 'agenda'){ ?>
                                        <?php if (isset($_GET['info']) && isset($_GET['type'])){ ?>
                                            <?php if($_GET['type'] == 'success'){ ?>
                                                <div class='success'>
                                                    <span><i class='fa-solid fa-circle-check'></i> *<?php echo $_GET['info'] ?></span>
                                                </div>
                                            <?php }else{; ?>
                                                <div class='error'>
                                                    <span><i class='fa-solid fa-circle-exclamation'></i> *<?php echo $_GET['info'] ?></span>
                                                </div>
                                            <?php }; ?>
                                        <?php }; ?>
                                    <?php }; ?>
                                <?php }; ?>

                                <div class='form-group'>
                                    <label>Selecione um Idoso(a)</label>
                                    <div class='custom-select'>
                                        <select required class='form-control' name='select-agend' id='select-agend'>
                                            <option value=''>Selecione um CPF</option>
                                            <?php
                                            include '../mysql/pdo.php';

                                            $query = $pdo->prepare('SELECT * FROM cadidoso WHERE CPF_Resp = ?');

                                            if($query->execute([$_SESSION['cpf']])){
                                                $row = $query->fetchAll(PDO::FETCH_ASSOC);
                                                if($query->rowCount() > 0){
                                                    foreach($row as $key => $i){ ?>
                                                        <option value="<?php echo $i['CPF_Idoso']; ?>"><b><?php echo ''.$i['CPF_Idoso'].' - '.$i['Nome_Idoso'].''; ?></b></option>
                                                    <?php }; ?>
                                                <?php }else{ ?>
                                                    <option value=''><b style='color: red'>* Nenhum Idoso(a) encontrado(a) *</b></option>
                                                <?php }; ?>
                                            <?php }; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <label for='Data-Tarefa'>Data da Tarefa:<span style='color: red;'> *Clique no Calendário</span></label>
                                    <input type='date' name='Data-Tarefa' id='Data-Tarefa'>
                                </div>
                                <div class='form-group'>
                                    <label for='Hora-Tarefa'>Hora da Tarefa:<span style='color: red;'> *Clique no Relógio</span></label>
                                    <input type='time' required id='Hora-Tarefa' name='Hora-Tarefa'>
                                </div>
                                                                                               
                                <div class='form-group'>
                                    <input type='submit' value='Salvar'>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>




        <div class='dark-container'>
            <button id='darkmode' onclick='darkmode()'></button>
        </div>

        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'><path fill='#222222' fill-opacity='1' d='M0,192L1440,160L1440,320L0,320Z'></path></svg>
        <footer>
            <div class='footer-container'>
                <div class='footer-content'>
                    <p>Copyright © 2021 - <span id='date'></span>. Todos os direitos reservados.</p>
                </div>
            </div>
        </footer>
    
        <!-- jquery -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
        <script>
            $(window).on('load', function(){
                $('.loader-container').fadeOut(1000);
            });
        </script>

        <script src='../javascript/valids.js'></script>

        <script src="../javascript/select.js"></script>

        <script src='../javascript/functions.js'></script>

        <script src='../javascript/navbar.js'></script>

        <script src='../javascript/cards.js'></script>

        <script src='../javascript/darkmode.js'></script>
    </body>
</html>