<!DOCTYPE html>
<html lang="en">
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
        
        $id = $_REQUEST['ID_anuncio'];
        //echo $id;
        $teste = $model -> anuncioEspecifico($id);
        $comentarios = $model -> comentarios($id);
        if(isset($_POST['Enviar'])){    
           $comentar = $model -> comentar($_POST['comentario'],$id,$_SESSION['idUsuario'],$_POST['Avaliação']);
        }
        if(isset($_POST['chat'])){
         //  $chat = $model -> conversar($id);
        $Usuario = $teste[0]['idUsuario'];
            $começarChat = $model -> ComeçarChat($_SESSION['idUsuario'],$Usuario);
            echo "<script>window.location.href='chat.php?Usuario=$Usuario';</script>";
        }

    ?>
  <section id="botaoAnun">
        <a href="publicar.php"><button id="publi">Publicar</button></a>
    </section>

    <section id="clickAnuncio">
    <?php  foreach($teste as $key): ?>
        <div class="imgDoAnuncio">
            <div class="tituloClick">
            <h1><?=$key['titulo'];?></h1>
            </div>
            <div class="imgClick">
            <img src="<?=$key['caminho'];?>" alt="">
            </div>       
        </div>
        
        <div class="descAnuncio">
            <div class="detalhesAnuncio">
                <div class="detalhes2">
                    <h1>Descrição</h1>
                    <p><?=$key['descricao'];?></p>
                </div>
            </div>
         <div class="perfilAnuncio">
                <div class="informacoesPerfil">
                    <p>Fale com o prestador</p>
                    <h1><?=$key['nome'];?></h1>
                    <div class="caixaBtnChat">
                        <form action="" method="post">
                       <button name="chat" id="btnChat2">Chat</button>
                       </form>
                    </div>
                   
                </div>
         </div>   
        </div>

            <div class="maisInformacoes">
                <div class="asInformacoes">
                    <h5>Telefone : <?=$key['telefone'];?></h5>
                    <h5>Categoria : <?=$key['categoria'];?></h5>
                    <h5>Preço : R$<?=$key['preco'];?></h5>
                    <h5>Localização  : <?=$key['estado'];?>,<?=$key['cidade'];?></h5>

                </div>
            </div>
            <?php endforeach  ?>




        <section id="comentarios">
            <div class="tituloComentarios">
              <h1>Comentarios</h1>
            </div>
          
        <form action="" method="post">
            <div class="maeComentarios">
                <div class="filhaComentarios">
                    <div class="avaliacoesComentarios">
                            <h5>Avaliação :</h5>
                            <div class="testeComentarios">
                            <label for="excelente">Excelente</label>
                                 <input type="radio" name="Avaliação" value="Excelente" checked id="sim" class="hidden-radio">
                            </div>
                           <div class="testeComenarios">
                           <label for="otimo">Otimo</label>
                                 <input type="radio" name="Avaliação" value="Otimo" id="sim" class="hidden-radio">
                           </div>
                           <div class="testeComenarios">
                           <label for="bom">Bom</label>
                                 <input type="radio" name="Avaliação" value="Bom" id="sim" class="hidden-radio">
                           </div>
                           <div class="testeComenarios">
                           <label for="regular">Regular</label>
                                 <input type="radio" name="Avaliação" value="Regular" id="sim" class="hidden-radio">
                           </div>
                           <div class="testeComenarios">
                           <label for="ruim">Ruim</label>
                                 <input type="radio" name="Avaliação" value="Ruim" id="sim" class="hidden-radio">
                           </div>
                              
                    </div>
                  
                    <div class="comentarioComentarios">
                                    <h5>Digite o comentário :</h5>
                                    <input type="text" name="comentario" required  maxlength="200">
                                 </div>
                                 <div class="btnComentarios">
                                    <button name="Enviar">Enviar</button>
                                 </div>
                </div>
                </form>

                <div class="maeTodosComentarios">
                
                <?php if($comentarios != null) foreach($comentarios as $key):?>
                <div class="todosComentarios">
                    <div class="descricaoComentario">
                        <ul>
                            <li><?php echo $key['nome'];?></li>
                            <li><?php echo $key['avaliacao'];?></li>
                            <li><?php echo $key['comentario'];?></li>
                        </ul>
                    </div>
                </div>
                <?php endforeach  ?>
                

                </div>
              
            </div>

        </section>



    </section>


<?php
        include "footerlogado.php";
 ?>
<script src="js/desenvolvimento.js"></script>
<script src="js/menu.js"></script>
</body>
</html>