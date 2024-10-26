<?php
 include_once("Tarefa.php");
 include_once("BD.php");

class TarefaDAO
{
	private $conexao;

	function __construct()
	{
		$bd = new BD();
		$this->conexao = $bd->getConexao();
	}

	public function listarTodos()
	{
		$sql = "SELECT * FROM Tarefa";
		$resultado = $this->conexao->query($sql);

		$tarefas = array();
		if ($resultado->num_rows > 0) {
			while ($linha = $resultado->fetch_assoc()) {
				$tarefa = new Tarefa();
				$tarefa->setId($linha['id']);
				$tarefa->setNome($linha['nome']);
				$tarefa->setPrioridade($linha['prioridade']);
				array_push($tarefas, $tarefa);
			}
		}
		return $tarefas;
	}

	public function persistir($tarefa)
	{
		$sql = "INSERT INTO tarefa (nome, prioridade) VALUES ('{$tarefa->getNome()}', {$tarefa->getPrioridade()})";
		if ($this->conexao->query($sql)) {
			echo "<p>Persistido com sucesso</p>";
		} else {
			echo "<p>Problema ao persistir: " . $this->conexao->error . "</p>";
		}
	}

	public function remover($id)
	{
		$sql = "DELETE FROM tarefa WHERE id = $id";
		if ($this->conexao->query($sql)) {
			echo "<p>Tarefa removida com sucesso</p>";
		} else {
			echo "<p>Problema ao remover a tarefa: " . $this->conexao->error . "</p>";
		}
	}
	
	public function atualizar($tarefa){
		
	}
	
	public function buscarPorId($id){
		
	}
}
