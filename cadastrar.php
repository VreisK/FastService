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
    <title>Cadastrar</title>
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
                    $cadastro = $model-> cadastro();
                ?>
                <form action=""  method="post">   <!-- adicionar um direcionamento para os dados do usuario em action -->
                <div id="tituloCadastro"><h1>Cadastro</h1></div>
                <div class="central">
                    <div><input required type="text" placeholder="Nome completo" name="nome" id="nomeCompleto" maxlength="50"></div>
                    <div><input required type="tel" id="telefone"placeholder="Telefone"name="telefone"></div>
                    <div>
                   <label for="dataNasc">Data nascimento</label>  <input required type="date" id="dataNasc"name="dataNasc"></div>
                    <div>
                        <label for="genero">Gênero:</label>
                        <label for="genero"><input type="radio" name="genero" value="feminino">Feminino
                        <input type="radio" name="genero" value="masculino" checked>Masculino
                        <input type="radio" name="genero" value="outro">Outro</label>
                        
                    </div>
                    <div class="local_formulario"> 
                        <div class="cidade_estado">

                            <label for="local_opcoes">Localização:</label>
                            
                            <select name="estado" id="uf" required>
                         <option value="">Selecione o Estado</option>
                       
                          </select>   
                        
                            <select name="cidade" id="cidade" required>
                            <option value= "" class="naoOpcao">Cidade</option>
                            
                        </select>
                        </div>
                    </div>
                    <div><input type="email" placeholder="Email"name="email" required id="emailCadas" maxlength="50"></div>

                    <div><input type="password" id="senhaCadas" placeholder="Crie uma senha"name="senha" required  onKeyUp="verifyPass()" onKeyDown="verifyPass()"  maxlength="20">

                        <div class="listSenha">
                            <ul>
                                <li>
                                    <p class="feed">Mínimo de caracteres:8</p>
                                </li>
                                <li>
                                    <p class="feed">Letras maiscúla</p>
                                </li>
                                <li>
                                    <p class="feed">Número</p>
                                </li>
                                <li>
                                    <p class="feed">Caracter especial : @#.,$%&*!?</p>
                                </li>
                            </ul>
                        </div>
                    
                    </div>
                    
                </div>
                <div ><button disabled id="btnCadastro" type="submit" name="submit">Cadastrar</button></div> <!-- quando clicar no botao aparecer alert deq foi cadastrado -->
                <div class="mensagem"><p>Informações adicionadas no cadastro poderão ser modificadas depois!</p></div>
                </form>
                </div>
            </div>
        </div>
    </section>

    <?php
    include "footer.php";
    ?>
    <script src="js/app.js"></script>
    <script src="js/validacao.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="js/desenvolvimento.js"></script>
                    <script>
          $('#telefone').mask('(00) 00000-0000');
                    </script>

</body>
</html>