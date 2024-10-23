<?php

	class UsuarioService{
		private $usuario;
		private $conexao;

		public function __construct(Conexao $conexao, Usuario $usuario){
			$this->usuario = $usuario;
			$this->conexao = $conexao->conectar();
		}
		
		public function cadastrar(){
			$query = 'insert into tb_usuarios(nome, email, senha) values(:nome, :email, :senha);
			)';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':nome', $this->usuario->__get('nome'));
			$stmt->bindValue(':email', $this->usuario->__get('email'));
			$stmt->bindValue(':senha', $this->usuario->__get('senha'));
			$stmt->execute();
		}

		public function verificarEmail(){

			$query = 'select email from tb_usuarios where email = :email;';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':email', $this->usuario->__get('email'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);

		}

		public function verificarSenha(){

			$query = 'select senha from tb_usuarios where email = :email LIMIT 1;';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':email', $this->usuario->__get('email'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);

		}

		public function recuperarId(){

			$query = 'select id from tb_usuarios where email = :email;';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':email', $this->usuario->__get('email'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);

		}

		public function recuperarNome(){

			$query = 'select nome from tb_usuarios where email = :email;';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':email', $this->usuario->__get('email'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ);

		}


	}
?>