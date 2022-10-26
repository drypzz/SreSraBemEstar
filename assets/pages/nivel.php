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
                <span class='info-span-content'>NÍVEL</span>
                <div class='register-content-buttons'>
                    <div class='btn'>
                        <button class='button-control arrow-left'>Nível</button>
                    </div>
                    <div class='btn'>
                        <button class='button-control active-btn'>Comorbidade</button>
                    </div>
                </div>

                <div class='register-container-items'>

                    <div class='transition item-cards' style='display: none;'>
                        <form class='transition' action='../php/global.php?type=nivel' method='post'>
                            <h2>Painel do Nível.</h2>
                            <div class='transition form-container'>
                                <?php if(isset($_GET['reg'])){ ?>
                                    <?php if($_GET['reg'] == 'nivel'){ ?>
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
                                    <label for='Descricao_Nivel'>Descrição:<span style='color: red;'>*</span></label>
                                    <textarea name='Descricao_Nivel' id='Descricao_Nivel' cols='5' rows='5'></textarea>
                                    <!-- <input type='text' required id='desc-remedio' placeholder='Suas imformações' name='desc-remedio' autocomplete='off'> -->
                                    <span id='span-error-desc' style='color: red;'></span>
                                </div>

                                <div class='form-group'>
                                    <label for='nivel_comorbidade'>Nível da Comorbidade:<span style='color: red;'>*</span></label>
                                    <span id='span-error-nvl-comorbidade' style='color: red;'></span>
                                </div>

                                <div class='form-radio'>
                                    <input type='radio' id='baixo' name='radio' value='BAIXO'>
                                    <label for='baixo'>BAIXO</label><br>
                                </div>

                                <div class='form-radio'>
                                    <input type='radio' id='moderado' name='radio' value='MODERADO'>
                                    <label for='moderado'>MODERADO</label><br>
                                </div>
                                
                                <div class='form-radio'>
                                    <input type='radio' id='alto' name='radio' value='ALTO'>
                                    <label for='alto'>ALTO</label><br>
                                </div>

                                <div class='form-radio'>
                                    <input type='radio' id='mtalto' name='radio' value='MUITO ALTO'>
                                    <label for='mtalto'>MUITO ALTO</label><br>
                                </div>

                                <div class='form-group'>
                                    <input type='submit' value='Salvar'>
                                </div>
                            </div>
                        </form>
                    </div>




                    <!-- código do nivel na comorbidade -->
                    




                    <div id='register' class='transition item-cards top focus' style='display: block;'>
                        <form id='registro' action='../php/global.php?type=comorbidade' method='post'>
                            <h2>Painel da Comorbidade.</h2>
                            <div class='form-container top'>
                                <?php if(isset($_GET['reg'])){ ?>
                                    <?php if($_GET['reg'] == 'comorbidade'){ ?>
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
                                <label for='comorbidade'>Comorbidade:<span style='color: red;'>*</span></label>
                                    <input type='text' required id='comorbidade' name='comorbidade' autocomplete='off'>
                                    <span id='span-error-comorbidade' style='color: red;'></span>
                                </div>
                                <div class='form-group'>
                                    <!-- do nível da comorbidade tlgd baixo, alto etc.. -->
                                    <label for='Cod_Nivel'>Nível da Comorbidade: </label> 
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

        <script src='../javascript/valids.js'></script>

        <script src='../javascript/functions.js'></script>

        <script src='../javascript/navbar.js'></script>

        <script src='../javascript/cards.js'></script>

        <script src='../javascript/darkmode.js'></script>
    </body>
</html>