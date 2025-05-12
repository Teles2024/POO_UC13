<?php
 
class curso {
    public $titulo;
    public $horas;
    public $dias;
    private $aluno;
 
    // Construtor com validação
    public function __construct($titulo, $horas, $dias, $aluno) {
        if (empty($titulo)) {
            throw new Exception("O campo Titulo é obrigatório.");
        }
        if (empty($horas)) {
            throw new Exception("O campo Horas é obrigatório");
        }
        if (empty($alunos)) {
            throw new Exception("O campo Alunos é obrigatório.");

        }
        
        $this->titulo = $titulo;
        $this->horas = $horas;
        $this->dias = $dias;
        $this->alunos = $aluno;
    }
 
    // Getter do CPF (encapsulamento)
    public function getaluno() {
        return $this->aluno;
    }
 
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Titulo: <strong>$this->titulo</strong><br>";
        echo "Horas: <strong>$this->horas</strong> anos<br>";
        echo "Alunos: <strong>" . $this->getaluno() . "</strong></P>";
        echo "Dias: <strong>$this->dias</strong>";

    }
}