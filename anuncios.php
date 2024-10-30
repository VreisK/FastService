<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FastService</title>
  <link rel="stylesheet" href="css/estilo.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="icon" href="imagens/logoatual.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

<?php
    include "headerlogado.php";
    $page = null;
    $numeroPagina = 1;
    $anuncios = null;
  
 
    if(isset($_REQUEST['page'])){
        $page = $_REQUEST['page'];
        $numeroPagina = $_REQUEST['page'];
    }
    if(isset($_REQUEST['cidade']) && isset($_REQUEST['estado'])){
        if($_REQUEST['cidade']!= '' && $_REQUEST['estado'] != ''){
        $cidade = $_REQUEST['cidade'];
        $estado =$_REQUEST['estado'];
        $anuncios = $model -> anunciosEstado($cidade,$estado,$page);
        if($anuncios == null){
            $anuncios = $model -> anunciosEstado($cidade,$estado,1);
        }
        $paginacao = $model -> paginacaoEstado($estado,$cidade);
        }else{
        $cidade = '';
        $estado = '';
        }
    }
    if($anuncios == null){
    $anuncios = $model -> todosAnuncios($page);
    $paginacao = $model -> paginacao();
    }
    if(isset($_POST['filtro'])){
        if(isset($_POST['estado']) && isset($_POST['cidade'])){
            if($_POST['estado'] != '' && $_POST['cidade'] != ''){
                $cidade = $_POST['cidade'];
                $estado = $_POST['estado'];
                 
                $anuncios = $model -> anunciosEstado($cidade,$estado,1);
                $paginacao = $model -> paginacaoEstado($estado,$cidade);
                
                if($anuncios == null){
                    echo "<script>alert('Não existe anuncio nessa região');window.location.href='home.php';</script>";
                }
            }
        }
    }   

    if($anuncios == null){
        echo "<script>alert('Não existe anuncio');window.location.href='home.php';</script>";
    }

?>

    
    
        <section id="paiPub">
    
        <div class="div1publi">
           <h1>Todos Anúncios</h1>
        </div>
        <form action="" method="post">
            <div class="maeFiltro">
            <select name="estado" id="uf">
                <option value="">Selecione o Estado</option>
                </select>

                <select name="cidade" id="cidade" >
                <option value= "" class="naoOpcao">Cidade</option>
                <input type="submit" name="filtro" value="Filtrar"id="btnFiltrar">
            </select>
            </div>
          
        </form>
            <div class="paiBusca">
               
            <?php  foreach($anuncios as $key):?>
                <a href="anuncio.php?ID_anuncio=<?=$key['ID_anuncio'];?>">
                <div class="buscas">
               
                    <div class="imgBusca">
                        <img src="<?=$key['caminho'];?>" alt="">
                    </div>
                    <div class="busca">
                        <h1><?=$key['titulo'];?></h1>
    
                        <div class="inforbusca">
                          
                            <p><?=$key['estado'];?>,<?=$key['cidade'];?></p>
                            <p><?=$key['telefone'];?></p>
                            <p><?=$key['nome'];?></p>
                            <p><?=$key['descricao'];?></p>
                        </div>
                    </div>
                </div>
                </a>
                <?php endforeach  ?>


            </div>
    
        </section>
</div>
    
    <?php
        include "Paginação.php";
        include "footerlogado.php";
    ?>
<script src="js/app.js"></script>
<script src="js/desenvolvimento.js"></script>
<script src="js/menu.js"></script>
</body>
</html>