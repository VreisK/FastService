<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastService</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="icon" href="imagens/logoatual.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>

<?php

include "headerlogado.php";
    if(isset($_POST['deletar'])){
        $deletar = $model->deletar($_SESSION['idUsuario']);
        if($deletar == true){
            echo "<script>alert('Conta deletada com sucesso');</script>";
            session_destroy();
			header('Location:login.php');
        }else{
            echo "<script>alert('Erro');</script>";
        }
    }
    $usuario = $model->usuario($email);
    if ($usuario['caminho'] == null) {
        $imagem = "<img src='imagens/perfilsemfoto.jfif' alt=''>";
    } else {
        $imagem = "<img src=' ". $usuario['caminho']."' alt=''>";
    }    
?>
 
 <div class="divCentral">
 <section id="conta">

    <h1>Perfil</h1>

    <div class="paiConta">
        <div class="maeConta">
        <div class="fotoConta">
            <?php echo $imagem?>
            <div class="infoConta">
            <h1><?php echo $_SESSION['nome']?></h1>
        <p><i class="fa-solid fa-location-dot"></i><?php echo $_SESSION['estado'].','.$_SESSION['cidade']?></p>
        </div>
        </div>
        </div>

        <div class="topicosConta">
          <a href="alterarfoto.php"><button>Editar Foto</button></a>
          <a href="editperfil.php"><button>Editar perfil</button></a>
          <a href="alterarSenha.php"><button>Alterar senha</button></a>
          <a href="report.php"><button>Fale conosco</button></a>
          <a href="#" class="btnFavoritos"> <button  id="btnTeste">Favoritos</button></a>
            <div class="btnExcluir">
              <form action="" method="post">
                <button id="btnExcluir" name="deletar">Deletar conta</button>
            </form>
            </div>
        </div>
    </div>

   

 </section>
 </div>

<?php
include "footerlogado.php";
?>
<script src="js/darkmode.js"></script>
<script src ="js/desenvolvimento.js"></script>
<script src="js/menu.js"></script>
</body>
</html>