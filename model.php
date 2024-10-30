<?php
Class Model{
	private $server = "localhost";
    private $username = "root";
    private $pass;
    private $database = "fastservice";
    private $conn;


    public function __construct(){
        try{
            $this ->conn = new mysqli($this->server,$this->username,$this->pass,$this->database);

        }catch(Exception $e){
            echo"A conexão falhou!".$e->getMessage();
        }
    }

    public function cadastro(){
        if(isset($_POST['submit'])){
            if(isset($_POST['nome']) && isset($_POST['telefone']) && isset($_POST['dataNasc']) && isset($_POST['genero']) && isset($_POST['cidade']) &&  isset($_POST['estado']) && isset($_POST['email']) && isset($_POST['senha'])){

				if(!empty($_POST['nome']) && !empty($_POST['telefone']) && !empty($_POST['dataNasc']) && !empty($_POST['genero']) && !empty($_POST['cidade']) &&  !empty($_POST['estado']) && !empty($_POST['email']) && !empty($_POST['senha'])){	
					
					$nome = filter_input(INPUT_POST,"nome");
					$email = filter_input(INPUT_POST,"email");
					$senha = filter_input(INPUT_POST,"senha");
					$cidade = filter_input(INPUT_POST,"cidade");
					$telefone = filter_input(INPUT_POST,"telefone");
					$dataNasc = filter_input(INPUT_POST,"dataNasc");
					$estado = filter_input(INPUT_POST,"estado");
					$genero = filter_input(INPUT_POST,"genero");

					$user_query = $this->conn->query("SELECT * FROM usuario WHERE email = '$email'");

					if ($user_query->num_rows != 0) {
							echo "<script>alert('Email já cadastrado');</script>";
					}else{
					$query = "INSERT INTO usuario (nome,email,senha,dataNasc,cidade,estado,genero,telefone,caminho) VALUES ('$nome','$email','$senha','$dataNasc','$cidade','$estado','$genero','$telefone',NULL)";
					if($sql = $this->conn->query($query)){
						echo "<script>alert('Dados Inseridos Com sucesso');window.location.href='login.php';</script>";
					}else{
						echo "<script>alert('Error');</script>";
					}
				}					
				}else{
					echo '<script>alert("Vazio");</script>';
				}
			}
        }
    }
	public function verificarConta($email,$senha){
		$user_query = $this->conn->query("SELECT * FROM usuario WHERE email = '$email' AND  senha = 	'$senha'");
		$user = $user_query->fetch_assoc();
		if ($user_query->num_rows == 1) {
			return true;
		}else{
			return false;
		}
	}
	public function usuario($email){
		$usuarios = $this->conn->query("SELECT * FROM usuario WHERE email = '$email'");
		$usuario = $usuarios->fetch_assoc();
		return $usuario;
	}
	
	public function login(){
		if(isset($_POST['submit'])){
			if(isset($_POST['email']) && isset($_POST['senha'])){
				if(!empty($_POST['email']) && !empty($_POST['senha'])){
						$email = filter_input(INPUT_POST,"email");
						$senha = filter_input(INPUT_POST,"senha");
						$user_query = $this->conn->query("SELECT * FROM usuario WHERE email = '$email' AND  senha = 	'$senha'");
						$user = $user_query->fetch_assoc();
						if($user != null){
							if($user['senha'] == $_POST['senha']){
							if ($user_query->num_rows == 1) {
								if(!isset($_SESSION)){
									session_start();
								}

								$_SESSION['idUsuario'] = $user['idUsuario'];
								$_SESSION['nome'] = $user['nome'];
								$_SESSION['cidade'] = $user['cidade'];
								$_SESSION['estado'] = $user['estado'];
								$_SESSION['email'] = $user['email'];
								$_SESSION['senha'] = $user['senha'];

								header("Location:home.php");
							}else{
								echo "<script>alert('Login ou Senha Incorreta');</script>";
							}
							}else{
								echo "<script>alert('Login ou Senha Incorreta');</script>";
							}
						}else{
							echo "<script>alert('Login ou Senha Incorreta');</script>";
						}
					}

				}
				
		}
	}

	public function proteger(){
		if(!isset($_SESSION)){
			session_start();
		}

		if(!isset($_SESSION['idUsuario'])){
			return false;
		}
		return true;
	}

	public function sair(){
		if(isset($_POST['sair'])){
			if(!isset($_SESSION)){
				session_start();
			}

			session_destroy();

			header('Location:login.php');
		}
	}

	public function edit($id){
		$data = null;
		$query = "SELECT * FROM usuario WHERE idUsuario = '$id'";
		if($sql = $this->conn->query($query)){
			while($row = $sql->fetch_assoc()){
				$data = $row;
			}
		}
		return $data;
	}

	
	public function alterarSenha($data){
		$query = "UPDATE usuario SET  senha ='$data[senha]' WHERE idUsuario ='$data[idUsuario]'";
		if($sql = $this->conn->query($query)){
            return true;
			echo "<script>alert('Senha alterada com sucesso');</script>";
        }else{
            return false;
        }
	}

	public function atualizar($data){
        $query = "UPDATE usuario SET nome='$data[nome]',dataNasc='$data[dataNasc]',cidade='$data[cidade]',
		estado='$data[estado]',genero='$data[genero]',telefone='$data[telefone]' WHERE idUsuario ='$data[idUsuario]'";
        
		if($sql = $this->conn->query($query)){
            return true;
        }else{
            return false;
        }
    }

	public function deletar($id){
		$query="DELETE FROM comentario WHERE idUsuario  ='$id'";
		$sql = $this->conn->query($query);
		$query="DELETE FROM anuncio WHERE idUsuario  ='$id'";
		$sql = $this->conn->query($query);
		$query="DELETE FROM usuario WHERE idUsuario  ='$id'";
		if($sql = $this->conn->query($query)){
			return true;
		}else{
			return false;
		}
	}
	public function deletarAnuncio($idAnuncio){
		$query="DELETE FROM comentario WHERE ID_anuncio  ='$idAnuncio'";
		$sql = $this->conn->query($query);
		$query="DELETE FROM anuncio WHERE ID_anuncio ='$idAnuncio'";
		$sql = $this->conn->query($query);
		if($sql = $this->conn->query($query)){
			return true;
		}else{
			return false;
		}
	}

	public function EditarFoto($arquivo){
		$pasta = "arquivos/";
		$nomeDoArquivo = $arquivo['name'];
		$novoNomeDoArquivo = uniqid();
		$extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
		if($extensao == "jpg" || $extensao == "png"){
		 $caminho = $pasta . $novoNomeDoArquivo.".".$extensao;
		 $deu_certo = move_uploaded_file($arquivo['tmp_name'],$caminho);
		 if($deu_certo){
			 $email = $_SESSION['email'];
			 $usuarios = $this->conn->query("SELECT * FROM usuario WHERE email = '$email'");
			 $usuario = $usuarios->fetch_assoc();
			  if($usuario['caminho'] != null){
				unlink($usuario['caminho']);
			  }
			 $this->conn->query("UPDATE usuario SET caminho='$caminho' WHERE email = '$email' ");
			 header('Location:perfil.php');
		 }
		 }else{
			 echo "<script>alert('Aceitamos Somente arquivos jpg ou png');</script>";
		 }
	}

	public function publicarAnuncio($titulo,$preco,$categoria,$entrega,$descricao,$arquivo,$idUsuario){
		$pasta = "anuncio/";
		$nomeDoArquivo = $arquivo['name'];
		$novoNomeDoArquivo = uniqid();
		$extensao = strtolower(pathinfo($nomeDoArquivo,PATHINFO_EXTENSION));
		if($extensao == "jpg" || $extensao == "png"){
		 $caminho = $pasta . $novoNomeDoArquivo.".".$extensao;
		 $deu_certo = move_uploaded_file($arquivo['tmp_name'],$caminho);
		 if($deu_certo){
			$query = "INSERT INTO anuncio (titulo,descricao,preco,idUsuario,entrega,categoria,caminho) VALUES ('$titulo','$descricao','$preco','$idUsuario','$entrega','$categoria','$caminho')";
		if($sql = $this->conn->query($query)){
			var_dump($caminho);
			echo "<script>alert('Dados Inseridos Com sucesso');window.location.href='publicar.php';</script>";
		}else{
			echo "<script>alert('Erro');</script>";
			
		}
		 }
		 }else{
			 echo "<script>alert('Aceitamos Somente arquivos jpg ou png');</script>";
		 }
		
	
	}
	public function pegarAnuncio($id){
		$data = null;
		$query = "SELECT anuncio.titulo,anuncio.preco,anuncio.idUsuario,anuncio.caminho,usuario.nome,usuario.estado,usuario.cidade,anuncio.ID_anuncio FROM anuncio join usuario on anuncio.idUsuario = usuario.idUsuario  order by ID_anuncio desc limit 4";
		if($sql = $this->conn->query($query)){	
			while($row = mysqli_fetch_assoc	($sql)){
				$data[]= $row;
			}
		}
		//("SELECT * FROM usuario u JOIN anuncio a  ON u.idUsuario = a.idUsuario");
		return $data;
	}
	public function anuncioEspecifico($id){
		$data = null;
		$query = "SELECT usuario.idUsuario,usuario.telefone,anuncio.categoria,anuncio.descricao,anuncio.titulo,anuncio.preco,anuncio.idUsuario,anuncio.caminho,usuario.nome,usuario.estado,usuario.cidade,anuncio.ID_anuncio FROM anuncio join usuario on anuncio.idUsuario = usuario.idUsuario where ID_anuncio = $id";
		if($sql = $this->conn->query($query)){	
			while($row = mysqli_fetch_assoc	($sql)){
				$data[]= $row;
			}
		}
		//("SELECT * FROM usuario u JOIN anuncio a  ON u.idUsuario = a.idUsuario");
		return $data;
	}
	public function anuncioAutor($id){
		$data = null;
		$query = "SELECT * FROM anuncio where idUsuario = $id";
		if($sql = $this->conn->query($query)){	
			while($row = mysqli_fetch_assoc	($sql)){
				$data[]= $row;
			}
		}
		//("SELECT * FROM usuario u JOIN anuncio a  ON u.idUsuario = a.idUsuario");
		return $data;
	}
	public function todosAnuncios($page){
		if($page == null){
			$page = 1;
		}
		$data = null;
		$pageSize = 10; 
		
		$offset = ($page - 1) * $pageSize;
		
		$query = "SELECT anuncio.ID_anuncio, anuncio.titulo, anuncio.preco, anuncio.descricao, anuncio.idUsuario, anuncio.caminho, usuario.nome, usuario.estado, usuario.cidade, usuario.telefone 
		FROM anuncio
		JOIN usuario ON anuncio.idUsuario = usuario.idUsuario
		ORDER BY anuncio.ID_anuncio DESC
		LIMIT $pageSize OFFSET $offset";
		

		if($sql = $this->conn->query($query)){	
			while($row = mysqli_fetch_assoc	($sql)){
				$data[]= $row;
			}
		}
		return $data;
	}
	public function listUsuarios(){
		$data = null;
		$query = "SELECT usuario.idUsuario,usuario.nome,usuario.estado,usuario.cidade,usuario.caminho,usuario.telefone, count(*) as quantidade_anuncio from usuario join anuncio on usuario.idUsuario = anuncio.idUsuario  group by usuario.idUsuario order by quantidade_anuncio desc limit 4";
		if($sql = $this->conn->query($query)){	
			while($row = mysqli_fetch_assoc	($sql)){
				$data[]= $row;
			}
		}
		//("SELECT * FROM usuario u JOIN anuncio a  ON u.idUsuario = a.idUsuario");
		return $data;
	}
	public function nomeUsuario($id){
		$data = null;
		$query = "SELECT nome from usuario where idUsuario = $id";
		if($sql = $this->conn->query($query)){	
			while($row = mysqli_fetch_assoc	($sql)){
				$data=$row;
			}
		}

		return $data;
	}
	public function anunciosCategoria($categoria,$page){
		$data = null;
		if($page == null){
			$page = 1;
		}
		$data = null;
		$pageSize = 10; 
		
		$offset = ($page - 1) * $pageSize;
		$query = "SELECT anuncio.ID_anuncio,anuncio.titulo,anuncio.preco,anuncio.descricao,anuncio.idUsuario,anuncio.caminho,usuario.nome,usuario.estado,usuario.cidade,usuario.telefone 
		FROM anuncio join usuario on anuncio.idUsuario = usuario.idUsuario where
		 anuncio.categoria = '$categoria'
		ORDER BY anuncio.ID_anuncio DESC
		LIMIT $pageSize OFFSET $offset";

		if($sql = $this->conn->query($query)){	
			while($row = mysqli_fetch_assoc	($sql)){
				$data[]= $row;
			}
		}
		//("SELECT * FROM usuario u JOIN anuncio a  ON u.idUsuario = a.idUsuario");
		return $data;
	}

	public function pesquisarAnuncios($pesquisa,$page){
		if($page == null){
			$page = 1;
		}
		$data = null;
		$pageSize = 10; 
		
		$offset = ($page - 1) * $pageSize;

		$query = "SELECT anuncio.ID_anuncio,anuncio.titulo,anuncio.preco,anuncio.descricao,anuncio.idUsuario,anuncio.caminho,usuario.nome,usuario.estado,usuario.cidade,usuario.telefone 
		FROM anuncio join usuario on anuncio.idUsuario = usuario.idUsuario 
		ORDER BY anuncio.ID_anuncio DESC
		LIMIT $pageSize  OFFSET $offset";

		if($sql = $this->conn->query($query)){	
			while($row = mysqli_fetch_assoc	($sql)){
				$data[]= $row;
			}
		}
		return $data;
	}

	public function pesquisarAnunciosEstado($pesquisa,$cidade,$estado,$page){
		if($page == null){
			$page = 1;
		}
		$data = null;
		$pageSize = 10; 
		
		$offset = ($page - 1) * $pageSize;

		$query = "SELECT anuncio.ID_anuncio,anuncio.titulo,
		anuncio.preco,anuncio.descricao,anuncio.idUsuario,anuncio.caminho,usuario.nome,
		usuario.estado,usuario.cidade,usuario.telefone 
		FROM 
		anuncio 
		JOIN 
		usuario ON anuncio.idUsuario = usuario.idUsuario 
		AND usuario.estado = '$estado' 
		AND usuario.cidade = '$cidade' 
		ORDER BY anuncio.ID_anuncio DESC
		LIMIT $pageSize OFFSET $offset";

		if($sql = $this->conn->query($query)){	
			while($row = mysqli_fetch_assoc	($sql)){
				$data[]= $row;
			}
		}
		return $data;
	}
	public function pesquisarAnunciosEstadocat($categoria,$cidade,$estado,$page){
		if($page == null){
			$page = 1;
		}
		$data = null;
		$pageSize = 10; 
		
		$offset = ($page - 1) * $pageSize;

		$query = "SELECT anuncio.ID_anuncio,anuncio.titulo,
		anuncio.preco,anuncio.descricao,anuncio.idUsuario,anuncio.caminho,usuario.nome,
		usuario.estado,usuario.cidade,usuario.telefone 
		FROM 
		anuncio 
		JOIN 
		usuario ON anuncio.idUsuario = usuario.idUsuario 
		AND usuario.estado = '$estado' 
		AND usuario.cidade = '$cidade' 
		ORDER BY anuncio.ID_anuncio DESC
		LIMIT $pageSize OFFSET $offset";
		if($sql = $this->conn->query($query)){	
			while($row = mysqli_fetch_assoc	($sql)){
				$data[]= $row;
			}
		}
		return $data;
	}
	public function anunciosEstado($cidade,$estado,$page){
		if($page == null){
			$page = 1;
		}
		$data = null;
		$pageSize = 10; 
		
		$offset = ($page - 1) * $pageSize;
		$data = null;
		$query = "SELECT anuncio.ID_anuncio,anuncio.titulo,
		anuncio.preco,anuncio.descricao,anuncio.idUsuario,anuncio.caminho,usuario.nome,
		usuario.estado,usuario.cidade,usuario.telefone 
		FROM 
		anuncio 
		JOIN 
		usuario ON anuncio.idUsuario = usuario.idUsuario 
		AND usuario.estado = '$estado' 
		AND usuario.cidade = '$cidade' 
		ORDER BY anuncio.ID_anuncio DESC
		LIMIT $pageSize OFFSET $offset";
		
		if($sql = $this->conn->query($query)){	
			while($row = mysqli_fetch_assoc	($sql)){
				$data[]= $row;
			}
		}
		return $data;
	}

	public function comentar($comentario,$idAnuncio,$idUsuario,$Avalicao){
		$query = "INSERT INTO comentario (comentario,ID_anuncio,idUsuario,avaliacao) VALUES ('$comentario','$idAnuncio','$idUsuario','$Avalicao')";
		if($sql = $this->conn->query($query)){
			echo "<script>alert('Comentado');window.location.href='anuncio.php?ID_anuncio=$idAnuncio';</script>";
		}else{
			echo "<script>alert('Erro');</script>";
			
		}
	}

	public function comentarios($idAnuncio){
		$query = "SELECT nome,comentario,avaliacao FROM comentario c JOIN usuario u ON c.idUsuario = u.idUsuario WHERE ID_anuncio = '$idAnuncio'";
		$data = null;
		if($sql = $this->conn->query($query)){	
			while($row = mysqli_fetch_assoc	($sql)){
				$data[]= $row;
			}
		}
		return $data;
		
	}

	public function paginacao(){
		$query = "SELECT COUNT(*) FROM anuncio";
		if($sql = $this->conn->query($query)){
			$row = mysqli_fetch_assoc($sql);
		}else{
			echo "Erro";
		}
		return $row;
	}
	public function paginacaoCategoria($categoria){
		$query = "SELECT COUNT(*) FROM anuncio WHERE anuncio.categoria = '$categoria'";
		if($sql = $this->conn->query($query)){
			$row = mysqli_fetch_assoc($sql);
		}else{
			echo "Erro";
		}
		return $row;
	}
	public function paginacaoPesquisa($pesquisa){
		$query = "SELECT COUNT(*) FROM anuncio WHERE titulo LIKE '%$pesquisa%' or descricao like '%$pesquisa%'";
		if($sql = $this->conn->query($query)){
			$row = mysqli_fetch_assoc($sql);
		}else{
			echo "Erro";
		}
		return $row;
	}
	public function paginacaoEstadoPesquisa($pesquisa,$estado,$cidade){
		$query = "SELECT COUNT(*) FROM anuncio JOIN 
		usuario ON anuncio.idUsuario = usuario.idUsuario WHERE titulo LIKE '%$pesquisa%' or descricao like '%$pesquisa%' AND usuario.estado = '$estado' 
		AND usuario.cidade = '$cidade' ";
		if($sql = $this->conn->query($query)){
			$row = mysqli_fetch_assoc($sql);
		}else{
			echo "Erro";
		}
		return $row;
	}

	public function paginacaoEstadoCategoria($estado,$cidade,$categoria){
		$query = "SELECT COUNT(*) FROM anuncio JOIN 
		usuario ON anuncio.idUsuario = usuario.idUsuario 
		AND usuario.estado = '$estado' 
		AND usuario.cidade = '$cidade' 
		AND anuncio.categoria = '$categoria'";
		if($sql = $this->conn->query($query)){
			$row = mysqli_fetch_assoc($sql);
		}else{
			echo "Erro";
		}
		return $row;
	}
	public function paginacaoEstado($estado,$cidade){
		$query = "SELECT COUNT(*) FROM anuncio JOIN 
		usuario ON anuncio.idUsuario = usuario.idUsuario 
		AND usuario.estado = '$estado' 
		AND usuario.cidade = '$cidade' ";
		if($sql = $this->conn->query($query)){
			$row = mysqli_fetch_assoc($sql);
		}else{
			echo "Erro";
		}
		return $row;
	}

	public function UsuariosConversa($id){
		$data = null;
		$query = " SELECT DISTINCT LEAST(id_usuarioEnvia, id_usuarioRecebe) AS menorID, GREATEST(id_usuarioEnvia, id_usuarioRecebe) AS maiorID
		FROM `chat`
		WHERE id_usuarioEnvia = '$id' OR id_usuarioRecebe = '$id';";
		if($sql = $this->conn->query($query)){
			while($row = mysqli_fetch_assoc($sql)){
			$data[] = $row; 
			}
		}else{
			echo "Erro";
		}
		return $data;

	}
	

	public function Conversa($UsuarioEnvia,$UsuarioRecebe){
		$data = null;
		$query = "SELECT chat.conversa , usuario.nome FROM chat JOIN usuario on usuario.idUsuario = chat.id_usuarioEnvia WHERE (chat.id_usuarioEnvia = '$UsuarioEnvia' AND chat.id_usuarioRecebe = '$UsuarioRecebe') OR (chat.id_usuarioEnvia = '$UsuarioRecebe' AND chat.id_usuarioRecebe = '$UsuarioEnvia') ";
		if($sql = $this->conn->query($query)){
			while($row = mysqli_fetch_assoc($sql)){
				$data[]  = $row;
			}
		}else{
			echo "Erro";
		}
		return $data;
	}

	public function EnviarMensagem($UsuarioEnviar,$UsuarioRecebe,$mensagem){
		$data = date('Y-m-d H:i:s'); 
		$query = "INSERT INTO chat (conversa, id_usuarioEnvia, id_usuarioRecebe, dataHora) VALUES (?, ?, ?, ?)";
	
		$stmt = $this->conn->prepare($query);
		$stmt->bind_param("siss", $mensagem, $UsuarioEnviar, $UsuarioRecebe, $data);
	
		if($stmt->execute()){
			$stmt->close();
			return true;
		} else {
			$stmt->close();
			return false;
		}
	
	
	}

	public function ComeçarChat($UsuarioEnviar,$UsuarioRecebe){
		
		$query = "SELECT conversa FROM chat WHERE id_usuarioEnvia = '$UsuarioEnviar' AND id_usuarioRecebe = '$UsuarioRecebe'";
		if($sql = $this->conn->query($query)){
			$row = mysqli_fetch_assoc($sql);
		}
		if($row == null){
			$data = date('Y-m-d H:i:s'); 
			$query = "INSERT INTO chat (conversa, id_usuarioEnvia, id_usuarioRecebe, dataHora) VALUES (?, ?, ?, ?)";
			$mensagem = 'Nova Conversa Iniciada';
			$stmt = $this->conn->prepare($query);
			$stmt->bind_param("siss", $mensagem, $UsuarioEnviar, $UsuarioRecebe, $data);
		
			if($stmt->execute()){
				$stmt->close();
				return true;
			} else {
				$stmt->close();
				return false;
			}
		}	
	}	
}