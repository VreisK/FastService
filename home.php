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
    <script src="https://use.fontawesome.com/releases/v5.0.6/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="icon" href="imagens/logoatual.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    
    <?php
        include "headerlogado.php";
        $teste = $model -> pegarAnuncio($id);
        $listUsuario = $model->listUsuarios();
        //var_dump($listUsuario);
    ?>  
    
  

 


<div class="divCentral">
   <div id="botaoAnun">
       
        <a href="publicar.php"><button id="publi">Publicar</button></a>
      
       
</div>


    <section class="foto">
        <img src="imagens/muiecellcanva.png" alt="">
    </section>

    <div class="anuncios">


        <h3>Anúncios recentes</h3>



        <div class="boxAnuncios">
  <?php  foreach($teste as $key): ?>
    <a href="anuncio.php?ID_anuncio=<?=$key['ID_anuncio'];?>">
            <div id="anuncio">
            <div class="imgDoAnuncio">    
            <img src="<?=$key['caminho'];?>" alt="" id="imagemDoAnuncio">
            </div>
                
            <div class="maeAnuncio">
                
                    <div class="paiTitulo">
                    <p id="tituloAnuncio"><?=$key['titulo'];?></p>
                  
                    </div>
                    
                  <div class="informacoesAnununcios">
                    <p><?=$key['nome'];?></p>
                    <p><?=$key['estado'];?>,<?=$key['cidade'];?></p>
                
                    <p> Valor: R$<?=$key['preco'];?></p>
                    </div>
                    </div>         
            </div> 
            </a> 
            <?php endforeach  ?>
            </div>
            <div class="btnVermais">
            <a href="anuncios.php?page=1&estado=&cidade="><button id="btnVermais">Ver mais</button></a>
            </div>
          

    </div>


    <div class="perfil">

    <h3>Perfis comprometidos</h3>
    
   <div class="paiAnuncio">
   <?php  foreach($listUsuario as $key): ?>
   
    <div class="maePerfil">
    <a href="anuncioUsuarios.php?idUsuario=<?=$key['idUsuario'];?>">
        <div class="fotoPerfil">
            <?php if($key['caminho'] == null){
                $key['caminho'] = 'imagens\perfilsemfoto.jfif';
                }
                ?>

            <img src="<?=$key['caminho'];?>" alt="">
        </div>
        <div class="desPerfil">
            
                <p id="tituloPerfil"><?=$key['nome'];?></p>
                <p ><?=$key['telefone'];?></p>
                <p >Quantidade anuncios :<?=$key['quantidade_anuncio'];?></p>
                <p><?=$key['estado'];?>,<?=$key['cidade'];?></p>
               
            
        </div>
    </div>
   </a>
    <?php endforeach  ?>
</div>
    </div>


    <div class="categorias">

    <h3>Categorias mais buscadas</h3>

    <div class="maeCategoria">
        <a href="categoriaAnuncios.php?categoria=construção&page=1&estado=&cidade=">
        <div class="bordaAzul">
            <p>Construção</p>
        </div>
        </a>
      
        <a href="categoriaAnuncios.php?categoria=comida&page=1&estado=&cidade=">  <div class="bordaAzul">
            <p>Comida</p>
        </div></a>
        <a href="categoriaAnuncios.php?categoria=Trabalho doméstico&page=1&estado=&cidade="> 
        <div class="bordaAzul">
            <p>Trabalho doméstico</p>
        </div>
        </a>
        <a href="categoriaAnuncios.php?categoria=trabalho de cuidado&page=1&estado=&cidade="> <div class="bordaAzul">
            <p>Trabalho cuidado</p>
        </div></a>

    </div>
    </div>
</div>
    <?php
        include "footerlogado.php";
 ?>
 
<script src="https://kit.fontswesome.com/998c60ef7.js" crossorigin="anonymous"></script>
<script src="js/desenvolvimento.js"></script>
<script src="js/menu.js"></script>
</body>
</html>