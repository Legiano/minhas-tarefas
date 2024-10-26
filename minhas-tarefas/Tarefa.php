<?php
class Tarefa {
    private $id;
    private $nome;
    private $prioridade;

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setPrioridade($prioridade) {
        $this->prioridade = $prioridade;
    }

    public function getPrioridade() {
        return $this->prioridade;
    }
}
?>
