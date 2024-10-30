<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastService</title>
  <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="icon" href="imagens/logoatual.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<?php
    include "headerlogado.php";
    if(!isset($_REQUEST['idUsuario'])){
        echo "<script>alert('Usuario invalido');window.location.href='home.php';</script>";
    }
    $id = $_REQUEST['idUsuario'];
    $teste = $model ->anuncioAutor($id);
    $nomeUsuario = $model -> nomeUsuario($id);
    $nome = $_SESSION['nome'];
    if($teste == null){
        echo "<script>alert('Perfil Sem Anuncio Disponivel');window.location.href='home.php';</script>";
    }
?>

    
    
        <section id="paiPub">
    
        <div class="div1publi">

            <h1>Anúncios de <?php echo $nomeUsuario['nome']?></h1>
        </div>
    
            <div class="paiBusca">
               
            <?php  foreach($teste as $key):?>
                <a href="anuncio.php?ID_anuncio=<?=$key['ID_anuncio'];?>">
                <div class="buscas">
                    <div class="imgBusca">
                        <img src="<?=$key['caminho'];?>" alt="">
                    </div>
                    <div class="busca">
                        <h1><?=$key['titulo'];?></h1>
    
                        <div class="inforbusca">
                            <p>Entrega a domicílio:<?=$key['entrega'];?></p>
                            <p>preço: R$<?=$key['preco'];?></p>
                            <p>Descrição:<?=$key['descricao'];?></p>
                            <p>Categoria:<?=$key['categoria'];?></p>
                        </div>
                    </div>
                </div>
                </a>
                <?php endforeach  ?>


            </div>
    
        </section>
</div>

    <?php
        include "footerlogado.php";
    ?>

<script src="js/desenvolvimento.js"></script>
<script src="js/menu.js"></script>
</body>
</html>