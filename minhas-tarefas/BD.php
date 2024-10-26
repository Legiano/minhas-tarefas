<?php
//CREATE DATABASE tarefas_bd;

//USE tarefas_bd;

//CREATE TABLE tarefa(
//	id INTEGER PRIMARY KEY AUTO_INCREMENT,
//	nome VARCHAR(255),
//	prioridade INTEGER
//);

class BD
{
	private $host;
	private $usuario;
	private $senha;
	private $banco;
	private $porta;

	function __construct()
	{
		$this->host = "localhost";
		$this->usuario = "root";
		$this->senha = "";
		$this->banco = "tarefas_bd";
		$this->porta = '3307';
	}

	public function getConexao() {
		$conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco, $this->porta);
		
		if ($conexao->connect_error) {
			die("Problema ao conectar no banco de dados: " . $conexao->connect_error);
		}
		
		return $conexao;
	}
	
}
?>
