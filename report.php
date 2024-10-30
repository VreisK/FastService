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
    include "headerlogado.php"
?>

<section id="report">
    <form action="https://formsubmit.co/fastservicesenai@gmail.com" method="post">

    
        <h1>Fale conosco</h1>
 
<div id="reportMae">
    
<div class="centralReport">
    
    <div class="inputsRep">
        <input type="email" placeholder="Digite um email para contato" required id="emailReport" name="email">
        <div id="inputMotivo">
        <label for="motivo">Motivo</label>
        <select name="motivo" id="motivo"required >
            <option value="">Selecione o motivo</option>
            <option value="denúncia">Denúnica</option>
            <option value="feedback">Feedback</option>
            <option value="reclamação">Reclamação</option>
            <option value="Dúvida">Dúvida</option>
        </select>
        </div>
        <input type="text" placeholder="Escreva sua mensagem" id="descReport" name="messagem" required>
        <div class="btnReport">
            <button id="enviarReport">Enviar</button>
        </div>
 </div>
        
</div>
</div>
</form>
</section>

<?php
    include "footerlogado.php"
?>
<script src="js/desenvolvimento.js"></script>
<script src="js/menu.js"></script>
</body>
</html>