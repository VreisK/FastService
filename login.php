<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="imagens/logoatual.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<?php
    include "header.php";
    ?>

<section>
        <div class="containerCadastro">
            <div class="formulario_caixa">
               <div class="formulario">
               <?php
                    require_once 'model.php';
                    $model = new Model();
                    $protegido = $model -> proteger();
                    if($protegido == true){
                        header("Location:home.php");
                    }
                    $login = $model-> login();
                ?>
                <form action="" method="post"> 
                <div id="tituloLogin">
                    <h1>Login</h1>
                    <p>Digite os dados de acesso nos campos abaixo.</p>
                </div>
                <div class="central">
                    <div>
                    <label for="email">Email</label>
                    <input type="email" required name="email"></div>
                    <label for="senha">Senha</label>
                    <input type="password" required name="senha">
                    <p id="esqueSenha">Esqueceu sua senha?</p>
                </div>
                <div><button type="submit" name="submit" class="botaoLogin">Entrar</button></div>
                </form>
                </div>
            </div>
        </div>
    </section>

    <?php
    include "footer.php";
    ?>
</body>
</html>