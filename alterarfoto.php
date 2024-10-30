<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="imagens/logoatual.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;400;700&display=swap" rel="stylesheet">
    <title>Editar Foto</title>
</head>
<body>
    
    <?php
         include "headerlogado.php";
         if(isset($_FILES['arquivo'])){
            $arquivo = $_FILES['arquivo'];
            $model->EditarFoto($arquivo);
      
        }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="arquivo" id="">
        <button name="acao">Enviar</button>
    </form>
    <script src="js/menu.js"></script>
    <script src="js/desenvolvimento.js"></script>
</body>
</html>
