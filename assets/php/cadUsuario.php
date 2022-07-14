<?php
    include "../include/MySql.php";

   $emailr = $nomer = $foner = $senhar = $datanascr = "";
   $emailrErr = $nomerErr = $fonerErr = $senharErr = $datanascrErr = "";
   

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['cadusuario'])){

        if (empty($_POST['emailr'])){
            $emailrErr = "Email do responsável é obrigatório!";
        } else {
            $emailr = test_input($_POST["emailr"]);
        }

        if (empty($_POST['nomer'])){
            $nomerErr = "Nome do idoso é obrigatório!";
        } else {
            $nomer = test_input($_POST["nomer"]);
        }

        if (empty($_POST['foner'])){
            $fonerErr = "Número do responsável é obrigatório!";
        } else {
            $foner = test_input($_POST["foner"]);
        }

        if (empty($_POST['senhar'])){
            $senharErr = "Senha é obrigatório!";
        } else {
            $senhar = test_input($_POST["senhar"]);
        }

        if (empty($_POST['datanascr'])){
            $datanascrErr = "A idade é obrigatório!";
        } else {
            $datanascr = test_input($_POST["datanascr"]);
        }

        //Inserir no banco de dados
          $sql = $pdo->prepare('SELECT * FROM cadresponsavel WHERE emailr = ?');
          if($sql->execute(array($emailr))){
            if($sql->rowCount() > 0){
                echo 'Email ja cadastrado';
            }else {
                $sql = $pdo->prepare("INSERT INTO cadresponsavel ( codpaciente, nomer, emailr, senhar, foner, datanascr)
                                    VALUES ( ?, ?, ?, ?, ?, ?)");
                if ($sql->execute(array($emailr, $nomer, $foner, $senhar, $datanascr))){
                $msgErr = "Dados cadastrados com sucesso!";
                header("location: login.html");  
                } else {
                $msgErr = "Dados não cadastrados!";
                };
            };
          };                    

    }
?>

<!DOCTYPE html>
<html lang='pt-br'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0'>
        <title>Sr. & Sra. Bem Estar - Index</title>

        <meta name='description' content='Sr. Bem Estar'>
        <meta name='keywords' content='HTML, CSS, JavaScript, Personal, Website, _gustavoaap, @_gustavoaap, gustavoaap, @elseif, elseif, Museu, Informática, Museu de Informatica, lincoln.ey__, @lincoln.ey__, pvd.lincolnsss, @pvd.lincolnsss'>
        <meta name='author' content='elseif & zFunction'>
        
        <!-- logo -->
        <link rel='shortcut icon' href='..assets/gfx/logo.png' type='image/x-icon'>

        <!-- css -->
        <link rel='stylesheet' href='..assets/style/global.css'>

        <!-- icon's -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css'>
    </head>
    <body>

        <!-- navbar -->
        <nav class='navbar'>
            <div class='navbar-container'>
                <div class='navbar-logo'>
                    <a href='#'>
                        <img src='..assets/gfx/logo.png' alt=''>
                    </a>
                </div>
                <div class='navbar-toggle' id='mobile-menu'>
                    <span class='bar'></span>
                    <span class='bar'></span>
                    <span class='bar'></span>
                </div>
                <ul class='navbar-menu'>
                    <li class='navbar-item'>
                        <a href='index.html' class='navbar-links active'>Inicio</a>
                    </li>
                    <li class='navbar-item'>
                        <a href='about.html' class='navbar-links'>Sobre</a>
                    </li>
                    <li class='navbar-item'>
                        <a href='contact.html' class='navbar-links'>Contato</a>
                    </li>
                    <li class='navbar-item icons'>
                        <a target='_blank' href='https://www.facebook.com'><i class='fa-brands fa-facebook'></i></a>
                        <a target='_blank' href='https://www.instagram.com'><i class='fa-brands fa-instagram'></i></a>
                        <a target='_blank' href='https://www.youtube.com'><i class='fa-brands fa-youtube'></i></a>
                        <a target='_blank' href='https://www.twitter.com'><i class='fa-brands fa-twitter'></i></a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- main -->
        <div class='main-1'>
            <div class='container'>
                <h1 class='title'>
                    Seja bem vindo(a) ao <span>Sr. & Sra. Bem Estar</span>
                </h1>
            </div>
        </div>


        <!-- formulario -->
        <div class='main-form'>
            <h2>Cadastre-se aqui!</h2>
            <div class='form-container'>
                <form class='form' id='cadusuario' action='' method='POST'>
                    <div class='form-group' class='form-group'>
                        <label for=''>Nome do completo do responsável: <span>*</span></label>
                        <input type='text' required id='nomer' name='nomer'>
                    </div>

                    <div class='form-group'>
                        <label for=''>Número de telefone do responsável: <span>*</span></label>
                        <input type='text' maxlength='11' required id='foner' name='foner'> 
                    </div>

                    <div class='form-group'>
                        <label for=''>Data de nascimento do responsável: <span>*</span></label>
                        <input type='text' max='105' maxlength='10' required id='datanascr' name='datanascr'>
                    </div>

                    <div class='form-group'>
                        <label for=''>Email do responsável: <span>*</span></label>
                        <input type='email' required id='emailr' name='emailr'>
                    </div>

                    <div class='form-group'>
                        <label for=''>Senha: <span>*</span></label>
                        <input type='password' required id='senhar' name='senhar'>
                    </div>

                    <div class='form-group'>
                        <input type='submit' required value='Cadastre-se' name='cadusuario'>
                    </div>

                    <div class='form-group'>
                        <p>Já tem uma conta? <a href='login.html'>Clique aqui!</a></p>
                    </div>
                </form>
            </div>
        </div>

        <!-- footer -->
        <footer class='footer'>
            <div class='footer-container'>
                <div class='f-1'>
                    <div class='footer-content'>
                        <img src='..assets/gfx/logo.png' alt=''>
                    </div>
                    <div class='footer-content'>
                        <a href='#'>
                            <i class='fa-brands fa-instagram'></i>
                        </a>
                        <a href='#'>
                            <i class='fa-brands fa-youtube'></i>
                        </a>
                        <a href='#'>
                            <i class='fa-brands fa-facebook'></i>
                        </a>
                        <a href='#'>
                            <i class='fa-brands fa-twitter'></i>
                        </a>
                        <div class='footer-i'>
                            <div>
                                <p>Team - @elseif (Gustavo) | @function (Lincoln)</p>
                            </div>
                            <div>
                                <p>Team - @# (Ash) | @isadoralb (Maria)</p>
                            </div>
                        </div>
                        <div class='footer-i'>
                            <div>
                                <p>Website developed by - <a target='_blank' href='https://github.com/drypzz'>@elseif</a> | <a target='_blank' href='https://github.com/function404'>@function</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class='f-1'>
                    <p>Copyright © 2022 - <span style='color: #fff;' id='date'></span>. Todos os direitos reservados.</p>
                </div>
            </div>
        </footer>

        <!-- javascript -->
        <script src='..assets/javascript/global.js'></script>
    </body>
</html>