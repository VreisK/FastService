<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imagens/logoatual.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    <title>FastService</title>
</head>
<body>
    <?php
       include "headerlogado.php";
        if(isset($_POST['Alterar'])){
            if(isset($_POST['senhaconfirmamento'] ) && isset($_POST['confirmacaoEmail'] ) && isset($_POST['confirmacaoSenha'] )){
                if(!empty($_POST['senhaconfirmamento']) && !empty($_POST['confirmacaoEmail']) && !empty($_POST['confirmacaoSenha'])){
                    if($_POST['confirmacaoEmail'] == $_SESSION['email'] && $_POST['confirmacaoSenha'] == $_SESSION['senha']){
                    $data = [
                        'idUsuario' => $_SESSION['idUsuario'],
                        'senha' => $_POST['senhaconfirmamento']
                    ];
                    $senhaAlterar = $model->alterarSenha($data);
                    if($senhaAlterar){
                        $_SESSION['senha'] = $data['senha'];
                        echo "<script>alert('Senha alterada');</script>";
                        header("Location:home.php");
                    }else{
                        echo "<script>alert('erro');</script>";
                    }
                }else{
                    echo "<script>alert('Email ou senha errada');</script>";
                }
                   
                }
            }
        }
  
    ?>

    <div class="divCentral">
     <section class="sectionAlterar">
        <div class="containerAlterar">
            <div class="tituloAlterarSenha">
            <h3>Alterar Senha</h3>
            </div>
       
        <div class="divTudoAlterar">
            <div class="alterar">
            <form action="" method="post">          
                <label for="confirmacao">Para realizar a alteração, digite seu email e senha atual:</label>
                <input type="email"  placeholder="Email" name="confirmacaoEmail" id="velhoemail" required>
                <input type="password" name="confirmacaoSenha" placeholder="Senha" required id="senhaConfirm">
            
            </div>
            <div class="mudanca">
                <input type="password" required name="senhaconfirmamento" placeholder="Digite nova senha" onKeyUp="verifyPass()" onKeyDown="verifyPass()">
                <div class="listSenha">
                            <ul>
                                <li>
                                    <p class="feed">Número de caracters : minimo 8</p>
                                </li>
                                <li>
                                    <p class="feed">Letras maiscúlas</p>
                                </li>
                                <li>
                                    <p class="feed">Números</p>
                                </li>
                                <li>
                                    <p class="feed">Caracter especial :  @#.,$%&*!?</p>
                                </li>
                            </ul>
                        </div>
                    
            </div>
             <button type="submit"disabled name="Alterar" id="alterar">Alterar</button></form>
        </div>
      </div> 
     </section>
    </div>

    <?php
        include "footerlogado.php";
    ?>

    <script src="js/validacao2.js"></script>
    <script src="js/menu.js"></script>
    <script src="js/desenvolvimento.js"></script>
</body>
</html>