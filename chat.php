<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastService</title>
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v5.0.6/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="icon" href="imagens/logoatual.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        a{
            color:black;
            text-decoration: none;
        }
        #chatGeral{
        display: flex;
        align-items: center;

        }

      
        
        #chatConversa > #inputChat{
            margin-top: auto;

        }
    </style>
</head>
<body>
    <?php include 'headerlogado.php';
        $usuariosChat = $model -> UsuariosConversa($_SESSION['idUsuario']);
        if(isset($_GET['Usuario'])){
            $UsuarioMensagem = $_GET['Usuario'];
            $mensagens = $model -> Conversa($_SESSION['idUsuario'],$UsuarioMensagem);
        }

        if(isset($_POST['submit'])){
            $conversa = $_POST['conversa'];
            $enviarMensagem = $model -> EnviarMensagem($_SESSION['idUsuario'],$UsuarioMensagem,$conversa);
            if($enviarMensagem){
                echo "<script>window.location.href='chat.php?Usuario=$UsuarioMensagem';</script>";
            }else{
                echo "<script>alert('ERRO');window.location.href='chat.php?Usuario=$UsuarioMensagem';</script>";

            }
        }

    ?>
    <div id="chatGeral">
  
        <div id="ChatPerfil">
        <?php
            if($usuariosChat != null){  
                foreach($usuariosChat as $user){
                    if($_SESSION['idUsuario'] == $user['menorID']){
                        $usuario = $model->edit($user['maiorID']); 
                    }else{
                        $usuario = $model->edit($user['menorID']); 
                    }
            ?>
                    <a href="chat.php?Usuario=<?=$usuario['idUsuario']?>">
                        <div class="UsuariosPerfil">
                            <h1><?= $usuario['nome']?></h1>
                            <img src="<?=$usuario['caminho']?>" alt=""  class="ChatimagemPerfil">
                        </div>
                    </a>
            <?php
                }
            } else {
                echo "<p>Nenhuma Conversa Iniciada</p>";
            }
            ?>
        </div>

       <?php  if(isset($_GET['Usuario'])):
        ?>
       
            <div id="inputChat">
                <div class="conversarChat">
                <?php  foreach($mensagens as $mensagem):
                ?>
                    <p><?=$mensagem['nome']?>: <?=$mensagem['conversa']?></p>
                <?php endforeach; ?>
                </div>
          
                <form action="" method="post">
            <div class="inputChat">
            <input type="text" name="conversa" id="chat" placeholder="Digite uma mensagem">
            <button name="submit"><i class="fa-regular fa-paper-plane"></i></button>
            </div>        
           
            </form>
            </div>
        </div>
       <?php else:?>
        <p>Bem vindo ao FastService CHAT</p>
        <?php endif;?>
        
  <?php include "footerlogado.php";?>
    
    

</body>
</html>