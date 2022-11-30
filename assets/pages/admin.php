<!-- [
    author: elseif and function;
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

            if(isset($_GET['logout'])){
                header('location: ../../index.php');
                unset($_SESSION['name']);
                unset($_SESSION['logged']);
                unset($_SESSION['cpf']);
                session_destroy();
            };
        ?>
        
    </head>
    <body class='transition'>
        <!-- loader -->
        <div class='loader-container'>
            <div class='loader'></div>
        </div>

        <!-- snow -->
        <div class='snowflakes' aria-hidden='true'>
            <div class='snowflake'>❅</div>
            <div class='snowflake'>❆</div>
            <div class='snowflake'>❅</div>
            <div class='snowflake'>❆</div>
            <div class='snowflake'>❅</div>
            <div class='snowflake'>❆</div>
            <div class='snowflake'>❅</div>
            <div class='snowflake'>❆</div>
            <div class='snowflake'>❅</div>
            <div class='snowflake'>❆</div>
            <div class='snowflake'>❅</div>
            <div class='snowflake'>❆</div>
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
                        <a href='../../index.php' class='navbar-links'>Pagina Inicial</a>
                    </li>
                    <li class='navbar-item'>
                        <a href='#' class='navbar-links active'>Gerenciar</a>
                    </li>
                    <li class='navbar-item'>
                        <a href='?logout' class='navbar-links'>Sair</a>
                    </li>
                </ul>
            </div> <!-- container -->
        </nav> <!-- navbar -->


        <div>
            
        </div>


        <!-- main -->
        <div class='transition main admin'>
            <div class='container'>
                <div class='main-content admin'>
                    <h1>ABA ADMINISTRATIVA<br>SR. & SRA. BEM ESTAR</h1>
                </div>
            </div> <!-- container -->
            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320' id='wave'><path class='transition' id='oathhhhs' fill-opacity='1' d='M0,96L80,90.7C160,85,320,75,480,96C640,117,800,171,960,165.3C1120,160,1280,96,1360,64L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z'></path></svg>
        </div> <!-- main -->

        <div class='admin-main'>
            <div class='admin-container'>
                <div class='admin-ts'>
                    <div class='admin-content'>
                        <img class='unselectable' draggable='false' (dragstart)='false;' src='../gfx/primary/loiroimundo.png' alt='Foto de perfil'>
                    </div>
                    <div class='admin-content'>
                        <h1>Olá, <?php echo $_SESSION['name']; ?></h1>
                        <p>Seu CPF: <?php echo $_SESSION['cpf']; ?></p>
                    </div>
                </div>
                <div class='admin-ts item'>
                    <div class='admin-content'>
                        
                        <a href='agenda.php'>
                            <div class='container'>
                                <div class='admin-content-item'>
                                    <img src='../gfx/icons/agenda.png' alt=''>
                                </div>
                                <div class='admin-content-item'>
                                    <h1>Agenda</h1>
                                    <p>Na agenda você consegue definir horas e datas para suas atividades, e ainda junto com a descrição das suas tarefas.</p>
                                </div>
                            </div>
                        </a>
                        
                        <!-- <a href='#'>
                            <div class='container'>
                                <div class='admin-content-item'>
                                    <img src='../gfx/icons/level.png' alt=''>
                                </div>
                                <div class='admin-content-item'>
                                    <h1>Nível</h1>
                                    <p>No nível você escreve como é sua comorbidade para que possa lembrar no futuro e junto com a descrição da comorbidade e o nível dela.</p>
                                </div>
                            </div>
                        </a> -->

                        <a href='remedio.php'>
                            <div class='container'>
                                <div class='admin-content-item'>
                                    <img src='../gfx/icons/remedio.png' alt=''>
                                </div>
                                <div class='admin-content-item'>
                                    <h1>Remédios</h1>
                                    <p>Informe seus remédios para lembrar no futuro e uma descrição de como usar os remédios.</p>
                                </div>
                            </div>
                        </a>

                        <a href='register.php'>
                            <div class='container'>
                                <div class='admin-content-item'>
                                    <img src='../gfx/icons/agenda.png' alt=''>
                                </div>
                                <div class='admin-content-item'>
                                    <h1>Cadastrar Idoso(a)</h1>
                                    <p>Informe os dados necessários para cadastrar um paciente(Idoso(a)).</p>
                                </div>
                            </div>
                        </a>

                    </div>
                </div>
            </div>
        </div>

        <div class='main-listadmin' id='list'>

            <div class='container-listadmin list'>

                <div class='content-listadmin'>
                    <h1>Agenda(s) Cadastrada(s)</h1>

                    <?php 
                        include "../mysql/pdo.php";

                        $sql = $pdo->prepare('SELECT * FROM agenda WHERE CPF_Resp = ?');

                        if($sql->execute([$_SESSION['cpf']])){
                            $row = $sql->fetchAll(PDO::FETCH_ASSOC);
                            if($sql->rowCount() > 0){
                                echo '<div class="container-list">';
                                foreach($row as $key => $i){

                                    $queryIdoso = $pdo->prepare("SELECT * FROM cadidoso WHERE `CPF_Idoso` = ?");
                                    if($queryIdoso->execute(array($i['CPF_Idoso']))){

                                        $row2 = $queryIdoso->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($row2 as $key => $kas){
                                            $name = ($kas['Nome_Idoso'] ?? 'NULL');
                                        };

                                        echo '<div class="content-list">';
                                            echo '<div class="list-main">';
                                                echo '<div class="list-container agend">';
                                                    echo '<h3>#'.($i['Cod_Agen'] ?? 'NULL').'</h3><br>';
                                                    echo '<span><b>Agenda Criada</b></span><br><br>';
                                                    echo '<span><b>Data:</b> '.($i['Data_Tarefa'] ?? 'NULL').'</span><br>';
                                                    echo '<span><b>Hora:</b> '.($i['Hora_Tarefa'] ?? 'NULL').'</span><br><br>';
                                                    echo '<span><b>Em nome de:</b> '.$name.'</span><br><br>';
                                                    echo '<a href="../php/global.php?type=delete&on=agenda&value='.($i['Cod_Agen'] ?? 'NULL').'"><i class="fa-solid fa-trash-can"></i></a>';
                                                echo '</div>';
                                            echo '</div>';
                                        echo '</div>';
                                    };
                                };
                                echo '</div>';
                            }else{
                                echo '<div class="container-list none">';
                                echo '<div class="content-list">';
                                echo '<div class="list-main"> <h3>* Nenhuma Agenda(s) encontrada(s) *</h3> </div></div>';
                                echo '</div>';
                            };
                        };

                    ?>

                </div> <!-- content -->

                <div class='content-listadmin'>
                    <h1>Idoso(a)'s Cadastrado(s)</h1>

                    <?php 
                        include "../mysql/pdo.php";

                        $sql = $pdo->prepare('SELECT * FROM cadidoso WHERE CPF_Resp = ?');

                        if($sql->execute([$_SESSION['cpf']])){
                            $row = $sql->fetchAll(PDO::FETCH_ASSOC);
                            if($sql->rowCount() > 0){
                                echo '<div class="container-list">';
                                foreach($row as $key => $i){
                                    echo '<div class="content-list">';
                                        echo '<div class="list-main">';
                                            echo '<div class="list-container">';
                                                echo '<h3>#'.($key + 1).'</h3><br>';
                                                echo '<span><b>Nome:</b> '.($i['Nome_Idoso'] ?? 'NULL').'</span><br>';
                                                echo '<span><b>Email:</b> '.($i['Email_Idoso'] ?? 'NULL').'</span><br>';
                                                echo '<span><b>Data de Nascimento:</b> '.($i['Dat_Nasc_Idoso'] ?? 'NULL').'</span><br>';
                                                echo '<span><b>CPF:</b> '.($i['CPF_Idoso'] ?? 'NULL').'</span><br><br>';
                                                echo '<a href="../php/global.php?type=delete&on=idoso&value='.($i['CPF_Idoso'] ?? 'NULL').'"><i class="fa-solid fa-trash-can"></i></a>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                };
                                echo '</div>';
                            }else{
                                echo '<div class="container-list none">';
                                echo '<div class="content-list">';
                                echo '<div class="list-main"> <h3>* Nenhum Idoso(a) encontrado(a) *</h3> </div></div>';
                                echo '</div>';
                            };
                        };

                    ?>

                </div> <!-- content -->

                <div class='content-listadmin'>
                    <h1>Remédio(s) Cadastrado(s)</h1>

                    <?php 
                        include "../mysql/pdo.php";

                        $sql = $pdo->prepare('SELECT * FROM remedio WHERE CPF_Resp = ?');

                        if($sql->execute([$_SESSION['cpf']])){
                            $row = $sql->fetchAll(PDO::FETCH_ASSOC);
                            if($sql->rowCount() > 0){
                                echo '<div class="container-list">';
                                foreach($row as $key => $i){
                                    echo '<div class="content-list">';
                                        echo '<div class="list-main">';
                                            echo '<div class="list-container remed">';
                                                echo '<h3>#'.($i['Cod_Remedio'] ?? 'NULL').'</h3><br>';
                                                echo '<span><b>Nome:</b> '.($i['Nome_Remed'] ?? 'NULL').'</span><br>';
                                                echo '<span><b>Descrição:</b> '.($i['Descricao_Remed'] ?? 'NULL').'</span><br><br>';
                                                echo '<a href="../php/global.php?type=delete&on=remedio&value='.($i['Cod_Remedio'] ?? 'NULL').'"><i class="fa-solid fa-trash-can"></i></a>';
                                            echo '</div>';
                                        echo '</div>';
                                    echo '</div>';
                                };
                                echo '</div>';
                            }else{
                                echo '<div class="container-list none">';
                                echo '<div class="content-list">';
                                echo '<div class="list-main"> <h3>* Nenhum Remédio(s) encontrado(s) *</h3> </div></div>';
                                echo '</div>';
                            };
                        };

                    ?>

                </div> <!-- content -->

            </div> <!-- container -->

            <div class='container-listadmin'>

                <div class='content-listadmin tarefa'>
                    <h1>Tarefa(s) Cadastrada(s)</h1>

                    <?php 
                        include "../mysql/pdo.php";

                        $sql = $pdo->prepare('SELECT * FROM tarefa WHERE CPF_Resp = ?');

                        if($sql->execute([$_SESSION['cpf']])){
                            $row = $sql->fetchAll(PDO::FETCH_ASSOC);
                            echo '<div class="container-list">';
                            if($sql->rowCount() > 0){
                                foreach($row as $key => $i){
                                    $queryAgen = $pdo->prepare("SELECT * FROM agenda WHERE `Cod_Agen` = ?");
                                    $queryRemed = $pdo->prepare("SELECT * FROM remedio WHERE `Cod_Remedio` = ?");

                                    if($queryAgen->execute(array($i['Cod_Agen'])) && $queryRemed->execute(array($i['Cod_Remedio']))){

                                        $row1 = $queryAgen->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($row1 as $key => $index){
                                            $dataAgen = ($index['Data_Tarefa'] ?? 'NULL');
                                            $horaAgen = ($index['Hora_Tarefa'] ?? 'NULL');
                                            $cpfAgend = ($index['CPF_Idoso'] ?? 'NULL');
                                        };

                                        $row2 = $queryRemed->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($row2 as $key => $kas){
                                            $nameRemd = ($kas['Nome_Remed'] ?? 'NULL');
                                        };

                                        $queryIdoso = $pdo->prepare("SELECT * FROM cadidoso WHERE `CPF_Idoso` = ?");
                                        if($queryIdoso->execute(array($cpfAgend))){

                                            $row3 = $queryIdoso->fetchAll(PDO::FETCH_ASSOC);
                                            foreach($row3 as $key => $kas){
                                                $name = ($kas['Nome_Idoso'] ?? 'NULL');
                                            };

                                            echo '<div class="content-list">';
                                                echo '<div class="list-main">';
                                                    echo '<div class="list-container">';
                                                        echo '<h3>#'.($i['Cod_Tarefa'] ?? 'NULL').'</h3><br>';
                                                        echo '<span><b>Nome:</b> '.$name.'</span><br>';
                                                        echo '<span><b>Descrição:</b> '.$i['Desc_Tarefa'].'</span><br><br>';
                                                        echo '<span><b>Data:</b> '.$dataAgen.'</span><br>';
                                                        echo '<span><b>Hora:</b> '.$horaAgen.'</span><br>';
                                                        echo '<span><b>Remédio:</b> '.$nameRemd.'</span><br><br>';
                                                        echo '<a href="../php/global.php?type=delete&on=tarefa&value='.($i['Cod_Tarefa'] ?? 'NULL').'"><i class="fa-solid fa-trash-can"></i></a>';
                                                    echo '</div>';
                                                echo '</div>';
                                            echo '</div>';
                                        };
                                    };
                                };
                            }else{
                                echo '<div class="content-list">';
                                echo '<div class="list-main"> <h3>* Nenhuma tarefa encontrada *</h3> </div></div>';
                            };
                            echo '</div>';
                        };

                    ?>

                </div> <!-- content -->

            </div> <!-- container -->

        </div> <!-- main -->

        <div class='dark-container'>
            <button id='darkmode' onclick='darkmode()'></button>
        </div>

        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'><path fill='#222222' fill-opacity='1' d='M0,192L1440,160L1440,320L0,320Z'></path></svg>
        <footer>
            <div class='footer-container'>
                <div class='footer-content'>
                    <p>Copyright © 2022 - <span id='date'></span>. Todos os direitos reservados.</p>
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

        <script src='../javascript/navbar.js'></script>
        <script src='../javascript/functions.js'></script>
        <script src='../javascript/darkmode.js'></script>
    </body>
</html>