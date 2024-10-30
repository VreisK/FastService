<header>
    <a href="home.php"><img src="imagens/logoatual.png" id="logo" alt=""></a>

    <div class="search-box">
    <form action="" method="post">
            <input class="search-txt" name="pesquisa" type="text" placeholder="Busque um anúncio">
           <a   class="search-btn"><i class="fas fa-search"></i></a>
    </form>
       
    </div>
    <?php
      require_once 'model.php';
      $model = new Model();

     
      
      $proteger = $model->proteger();
      if($proteger == false){
        echo "<script>alert('Você precisa logar');window.location.href='login.php';</script>";
      }
      $sair = $model->sair();
      $email = $_SESSION['email'];
      $usuario = $model->usuario($email);
      $id = $_SESSION['idUsuario'];
      if ($usuario['caminho'] == null) {
        $imagem = "<img src='arquivos/Marcela.png' alt=''>";
    } else {
        $imagem = "<img src=' ". $usuario['caminho']."' alt=''>";
    }    
    if(isset($_POST['pesquisa'])){
        $inputPesquisa = $_POST['pesquisa'];
        $inputPesquisa = preg_replace('/\s+/', ' ', trim($inputPesquisa));

        $pesquisa = $model ->pesquisarAnuncios($inputPesquisa,1);
        if($pesquisa != null){
            echo "<script>window.location.href='anuncioPesquisa.php?pesquisa=$inputPesquisa&page=1&estado=&cidade=';</script>";
        }else{
            echo "<script>alert('Nenhum Anuncio encontrado');</script>";
        }
    }
    ?>
      

      <div class="openMenu">  <i class="fa-solid fa-bars"></i></div>
    <ul class="nav-list">
        <li><h3 id="nomeUsuarioCel"><?php echo $_SESSION['nome']?></h3></li>
        <li><a href="publicar.php">Meus anúncios</a></li>
        <li><a id="btnChat" href="chat.php">Chat</a></li>
        <li><a  id="btnNotifacoes"href="#">Notificações</a></li>
        <li id="btnCel"> <a href="perfil.php">Meu perfil</a></li> 
        <form action="" method="post">
            <li><button name="sair" id="btnCel">Sair</button></li>
        </form>    
        <div class="closeMenu"><i class="fa fa-times"></i></div>
    </ul>
  
 
    <div class="user">
        <a href="perfil.php"><i class="fa-solid fa-user"></i></a>
    </div>
    <p id="nomeUsuario"><?php echo $_SESSION['nome']?></p>

    <ul class="navbar3">
        <form action="" method="post">
            <li><button name="sair" class="btnSair">Sair</button></li>
        </form>
    </ul>

 
   

    </header>

    