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


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <?php
    
        include "headerlogado.php";
    if(isset($_REQUEST['ID_anuncio'])){
        echo "<script>alert('Anúncio excluido');</script>";
        $model -> deletarAnuncio($_REQUEST['ID_anuncio']);
      
    }
        $id = $_SESSION['idUsuario'];
        $teste = $model -> anuncioAutor($id);   
        if($teste == null){
            $quantidadeLinhas = 0;
        }else{
        $quantidadeLinhas = count($teste);
        }
        if(isset($_POST['submit']) && isset($_FILES['caminho'])){
            if(isset($_POST['titulo']) && isset($_POST['preco']) && isset($_POST['categoria']) 
            && isset($_POST['categoria'])  && isset($_POST['entrega'])  && isset($_POST['descricao']) && isset($_FILES['caminho'])){
                if(!empty($_POST['titulo']) && !empty($_POST['preco']) && !empty($_POST['categoria']) 
                && !empty($_POST['categoria'])  && !empty($_POST['entrega'])  && !empty($_POST['descricao']) && !empty($_FILES['caminho'])){
                    $titulo = $_POST['titulo'];
                    $preco = $_POST['preco'];
                    $categoria = $_POST['categoria'];
                    $entrega = $_POST['entrega'];
                    $descricao = $_POST['descricao'];
                    $caminho = $_FILES['caminho'];
                    $idUsuario = $_SESSION['idUsuario'];
                  
                
                    $model-> publicarAnuncio($titulo,$preco,$categoria,$entrega,$descricao,$caminho,$idUsuario);
                }
            }
        }

       
          
        
    ?>
    <div class="divCentral">
    <div class="divCentral">
        <section id="publicar">
           <h1>Publicar</h1>
        
            <div class="paiPublicar">
        
            <form action="" method="post" enctype="multipart/form-data">
              <div class="paiInput">
                  <div class="inputPublicar">
                  <p>Título</p>
                    <input type="text" name="titulo" required maxlength="30">
                    </div>
                  <div class="inputPublicar">
                        <p>Preço</p>
                        <input type="tel" name="preco" id="precoAnuncio" required>
                    </div>
              </div>
        
              <div class="paiInput">
                <div class="inputPublicar">
                <p>Categoria</p>
                <select name="categoria" id="categoriaAnuncio" required>
                    <option value="" selected disabled hidden>Selecione uma opção</option>
                    <option value="construção">Construção</option>
                    <option value="trabalho de cuidado">Trabalho de cuidado</option>
                    <option value="comida">Comida</option>
                    <option value="Trabalho doméstico">Trabalho doméstico</option>
                    <option value="outros">Outros</option>
                </select> 
                
               
        
                </div>
                <div class="inputPublicar">
                    <p>Entrega a domicílio</p>
        
                    <div class="maeRadio">
                        <div class="paiRadio">
                        <label for="sim">Sim</label>
                                 <input type="radio" name="entrega" value="Sim" id="sim" >
                                     </div>
                                <div class="paiRadio">
                                    <label for="nao">Não</label>
                                    <input type="radio" name="entrega" value="Nao" id="nao" checked>
                                       </div>
                    </div>
                </div>
                </div>
                <div class="paiInput">
                  <div class="inputPublicar">
                        <p>Descrição</p>
                        <input type="text" required name="descricao" id="descricao"  maxlength="100">
                    </div>
                  <div class="inputPublicar">
                        <p>Foto</p>
                        <input type="file" name="caminho" required accept="image/*">
                    </div>
              </div>
              <div class="paiBtnpublicar">
                  <button id="btnPublicar" name="submit">Enviar</button>
                </form>
               
              </div>
        
            </div>
        
        </section>
        <section id="minhasPublis">
            <h1>Minhas Publicações</h1>
            <div class="paiPubli">
               <div class="tituloPubli">
                <h3>Publicados (<?php echo $quantidadeLinhas?>)</h3>
               </div>
               <div class="msgPubli">
               <?php  if($quantidadeLinhas > 0){foreach($teste as $key):?>
            
                    <div class="paiMeusAnuncios">
                      
                        <div class="maeMeusAnuncios">   
                    <div class="imgMeusAnuncios">
                            <img src="<?=$key['caminho'];?>" alt="">
                        </div>

                    <div class="paiTeste">
                        
                        <div class="tituloMeusAnuncios">
                            <h1><?=$key['titulo'];?></h1>
                            </div> 

                        <div class="informacoesMeusAnuncios">
                            
                    
                           <p>Valor:R$<?=$key['preco'];?></p>
                           <p id="descPublica">Descrição:<?=$key['descricao'];?></p>  
                             
                        </div>
                      
                        
                        <div class="btnExcluirAnuncio">
                       
                        
                        <a href="?ID_anuncio=<?=$key['ID_anuncio'];?>">
                            <button name=<?=$key['ID_anuncio'];?>>Excluir</button>
                            </a>
                             
                            
                        </div>
                      
                       
                       

                        </div>
                        </div>
                        <?php endforeach;}else{
                            echo "<p>Sem Anúncios</p>";
                        }?> 
                    </div>
               </div>
               
            </div>
           
    </div>
    </div>
                        
                  
  
    </section>  
    <?php
        include "footerlogado.php";
    ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="js/desenvolvimento.js"></script>
                  

    <script src="js/menu.js"></script>
</body>
</html>