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
    require_once 'model.php';
    $model = new Model();
    $id = $_SESSION['idUsuario'];
    $row = $model->edit($id);
    if(isset($_POST['alterar'])){
        if(isset($_POST['nome']) && isset($_POST['telefone']) && isset($_POST['dataNasc']) && isset($_POST['genero']) && isset($_POST['cidade']) &&  isset($_POST['estado'])){
            if(!empty($_POST['nome']) && !empty($_POST['telefone']) && !empty($_POST['dataNasc']) && !empty($_POST['genero']) && !empty($_POST['cidade']) &&  !empty($_POST['estado'])){
                $data = [
                    'idUsuario' => $id,
                    'nome' => $_POST['nome'],
                    'telefone' => $_POST['telefone'],
                    'dataNasc' => $_POST['dataNasc'],
                    'genero' => $_POST['genero'],
                    'cidade' => $_POST['cidade'],
                    'estado' => $_POST['estado']
                ];
                
                $atualizar = $model->atualizar($data);
                if($atualizar === true){
                    $_SESSION['idUsuario'] = $data['idUsuario'];
					$_SESSION['nome'] = $data['nome'];
					$_SESSION['cidade'] = $data['cidade'];
					$_SESSION['estado'] = $data['estado'];
                    header("Location:home.php");
                }
            }
        }
    }
?>

    <section id="editPer">

    <div class="tituloEdit">
    <h1>Perfil</h1>
     </div>
     <form action="" method="post">
       <div class="maeEdit">
        <div class="paiEdit">
       
       
            <input required type="text" placeholder="Nome completo" value="<?php echo $row['nome'];?>" name="nome">

            <select name="estado" id="uf">
            <option value="">Selecione o Estado</option>

            </select>   

            <select name="cidade" id="cidade" required>
            <option value= "" class="naoOpcao">Cidade</option>

            </select>
            <input required type="tel" value="<?php echo $row['telefone'];?>" placeholder="(99)99999-9999"name="telefone" id="telefoneEdit"  pattern="(\([0-9]{2}))([9]{1})?([0-9]{5})-([0-9]{4})">
            <input required type="date" placeholder="Data de nascimento"name="dataNasc" value="<?php echo $row['dataNasc'];?>">
            <label for="genero">Gênero:</label>
            <div class="paiGeneros">
            <label for="genero"><input type="radio" name="genero" value="feminino"<?php if ($row['genero'] == 'feminino') echo 'checked'; ?>>Feminino
            <input type="radio" name="genero" value="masculino"<?php if ($row['genero'] == 'masculino') echo 'checked'; ?>>Masculino
            <input type="radio" name="genero" value="outro" <?php if ($row['genero'] == 'outro') echo 'checked'; ?>>Outro</label>
            </div>
            <div class="btnEdit">
                <button name="alterar">Alterar</button></a>
            </div>
        </div>
          
       </div> 
       </form>
    </section>

    <?php
include "footerlogado.php";
?>
<script src="js/app.js"></script>
<script src="js/desenvolvimento.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script>
          $('#telefoneEdit').mask('(00) 00000-0000');
                    </script>
                    <script src="js/menu.js"></script>
</body>
</html>