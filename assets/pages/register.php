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
    </head>
    <body>
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
                        <a href='../../index.html' class='navbar-links'>Pagina Inicial</a>
                    </li>
                    <li class='navbar-item'>
                        <a href='../../index.html#about' class='navbar-links'>Sobre</a>
                    </li>
                    <!-- <li class='navbar-item'>
                        <a href='#' class='navbar-links'>Contato</a>
                    </li> -->
                    <li class='navbar-item'>
                        <a href='#' class='navbar-links active'>Registro</a>
                    </li>
                </ul>
            </div> <!-- container -->
        </nav> <!-- navbar -->

        <!-- main -->
        <div class='main register'>
            <div class='container'>
                <div class='main-content register'>
                    <h1>SR. & SRA. BEM ESTAR</h1>
                    <p>Escolha uma aba entre as de Registro e Login.</p>
                </div>
            </div> <!-- container -->
            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'>
                <path fill='#f4f4f4' fill-opacity='1' d='M0,192L80,176C160,160,320,128,480,138.7C640,149,800,203,960,218.7C1120,235,1280,213,1360,202.7L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z'></path>
            </svg>
        </div> <!-- main -->


        <div class='register-main'>
            <div class='register-container'>
                <span class='info-span-content'>NÃO TEM UMA CONTA? REGISTRE-A AQUI.</span>
                <div class='register-content-buttons'>
                    <div class='btn'>
                        <button class='button-control arrow-left'>Logar-se</button>
                    </div>
                    <div class='btn'>
                        <button class='button-control active-btn'>Registrar-se</button>
                    </div>
                </div>

                <div class='register-container-items'>

                    <div class='item-cards'>
                        <form action='../php/register.php?type=registro' method='post'>
                            <h2>Painel de logar.</h2>
                            <div class='form-container'>
                                <?php if(isset($_GET['resp'])){ ?>
                                    <?php if($_GET['resp'] == 'nao'){ ?>
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
                                    <label for='cpf'>CPF:<span style='color: red;'>*</span></label>
                                    <input type='text' required id='cpf' placeholder='000.000.000-00' name='cpf' autocomplete='off' maxlength='14'>
                                </div>
                                <div class='form-group'>
                                    <label for='password'>Senha:<span style='color: red;'>*</span></label>
                                    <input type='password' required id='password' name='password'>
                                </div>
                                <div class='form-group'>
                                    <input type='submit' value='Entrar'>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id='login' class='item-cards top focus'>
                        <form action='../php/register.php?type=login' method='post'>
                            <h2>Painel de Registro.</h2>
                            <div class='form-container top'>
                                <?php if(isset($_GET['resp'])){ ?>
                                    <?php if($_GET['resp'] == 'sim'){ ?>
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
                                    <label for='nameR'>Nome do Responsável:<span style='color: red;'>*</span></label>
                                    <input type='text' required placeholder='Nome' id='nameR' name='nameR'>
                                </div>
                                <div class='form-group'>
                                    <label for='emailR'>Email do Responsável:<span style='color: red;'>*</span></label>
                                    <input type='email' required placeholder='sr&srabemestar@gmail.com' id='emailR' name='emailR'>
                                </div>
                                <div class='form-group'>
                                    <label for='dateR'>Data de nascimento do Responsável:<span style='color: red;'>*</span></label>
                                    <input type='text' required id='dateR' placeholder='00/00/0000' name='dateR' autocomplete='off' maxlength='10'>
                                </div>
                                <div class='form-group'>
                                    <label for='phoneR'>Telefone do Responsável:<span style='color: red;'>*</span></label>
                                    <input type='text' required id='phoneR' placeholder='(00) 0 0000-0000' name='phoneR' autocomplete='off' maxlength='15'>
                                </div>
                                <div class='form-group'>
                                    <label for='cpfR'>CPF do Responsável:<span style='color: red;'>*</span></label>
                                    <input type='text' required id='cpfR' placeholder='000.000.000-00' name='cpfR' autocomplete='off' maxlength='14'>
                                </div>
                                <div class='form-group'>
                                    <label for='passwordR'>Criar Senha:<span style='color: red;'>*</span></label>
                                    <input type='password' required id='passwordR' name='passwordR'>
                                </div>
                                <div class='form-group'>
                                    <label for='passwordCR'>Confirmar senha:<span style='color: red;'>*</span></label>
                                    <input type='password' required id='passwordCR' name='passwordCR'>
                                </div>
                                <div class='form-group'>
                                    <div class='admin'>
                                        <input type='checkbox' required id='resp' name='resp'>
                                        <label for='resp'>Você é uma pessoa 'Responsável' por outra ou um paciente ?</label>
                                    </div>
                                </div>
                                <div class='form-group'>
                                    <span style='color: #c74040; font-size: 17px;'><i>OBS: A opção acima, define se você é um 'Responsavel' por alguem. Caso tenha marcado, você é um 'Responsavel', caso não tenha, sera um Paciente.</i></span>
                                <div class='form-group'>
                                    <input type='submit' value='Cadastrar Responsável'>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>

        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320'><path fill='#222222' fill-opacity='1' d='M0,192L1440,160L1440,320L0,320Z'></path></svg>
        <footer>
            <div class='footer-container'>
                <div class='footer-content'>
                    <p>Copyright © 2022 - <span id='datesss'></span>. Todos os direitos reservados.</p>
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
    </body>
</html>