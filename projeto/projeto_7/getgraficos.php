<?php

	//classe dashboard
	class Dashboard{
		public $totalVendasAgosto;
		public $totalVendasSetembro;
		public $totalVendasOutubro;
		public $clientesAtivos;
		public $clientesInativos;
		public $reclamacoes;
		public $elogios;
		public $sugestoes;
		public $totalDespesasAgosto;
		public $totalDespesasSetembro;
		public $totalDespesasOutubro;

		public function __get($atributo){
			return $this->$atributo;
		}

		public function __set($atributo, $valor){
			$this->$atributo = $valor;
			return $this;
		}

	}

	class Conexao {
		private $host = 'localhost';
		private $dbname = 'dashboard';
		private $user = 'root';
		private $pass = '';
	
		public function conectar() {
			try {
				$conexao = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
				// Definir o conjunto de caracteres para utf8
				$conexao->exec('set names utf8');
	
				return $conexao;
			} catch(PDOException $e) {
				echo '<p>' . $e->getMessage() . '</p>';
				return null; // Ou lança novamente a exceção se preferir tratar em outro lugar.
			}
		}
	}

	class Bd{
		private $conexao;
		private $dashboard;

		public function __construct(Conexao $conexao, Dashboard $dashboard){
			$this->conexao = $conexao->conectar();
			$this->dashboard = $dashboard;
		}

		//Clientes
		public function getClientesAtivos(){
			$query = "
				SELECT 
					COUNT(*) as clientes_ativos
				from 
					tb_clientes 
				where 
					cliente_ativo = 1;";

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->clientes_ativos;
		}

		public function getClientesInativos(){
			$query = "
				SELECT 
					COUNT(*) as clientes_inativos
				from 
					tb_clientes 
				where 
					cliente_ativo = 0;";

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->clientes_inativos;
		}

		//Avaliações
		public function getReclamacoes(){
			$query = "
				SELECT 
					COUNT(*) as total_reclamacoes
				from 
					tb_contatos
				where 
					tipo_contato = 1;";

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_reclamacoes;
		}

		public function getElogios(){
			$query = "
				SELECT 
					COUNT(*) as total_elogios
				from 
					tb_contatos
				where 
					tipo_contato = 3;";

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_elogios;
		}

		public function getSugestoes(){
			$query = "
				SELECT 
					COUNT(*) as total_sugestoes
				from 
					tb_contatos
				where 
					tipo_contato = 2;";

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_sugestoes;
		}

		//Vendas
		public function getTotalVendasAgosto(){
			$query = "
				SELECT 
					SUM(total) as total_vendas
				from 
					tb_vendas
				where 
					data_venda BETWEEN '2018-08-01' and '2018-08-31';";

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
		}

		public function getTotalVendasSetembro(){
			$query = "
				SELECT 
					SUM(total) as total_vendas
				from 
					tb_vendas
				where 
					data_venda BETWEEN '2018-09-01' and '2018-09-30';";

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
		}

		public function getTotalVendasOutubro(){
			$query = "
				SELECT 
					SUM(total) as total_vendas
				from 
					tb_vendas
				where 
					data_venda BETWEEN '2018-10-01' and '2018-10-31';";

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
		}

		//Despesas
		public function getTotalDespesasAgosto(){
			$query = "
				SELECT 
					SUM(total) as total_despesas
				from 
					tb_despesas
				where 
					data_despesa BETWEEN '2018-08-01' and '2018-08-31';";

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_despesas;
		}

		public function getTotalDespesasSetembro(){
			$query = "
				SELECT 
					SUM(total) as total_despesas
				from 
					tb_despesas
				where 
					data_despesa BETWEEN '2018-09-01' and '2018-09-30';";

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_despesas;
		}

		public function getTotalDespesasOutubro(){
			$query = "
				SELECT 
					SUM(total) as total_despesas
				from 
					tb_despesas
				where 
					data_despesa BETWEEN '2018-10-01' and '2018-10-31';";

			$stmt = $this->conexao->prepare($query);
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_despesas;
		}

	}

	$dashboard = new Dashboard();
	$conexao = new Conexao();

	$acao = $_GET['acao'];

	$bd = new Bd($conexao, $dashboard);

	//Clientes
	$dashboard->__set('clientesAtivos', $bd->getClientesAtivos());
	$dashboard->__set('clientesInativos', $bd->getClientesInativos());

	//Avaliações
	$dashboard->__set('reclamacoes', $bd->getReclamacoes());
	$dashboard->__set('elogios', $bd->getElogios());
	$dashboard->__set('sugestoes', $bd->getSugestoes());


	//Vendas
	$dashboard->__set('totalVendasAgosto', $bd->getTotalVendasAgosto());
	$dashboard->__set('totalVendasSetembro', $bd->getTotalVendasSetembro());
	$dashboard->__set('totalVendasOutubro', $bd->getTotalVendasOutubro());

	//Despesas
	$dashboard->__set('totalDespesasAgosto', $bd->getTotalDespesasAgosto());
	$dashboard->__set('totalDespesasSetembro', $bd->getTotalDespesasSetembro());
	$dashboard->__set('totalDespesasOutubro', $bd->getTotalDespesasOutubro());

	echo json_encode($dashboard);

?>