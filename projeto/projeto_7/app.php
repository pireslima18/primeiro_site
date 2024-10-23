<?php

	//classe dashboard
	class Dashboard{
		public $data_inicio ;
		public $data_fim ;
		public $numeroVendas ;
		public $totalVendas ;
		public $clientesAtivos;
		public $clientesInativos;
		public $reclamacoes;
		public $elogios;
		public $sugestoes;
		public $totalDespesas;

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

		public function getNumeroVendas(){
			$query = "
				SELECT 
					COUNT(*) as numero_vendas
				from 
					tb_vendas 
				where 
					data_venda BETWEEN :data_inicio AND :data_fim";

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->numero_vendas;
		}

		public function getTotalVendas(){
			$query = '
				SELECT
					SUM(total) as total_vendas
				from 
					tb_vendas 
				where 
					data_venda BETWEEN :data_inicio AND :data_fim';

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_vendas;
		}

		public function getClientesAtivos(){
			$query = '
				SELECT 
					COUNT(*) as total_cliente_ativos
				FROM 
					tb_clientes 
				WHERE 
					cliente_ativo = 1;';
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ)->total_cliente_ativos;
		}

		public function getClientesInativos(){
			$query = '
			SELECT 
				COUNT(*) as total_cliente_inativos 
			FROM 
				tb_clientes 
			WHERE 
				cliente_ativo = 0;';
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ)->total_cliente_inativos;
		}

		public function getReclamacoes(){
			$query = '
			SELECT 
				COUNT(*) as reclamacoes 
			from 
				tb_contatos 
			WHERE 
				tipo_contato = 1;';
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ)->reclamacoes;
		}

		public function getElogios(){
			$query = '
			SELECT 
				COUNT(*) as elogios 
			from 
				tb_contatos 
			WHERE 
				tipo_contato = 3;';
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ)->elogios;
		}

		public function getSugestoes(){
			$query = '
			SELECT 
				COUNT(*) as sugestoes 
			from 
				tb_contatos 
			WHERE 
				tipo_contato = 2;';
			$stmt = $this->conexao->prepare($query);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_OBJ)->sugestoes;
		}

		public function getDespesas(){
			$query = '
				SELECT
					SUM(total) as total_despesas
				from 
					tb_despesas 
				where 
					data_despesa BETWEEN :data_inicio AND :data_fim';

			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$stmt->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			$stmt->execute();

			return $stmt->fetch(PDO::FETCH_OBJ)->total_despesas;
		}

	}

	$dashboard = new Dashboard();
	$conexao = new Conexao();

	$competencia = explode('-',$_GET['competencia']);
	$ano = $competencia[0];
	$mes = $competencia[1];

	$dias_do_mes = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);

	$dashboard->__set('data_inicio', $ano.'-'.$mes.'-01');
	$dashboard->__set('data_fim', $ano.'-'.$mes.'-'.$dias_do_mes);

	$bd = new Bd($conexao, $dashboard);

	$dashboard->__set('numeroVendas', $bd->getNumeroVendas());
	$dashboard->__set('totalVendas', $bd->getTotalVendas());
	$dashboard->__set('clientesAtivos', $bd->getClientesAtivos());
	$dashboard->__set('clientesInativos', $bd->getClientesInativos());
	$dashboard->__set('reclamacoes', $bd->getReclamacoes());
	$dashboard->__set('elogios', $bd->getElogios());
	$dashboard->__set('sugestoes', $bd->getSugestoes());
	$dashboard->__set('totalDespesas', $bd->getDespesas());
	echo json_encode($dashboard);

?>