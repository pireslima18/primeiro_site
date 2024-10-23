<?php

	class TarefaService{
		private $conexao;
		private $tarefa;
		private $id_usuario;

		public function __construct(Conexao $conexao, Tarefa $tarefa, $id_usuario){
			$this->conexao = $conexao->conectar();
			$this->tarefa = $tarefa;
			$this->id_usuario = $id_usuario;
		}

		public function inserir(){

			$query = 'insert into tb_tarefas(id_usuario, tarefa) values(:id_usuario, :tarefa)';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':id_usuario', $this->id_usuario);
			$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
			$stmt->execute();

		}

		public function recuperar(){

			$query = '
					select 
						t.id, s.status, t.tarefa
					from 
						tb_tarefas as t
						left join tb_status as s on(t.id_status = s.id)
					where
						t.id_usuario = :id_usuario';;
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':id_usuario', $this->id_usuario);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_OBJ);
			
		}

		public function atualizar(){
			
			$query = 'update tb_tarefas set tarefa = :tarefa where id = :id and id_usuario = :id_usuario';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':tarefa', $this->tarefa->__get('tarefa'));
			$stmt->bindValue(':id', $this->tarefa->__get('id'));
			$stmt->bindValue(':id_usuario', $this->id_usuario);
			return $stmt->execute();
		}

		public function remover(){

			$query = 'delete from tb_tarefas where id = :id and id_usuario = :id_usuario';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':id', $this->tarefa->__get('id'));
			$stmt->bindValue(':id_usuario', $this->id_usuario);
			$stmt->execute();
			
		}

		public function marcarRealizada(){

			$query = 'update tb_tarefas set id_status = :id_status where id = :id and id_usuario = :id_usuario';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
			$stmt->bindValue(':id', $this->tarefa->__get('id'));
			$stmt->bindValue(':id_usuario', $this->id_usuario);
			$stmt->execute();

		}

		public function recuperarTarefasPendentes(){

			$query = '
				select
					t.id, s.status, t.tarefa
				from
					tb_tarefas as t left join tb_status as s on(t.id_status = s.id)
				where
					t.id_status = :id_status and t.id_usuario = :id_usuario';
			$stmt = $this->conexao->prepare($query);
			$stmt->bindValue(':id_status', $this->tarefa->__get('id_status'));
			$stmt->bindValue(':id_usuario', $this->id_usuario);
			$stmt->execute();
			
			return $stmt->fetchAll(PDO::FETCH_OBJ);

		}

	}

?>