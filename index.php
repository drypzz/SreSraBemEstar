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

        <meta property='og:type' content='website' />

        <meta name='theme-color' content='#32cd74'>

        <meta name='title' content='Sr. & Sra. Bem Estar'>
        <meta name='description' content='Olá, seja bem vindo(a), ao nosso site. Aqui você vera um pouco sobre nós.'/>
        <meta name='url' content='#'>

        <meta property='og:title' content='Sr. & Sra. Bem Estar - Início'>
        <link rel='image_src' href='assets/gfx/primary/logo.png'>
        
        <meta property='og:description' content='Olá, seja bem vindo(a), ao nosso site. Aqui você vera um pouco sobre nós.'>

        <meta property='og:site_name' content='Sr. & Sra. Bem Estar'>
        <meta property='og:url' content='#'>

        <meta property='og:image' content='assets/gfx/logo.png'>
        <meta property='og:image:width' content='900'>
        <meta property='og:image:height' content='900'>

        <title>Início - Sr. & Sra. Bem Estar</title>

        <link rel='stylesheet' href='assets/styled/global.css'>

        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css'>

        <link rel='shortcut icon' href='assets/gfx/primary/logo.png' type='image/x-icon'>

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
                        <img class='unselectable' draggable='false' (dragstart)='false;' src='assets/gfx/primary/logo.png' alt=''>
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
                        <a href='#about' class='navbar-links'>Sobre</a>
                    </li>
                    <li class='navbar-item'>
                        <a href='assets/pages/register.php' class='navbar-links'>Registrar-se</a>
                    </li>
                    <?php if(isset($_SESSION['logged'])){ ?>
                    <li class='navbar-item'>
                        <a href='assets/pages/admin.php' class='navbar-links'>Gerenciar</a>
                    </li>
                    <?php }; ?>
                </ul>
            </div> <!-- container -->
        </nav> <!-- navbar -->

        <!-- main -->
        <div class='transition main'>
            <div class='container'>
                <div class='main-content'>
                    <h1 class='transition'>BEM<br>VINDO(A)</h1>
                    <span class='info'>SR. & SRA. BEM ESTAR !</span>
                    <p>Olá, seja bem vindo(a), ao nosso site.<br>Aqui você verá um pouco sobre nós.</p>
                    <div class='main-btn'>
                        <div class='btn'>
                            <a href='assets/pages/register.php'>Registre-se<i class='fa-solid fa-list'></i></a>
                        </div>
                    </div>
                </div>
                <div class='main-content img'>
                    <div>
                        <img class='unselectable' draggable='false' (dragstart)='false;' src='assets/gfx/primary/logo.png' alt=''>
                        <div style='text-align: center; margin: 20px 0;'>
                            <span class='info-span'>- Sr. & Sra. Bem Estar -</span>
                        </div>
                    </div>
                </div>
            </div> <!-- container -->
            
            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 320' id='wave'><path class='transition' id='oathhhhs' fill-opacity='1' d='M0,96L80,90.7C160,85,320,75,480,96C640,117,800,171,960,165.3C1120,160,1280,96,1360,64L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z'></path></svg>
        </div> <!-- main -->

        <!-- about -->
        <div id='about' class='transition about'>
            <div class='about-container'>
                <span class='info-span-content'>SOBRE NÓS</span>
                <div class='about-content'>
                    <p>O Projeto Integrador (PI) é uma Unidade Curricular,
                        baseada na metodologia de ação-reflexão-ação,
                        que se constitui na proposição de situações desafiadoras
                        a serem cumpridas pelo aluno. Esta unidade curricular é
                        obrigatória nos cursos de Aprendizagem Comercial,
                        Qualificação Profissional e cursos Técnicos.
                        O planejamento e execução do Projeto Integrador
                        propiciam a articulação das competências previstas no perfil
                        profissional de conclusão do curso, pois apresenta
                        ao aluno situações que estimulam o seu desenvolvimento profissional
                        ao ter que decidir, opinar e debater com o grupo a resolução de
                        problemas a partir do tema gerador, portanto, o aluno poderá
                        demonstrar sua atuação profissional pautada pelas marcas
                        formativas do Senac, uma vez que permite o trabalho em equipe e o exercício da ética,
                        da responsabilidade social e da atitude empreendedora.</p>
                </div>
                <div class='transition about-content'>
                    <div class='about-imgs'>
                        <div class='about-imgs-content'>
                            <img class='unselectable' draggable='false' (dragstart)='false;' src='https://avatars.githubusercontent.com/u/79218936?v=4' alt=''>
                            <span>@elseif</span>
                            <a href='#'>
                                <i class='fa-brands fa-linkedin'></i>
                            </a>
                        </div>
                        <div class='about-imgs-content'>
                            <img class='unselectable' draggable='false' (dragstart)='false;' src='https://avatars.githubusercontent.com/u/79523461?v=4' alt=''>
                            <span>@function404</span>
                            <a href='#'>
                                <i class='fa-brands fa-linkedin'></i>
                            </a>
                        </div>
                        <div class='about-imgs-content'>
                            <img class='unselectable' draggable='false' (dragstart)='false;' src='https://avatars.githubusercontent.com/u/79218966?v=4' alt=''>
                            <span>@isadoralb</span>
                            <a href='#'>
                                <i class='fa-brands fa-linkedin'></i>
                            </a>
                        </div>
                        <div class='about-imgs-content'>
                            <img class='unselectable' draggable='false' (dragstart)='false;' src='https://avatars.githubusercontent.com/u/79219261?v=4' alt=''>
                            <span>@ash</span>
                            <a href='#'>
                                <i class='fa-brands fa-linkedin'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>  <!-- container -->
        </div> <!-- about -->

        <div class='dark-container'>
            <button id='darkmode' onclick='darkmode()'></button>
        </div>

        <div class='btn-settings-container'>
            <div class='container'>
                <div class='btn-settings-content'>
                    <button id='btn-max'>+</button>
                </div>
                <div class='btn-settings-content'>
                    <button id='btn-min'>-</button>
                </div>
            </div>
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

        <script src='assets/javascript/navbar.js'></script>
        <script src='assets/javascript/functions.js'></script>
        <script src='assets/javascript/darkmode.js'></script>
        <script src="assets/javascript/size.js"></script>
    </body>
</html>