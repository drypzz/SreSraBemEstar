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

        <meta property='og:type' content='website' />

        <meta name='theme-color' content='#32cd74'>

        <meta name='title' content='Sr. & Sra. Bem Estar'>
        <meta name='description' content='Olá, seja bem vindo(a), ao nosso site. Registre-se / Entre aqui.'/>
        <meta name='url' content='#'>

        <meta property='og:title' content='Sr. & Sra. Bem Estar - Registro'>
        <link rel='image_src' href='../gfx/primary/logo.png'>
        
        <meta property='og:description' content='Olá, seja bem vindo(a), ao nosso site. Registre-se / Entre aqui.'>

        <meta property='og:site_name' content='Sr. & Sra. Bem Estar'>
        <meta property='og:url' content='#'>

        <meta property='og:image' content='../gfx/primary/logo.png'>
        <meta property='og:image:width' content='900'>
        <meta property='og:image:height' content='900'>

        <title>Registro - Sr. & Sra. Bem Estar</title>

        <link rel='stylesheet' href='../styled/global.css'>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css'>

        <link rel='shortcut icon' href='../gfx/primary/logo.png' type='image/x-icon'>

        <?php session_start(); ?>
    </head>
    <body class='transition'>
        <!-- loader -->
        <div class='loader-container'>
            <div class='loader'></div>
        </div>
        
        <!-- navbar -->
        <nav class='transition navbar'>
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
                        <a href='../../index.php#about' class='navbar-links'>Sobre</a>
                    </li>
                    <li class='navbar-item'>
                        <a href='#' class='navbar-links active'>Registro</a>
                    </li>
                    <?php if(isset($_SESSION['logged'])){ ?>
                    <li class='navbar-item'>
                        <a href='admin.php' class='navbar-links'>Gerenciar</a>
                    </li>
                    <?php }; ?>
                </ul>
            </div> <!-- container -->
        </nav> <!-- navbar -->

        <!-- main -->
        <div class='transition main register'>
            <div class='container'>
                <div class='main-content register'>
                    <h1 class='transition'>SR. & SRA. BEM ESTAR</h1>
                    <p class='transition'>Escolha uma aba entre as de Registro e Login.</p>
                </div>
            </div> <!-- container -->
            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'>
                <path class='transition' id='oathhhhs' fill-opacity='1' d='M0,192L80,176C160,160,320,128,480,138.7C640,149,800,203,960,218.7C1120,235,1280,213,1360,202.7L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z'></path>
            </svg>
        </div> <!-- main -->


        <div class='transition register-main'>
            <div class='register-container'>
                <?php if(!isset($_SESSION['logged'])){ ?>
                <span class='info-span-content'>NÃO TEM UMA CONTA? REGISTRE-A AQUI.</span>
                <div class='register-content-buttons'>
                    <div class='btn'>
                        <button class='button-control arrow-left'>Logar-se</button>
                    </div>
                    <div class='btn'>
                        <button class='button-control active-btn'>Registrar-se</button>
                    </div>
                </div>
                <?php }else{ ?>
                <span class='info-span-content'>CADASTRAR IDOSO(a).</span>
                <div class='register-content-buttons'>
                    <div class='btn'>
                        <button class='button-control active-btn'>Registrar-se</button>
                    </div>
                </div>
                <?php }; ?>

                <div class='register-container-items'>

                    <?php if(!isset($_SESSION['logged'])){ ?>
                    <div class='transition item-cards' style='display: none;'>
                        <form class='transition' action='../php/global.php?type=login' method='post'>
                            <h2>Entrar como Responsável.</h2>
                            <div class='transition form-container'>
                                <?php if(isset($_GET['reg'])){ ?>
                                    <?php if($_GET['reg'] == 'nao'){ ?>
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
                                    <label for='cpfLogin'>CPF do Responsável:<span style='color: red;'>*</span></label>
                                    <input type='text' required id='cpfLogin' placeholder='000.000.000-00' name='cpfLogin' autocomplete='off' maxlength='14'>
                                    <span id='span-error-cpflogin' style='color: red;'></span>
                                </div>
                                <div class='form-group'>
                                    <label for='passwordLogin'>Senha do Responsável:<span style='color: red;'>*</span></label>
                                    <input type='password' required id='passwordLogin' name='passwordLogin'>
                                    <span id='span-error-passwordLogin' style='color: red;'></span>
                                </div>
                                <div class='form-group'>
                                    <input type='submit' value='Entrar'>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php }; ?>
                    
                    <?php if(isset($_SESSION['logged'])){ ?>
                    <div id='register' class='transition item-cards top focus' style='display: block;'>
                        <form id='registro' action='../php/global.php?type=idoso' method='post'>
                            <h2>Cadastrar Paciente(Idoso(a)).</h2>
                            <div class='form-container top'>
                                <?php if(isset($_GET['reg'])){ ?>
                                    <?php if($_GET['reg'] == 'sim'){ ?>
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
                                    <label for='name'>Nome do Idoso(a):<span style='color: red;'>*</span></label>
                                    <input type='text' required placeholder='Nome' id='name' name='name'>
                                </div>
                                <div class='form-group'>
                                    <label for='email'>Email do Idoso(a):<span style='color: red;'>*</span></label>
                                    <input type='email' required placeholder='sr&srabemestar@gmail.com' id='email' name='email'>
                                </div>
                                <div class='form-group'>
                                    <label for='date'>Data de nascimento do Idoso(a):<span style='color: red;'>*</span></label>
                                    <input type='text' required id='date' placeholder='00-00-0000' name='date' autocomplete='off' maxlength='10'>
                                    <span id='span-error-date' style='color: red;'></span>
                                </div>
                                <div class='form-group'>
                                    <label for='phone'>Telefone do Idoso(a):<span style='color: red;'>*</span></label>
                                    <input type='text' required id='phone' placeholder='(00) 0 0000-0000' name='phone' autocomplete='off' maxlength='15'>
                                    <span id='span-error-phone' style='color: red;'></span>
                                </div>
                                <div class='form-group'>
                                    <label for='cpf'>CPF do Idoso(a):<span style='color: red;'>*</span></label>
                                    <input type='text' required id='cpf' placeholder='000.000.000-00' name='cpf' autocomplete='off' maxlength='14'>
                                    <span id='span-error-cpf' style='color: red;'></span>
                                </div>
                                <div class='form-group'>
                                    <label for='passwordC'>Confirmar senha do Responsavel:<span style='color: red;'>*</span></label>
                                    <input type='password' required id='passwordC' name='passwordC'>
                                </div>
                                <div class='form-group'>
                                    <input type='submit' value='Cadastrar Paciente'>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php }else{ ?>
                    <div id='register' class='transition item-cards top focus' style='display: block;'>
                        <form id='registro' action='../php/global.php?type=register' method='post'>
                            <h2>Cadastrar Responsável ou Paciente.</h2>
                            <div class='form-container top'>
                                <?php if(isset($_GET['reg'])){ ?>
                                    <?php if($_GET['reg'] == 'sim'){ ?>
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
                                    <label for='name'>Nome:<span style='color: red;'>*</span></label>
                                    <input type='text' required placeholder='Nome' id='name' name='name'>
                                </div>
                                <div class='form-group'>
                                    <label for='email'>Email:<span style='color: red;'>*</span></label>
                                    <input type='email' required placeholder='sr&srabemestar@gmail.com' id='email' name='email'>
                                </div>
                                <div class='form-group'>
                                    <label for='date'>Data de nascimento:<span style='color: red;'>*</span></label>
                                    <input type='text' required id='date' placeholder='00-00-0000' name='date' autocomplete='off' maxlength='10'>
                                    <span id='span-error-date' style='color: red;'></span>
                                </div>
                                <div class='form-group'>
                                    <label for='phone'>Telefone:<span style='color: red;'>*</span></label>
                                    <input type='text' required id='phone' placeholder='(00) 0 0000-0000' name='phone' autocomplete='off' maxlength='15'>
                                    <span id='span-error-phone' style='color: red;'></span>
                                </div>
                                <div class='form-group'>
                                    <label for='cpf'>CPF:<span style='color: red;'>*</span></label>
                                    <input type='text' required id='cpf' placeholder='000.000.000-00' name='cpf' autocomplete='off' maxlength='14'>
                                    <span id='span-error-cpf' style='color: red;'></span>
                                </div>
                                <div class='form-group'>
                                    <label for='password'>Criar Senha:<span style='color: red;'>*</span></label>
                                    <input type='password' required id='password' name='password'>
                                </div>
                                <div class='form-group'>
                                    <label for='passwordC'>Confirmar senha:<span style='color: red;'>*</span></label>
                                    <input type='password' required id='passwordC' name='passwordC'>
                                </div>
                                <div class='form-group'>
                                    <div class='admin'>
                                        <input type='checkbox' id='resp' name='resp'>
                                        <label for='resp'>Você é um paciente? Não responsavel por outra pessoa.</label>
                                    </div>
                                </div>
                                <div id='divCpf' style='display:none;'>
                                    <div class='form-group'>
                                        <label for='cpfR'>CPF do Responsável por você:<span style='color: red;'>*</span></label>
                                        <input type='text' id='cpfR' placeholder='000.000.000-00' name='cpfR' autocomplete='off' maxlength='14'>
                                        <span id='span-error-cpfR' style='color: red;'></span>
                                    </div>
                                    <div class='form-group'>
                                        <span style='color: #c74040; font-size: 17px;'><b><i>OBS¹ - Caso o 'Responsável' não tenha uma conta em nosso Site, crie uma sem marcar a opção a cima.</i></b></span>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <span style='color: #c74040; font-size: 17px;'><i>OBS² - A opção acima, define se você é um 'Paciente (Idoso(a))'. Caso tenha marcado, você é um 'Paciente', caso não tenha, será um Responsável.</i></span>
                                </div>
                                <div class='form-group'>
                                    <input type='submit' value='Cadastrar'>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php }; ?>
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
                    <p>Copyright © 2021 - <span id='datesss'></span>. Todos os direitos reservados.</p>
                </div>
            </div>
        </footer>

        <!-- jquery -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
        <script>
            document.querySelector('#datesss').innerHTML = new Date().getFullYear();

            $(window).on('load', function(){
                $('.loader-container').fadeOut(1000);
            });
        </script>

        <script src='../javascript/navbar.js'></script>

        <script src='../javascript/cards.js'></script>

        <script src='../javascript/valids.js'></script>

        <script src='../javascript/darkmode.js'></script>
    </body>
</html>