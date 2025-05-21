<?php

require_once "db/db.php";
class aluno
{
    public $nome;
    public $idade;
    private $cpf;
    public $curso;

    // Construtor com validação
    public function __construct($nome, $idade, $cpf, $curso)
    {
        if (empty($nome)) {
            throw new Exception("O campo Nome é obrigatório.");
        }
        if (!ctype_digit($idade) || (int) $idade <= 0) {
            throw new Exception("A idade deve ser um número inteiro positivo.");
        }
        if (empty($cpf)) {
            throw new Exception("O campo CPF é obrigatório.");
        }
        if (empty($curso)) {
            throw new Exception("O campo Curso é obrigatório.");

        }

        $this->nome = $nome;
        $this->idade = $idade;
        $this->cpf = $cpf;
        $this->curso = $curso;
    }

    // Getter do CPF (encapsulamento)
    public function getCpf()
    {
        return $this->cpf;
    }

    // Método para exibir os dados
    public function exibirDados()
    {
        echo "<p>Nome: <strong>$this->nome</strong><br>";
        echo "Idade: <strong>$this->idade</strong> anos<br>";
        echo "CPF: <strong>" . $this->getCpf() . "</strong></P>";
        echo "Curso: <strong>$this->curso</strong>";

    }

    // Método para cadastrar o aluno no banco de dados
    public function cadastrar()
    {
        // Conexão com o banco de dados
        $database = new Database();
        $conn = $database->getConnection();

        // Preparar a consulta SQL
        $query = "INSERT INTO aluno (nome, cpf, idade, curso) VALUES (:nome, :cpf, :idade, :curso)";
        $stmt = $conn->prepare($query);

        // Bind dos parâmetros
        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':cpf', $this->cpf);
        $stmt->bindParam(':idade', $this->idade);
        $stmt->bindParam(':curso', $this->curso);

        // Executar a consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Método para listar os alunos
    public static function listar() {
        // Conexão com o banco de dados
        $database = new Database();
        $conn = $database->getConnection();
 
        // Preparar a consulta SQL
        $query = "SELECT * FROM aluno";
        $stmt = $conn->prepare($query);
        $stmt->execute();
 
        // Retornar os resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}