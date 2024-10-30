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
include "header.php";
?>

<div class="divCentral">
    <div class="opa"></div>
    
    
        <section class="foto">
            <img src="imagens/pedreirocanvas.png" alt="" id="fotoPubli">
        </section>
    
        <section id="passos">
            <div class="passotexto">
            <div id="titulo"><p>Novo por aqui?</p></div>
            <div><h3>Confira abaixo o que fazer de forma rápida e fácil em seu primeiro acesso:</h3></div>
            </div>
    
        <div class="container">
    
            <div class="bordaredonda">
                <div class="divtudo">
                    <div class="bordaverde"><i class="fa-solid fa-clipboard-check"></i></div>
                    <div><p>Cadastre-se</p></div>
                </div>
                <div class="divtudo">
                    <div class="bordaverde"><i class="fa-solid fa-users"></i></div>
                    <div><p>Procure por um serviço</p></div>
                </div>
                <div class="divtudo">
                    <div class="bordaverde"><i class="fa-solid fa-user-tag"></i></div>
                    <div><p>Anuncie seus serviços</p></div>
                </div>
                <div class="divtudo">
                    <div class="bordaverde"><i class="fa-solid fa-comments-dollar"></i></div>
                    <div><p>Negocie pelo chat</p></div>
                </div>
            </div>
    
        </div>
    
        </section>
    
        <section id="faq">
            <div class="passotexto2">
            <div id="titulo"><p>FAQ</p></div>
            <div><h3>Questões frequentes sobre a plataforma </h3></div>
            </div>
    
            <div class="imgEpagina">
                <img src="imagens\FAQ.png" alt="">
               

                <section id="maeFaq">

                <div class="faq">
                    <div class="questions">
                        <h3>Quem somos?</h3>

                    <svg width="15" height="10" viewBox="0 0 42 25">
                        <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
                   </svg>
                    </div>
                    <div class="answer">
                        <p>Um site para vagas de serviços desenvolvido por um grupo de estudantes de Desenvolvimento de Sistemas do nível técnico no SENAI Dendezeiros.</p>
                    </div>
                </div>
                <div class="faq">
                    <div class="questions">
                        <h3>Por que usar o FastService?</h3>

                    <svg width="15" height="10" viewBox="0 0 42 25">
                        <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
                   </svg>
                    </div>
                    <div class="answer">
                        <p>O intuito do site é justamente ajudar as pessoas que gostariam de contratar mão de obra para serviços variados e também para quem trabalha realizando tais serviços e deseja aumentar a produtividade.</p>
                    </div>
                </div>
                <div class="faq">
                    <div class="questions">
                        <h3>Como entrar em contato com o suporte ao usuário?</h3>

                    <svg width="15" height="10" viewBox="0 0 42 25">
                        <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
                   </svg>
                    </div>
                    <div class="answer">
                        <p>Em Perfil, no ícone de usuário no cabeçalho da página inicial do site, vá em "Reportar problema".</p>
                    </div>
                </div>
                <div class="faq">
                    <div class="questions">
                        <h3>Tenho que pagar para anunciar serviços?</h3>

                    <svg width="15" height="10" viewBox="0 0 42 25">
                        <path d="M3 3L21 21L39 3" stroke="white" stroke-width="7" stroke-linecap="round"/>
                   </svg>
                    </div>
                    <div class="answer">
                        <p>Não, o site é totalmente gratuito.</p>
                    </div>
                </div>

                </section>



            </div>
    
        </section>
</div>


<?php
include "footer.php";
?>


<script src="js/faq.js"></script>
</body>
</html>