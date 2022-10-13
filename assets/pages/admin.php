<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>

        <title>Início - Sr. & Sra. Bem Estar</title>

        <link rel='stylesheet' href='../styled/global.css'>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css'>

        <link rel='shortcut icon' href='../gfx/logo.png' type='image/x-icon'>

        <?php
            session_start();

            $name = $_SESSION['name'];
            $cpf = $_SESSION['cpf'];

            if((!isset($name) == true) and (!isset($cpf) == true)){
                header('location: ../../index.html');
                unset($name);
                unset($cpf);
            };

            if(isset($_GET['logout'])){
                header('location: ../../index.html');
                unset($name);
                unset($cpf);
                session_destroy();
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
                        <img class='unselectable' draggable='false' (dragstart)='false;' src='../gfx/logo.png' alt=''>
                    </a>
                </div>
                <div class='navbar-toggle' id='mobile-menu'>
                    <span class='bar'></span>
                    <span class='bar'></span>
                    <span class='bar'></span>
                </div>
                <ul class='navbar-menu'>
                    <li class='navbar-item'>
                        <a href='#' class='navbar-links active'>Pagina Inicial</a>
                    </li>
                    <li class='navbar-item'>
                        <a href='?logout' class='navbar-links'>Sair</a>
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

        <div class='admin-main'>
            <div class='admin-container'>
                <div class='admin-ts'>
                    <div class='admin-content'>
                        <img class='unselectable' draggable='false' (dragstart)='false;' src='../gfx/loiroimundo.png' alt='Foto de perfil'>
                    </div>
                    <div class='admin-content'>
                        <h1>Olá, <?php echo $name; ?></h1>
                        <p>Seu CPF: <?php echo $cpf; ?></p>
                    </div>
                </div>
                <div class='admin-ts item'>
                    <div class='admin-content'>
                        
                        <a>
                            <div class='container'>
                                <div class='admin-content-item'>
                                    <img src='../gfx/agenda.png' alt=''>
                                </div>
                                <div class='admin-content-item'>
                                    <h1>Agenda</h1>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A odit illum distinctio! Omnis ducimus pariatur vitae perspiciatis sequi provident ipsum beatae incidunt, voluptatibus, aspernatur distinctio quisquam ullam voluptas, doloremque similique!</p>
                                </div>
                            </div>
                        </a>
                        
                        <a>
                            <div class='container'>
                                <div class='admin-content-item'>
                                    <img src='../gfx/level.png' alt=''>
                                </div>
                                <div class='admin-content-item'>
                                    <h1>Level</h1>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A odit illum distinctio! Omnis ducimus pariatur vitae perspiciatis sequi provident ipsum beatae incidunt, voluptatibus, aspernatur distinctio quisquam ullam voluptas, doloremque similique!</p>
                                </div>
                            </div>
                        </a>

                        <a>
                            <div class='container'>
                                <div class='admin-content-item'>
                                    <img src='../gfx/remedio.png' alt=''>
                                </div>
                                <div class='admin-content-item'>
                                    <h1>Remédios</h1>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A odit illum distinctio! Omnis ducimus pariatur vitae perspiciatis sequi provident ipsum beatae incidunt, voluptatibus, aspernatur distinctio quisquam ullam voluptas, doloremque similique!</p>
                                </div>
                            </div>
                        </a>

                        <a>
                            <div class='container'>
                                <div class='admin-content-item'>
                                    <img src='../gfx/comorbidade.png' alt=''>
                                </div>
                                <div class='admin-content-item'>
                                    <h1>Comorbidade</h1>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A odit illum distinctio! Omnis ducimus pariatur vitae perspiciatis sequi provident ipsum beatae incidunt, voluptatibus, aspernatur distinctio quisquam ullam voluptas, doloremque similique!</p>
                                </div>
                            </div>
                        </a>

                        <a>
                            <div class='container'>
                                <div class='admin-content-item'>
                                    <img src='../gfx/tarefa.png' alt=''>
                                </div>
                                <div class='admin-content-item'>
                                    <h1>Tarefa</h1>
                                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A odit illum distinctio! Omnis ducimus pariatur vitae perspiciatis sequi provident ipsum beatae incidunt, voluptatibus, aspernatur distinctio quisquam ullam voluptas, doloremque similique!</p>
                                </div>
                            </div>
                        </a>

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