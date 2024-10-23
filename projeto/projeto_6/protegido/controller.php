<?php

	require "protegido/tarefa.model.php";
	require "protegido/tarefa.service.php";
	require "protegido/conexao.php";
	require "protegido/usuario.service.php";
	require "protegido/usuario.model.php";

	session_start();

	if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] != 'SIM') {
		header('location:index.php?login=2');
	}

	$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
	$acao = isset($_POST['acao']) ? $_POST['acao'] : $acao;

	if ($acao == 'cadastro') {

		if (empty($_POST['senha']) or empty($_POST['nome'])) {
			header('location:cadastro.php?cadastro=3');
		}else{
			$usuario = new Usuario();

			//criptografia de senha
			$cripto = password_hash($_POST['senha'], PASSWORD_DEFAULT);

			$usuario->__set('nome', $_POST['nome']);
			$usuario->__set('email', $_POST['email']);
			$usuario->__set('senha', $cripto);

			$conexao = new Conexao();

			$usuarioService = new UsuarioService($conexao, $usuario);

			//print_r($usuarioService->verificarEmail());
			//echo $usuarioService->verificarEmail()->email;

			//echo $usuarioService->verificarEmail();

			if (!empty($usuarioService->verificarEmail())) {
				header('location:cadastro.php?cadastro=1');
			}else{
				$usuarioService->cadastrar();
				header('location:index.php?cadastro=2');
			}
		}


	}elseif ($acao == 'login') {
		$usuario = new Usuario();

		$usuario->__set('email', $_POST['email']);
		$usuario->__set('senha', $_POST['senha']);

		$conexao = new Conexao();

		$usuarioService = new UsuarioService($conexao, $usuario);

		//$usuarioService->recuperarId();

		$usuario->__set('id', $usuarioService->recuperarId());		
		$usuario->__set('nome', $usuarioService->recuperarNome());

		//Verifição de senha criptografada
		$senhaCripto = $usuarioService->verificarSenha();
		$verificaSenhaCripto = password_verify($_POST['senha'], $senhaCripto->senha);
		//print_r($senhaCripto);

		if (!empty($usuarioService->verificarEmail()) && !empty($usuarioService->verificarSenha()) && $verificaSenhaCripto) {
			$_SESSION['autenticado'] = 'SIM';
			$_SESSION['id'] = $usuario->__get('id');
			$_SESSION['usuario'] = $usuario->__get('nome');
			header("location:tarefas_pendentes.php?");
		}else{
			header('location:index.php?login=1');
			$_SESSION['autenticado'] = 'NÃO';
		}

		//print_r($usuario);

	} elseif ($acao == 'inserir') {
		$tarefa = new Tarefa();
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$id_usuario = $_SESSION['id']->id;

		$conexao = new Conexao();

		$tarefaService = new TarefaService($conexao, $tarefa, $id_usuario);
		$tarefaService->inserir();

		header('Location:nova_tarefa.php?inclusao=1');
	}elseif ($acao == 'recuperar') {
		
		$tarefa = new Tarefa();
		$conexao = new Conexao();

		$id_usuario = $_SESSION['id']->id;

		$tarefaService = new TarefaService($conexao, $tarefa, $id_usuario);

		$tarefas = $tarefaService->recuperar();

	}elseif($acao == 'atualizar'){

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_POST['id']);
		$tarefa->__set('tarefa', $_POST['tarefa']);

		$conexao = new Conexao();

		$id_usuario = $_SESSION['id']->id;

		$tarefaService = new TarefaService($conexao, $tarefa, $id_usuario);

		if($tarefaService->atualizar()){

			if (isset($_GET['pag']) && $_GET['pag'] == 'tarefas_pendentes') {
				header ('Location:tarefas_pendentes.php');
			}else{
				header ('Location:todas_tarefas.php');
			}

		};

	}elseif($acao == 'remover'){

		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);

		$conexao = new Conexao();

		$id_usuario = $_SESSION['id']->id;

		$tarefaService = new TarefaService($conexao, $tarefa, $id_usuario);
		$tarefaService->remover();

		if (isset($_GET['pag']) && $_GET['pag'] == 'tarefas_pendentes') {
			header ('Location:tarefas_pendentes.php');
		}else{
			header ('Location:todas_tarefas.php');
		}

	}elseif($acao == 'marcarRealizada'){
		$tarefa = new Tarefa();
		$tarefa->__set('id', $_GET['id']);
		$tarefa->__set('id_status', 2);

		$conexao = new Conexao();

		$id_usuario = $_SESSION['id']->id;

		$tarefaService = new TarefaService($conexao, $tarefa, $id_usuario);

		$tarefaService->marcarRealizada();

		if (isset($_GET['pag']) && $_GET['pag'] == 'tarefas_pendentes') {
			header ('Location:tarefas_pendentes.php');
		}else{
			header ('Location:todas_tarefas.php');
		}

	}elseif($acao == 'recuperarTarefasPendentes'){

		$tarefa = new Tarefa();
		$tarefa->__set('id_status', 1);

		$conexao = new Conexao();

		$id_usuario = $_SESSION['id']->id;

		$tarefaService = new TarefaService($conexao, $tarefa, $id_usuario);

		$tarefas = $tarefaService->recuperarTarefasPendentes();

	}

?>