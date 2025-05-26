<?php
 
 require_once "db/db.php";
class curso {
    public $titulo;
    public $hora;
    public $dia;
    private $aluno;
 
    // Construtor com validação
    public function __construct($titulo, $hora, $dia, $aluno) {
        if (empty($titulo)) {
            throw new Exception("O campo Titulo é obrigatório.");
        }
        if (empty($hora)) {
            throw new Exception("O campo Horas é obrigatório");
        }
        if (empty($aluno)) {
            throw new Exception("O campo Alunos é obrigatório.");

        }
        
        $this->titulo = $titulo;
        $this->hora = $hora;
        $this->dia = $dia;
        $this->aluno = $aluno;
    }
 
    // Getter do CPF (encapsulamento)
    public function getaluno() {
        return $this->aluno;
    }
 
    // Método para exibir os dados
    public function exibirDados() {
        echo "<p>Titulo: <strong>$this->titulo</strong><br>";
        echo "Horas: <strong>$this->hora</strong> hora<br>";
        echo "Alunos: <strong>" . $this->getaluno() . "</strong></P>";
        echo "Dias: <strong>$this->dia</strong>";

    }

    // Método para cadastrar a escola no banco de dados
    public function cadastrar() {
        // Conexão com o banco de dados
        $database = new Database();
        $conn = $database->getConnection();
 
        // Preparar a consulta SQL
        $query = "INSERT INTO curso (titulo, hora, dia, aluno) VALUES (:titulo, :hora, :dia, :aluno)";
        $stmt = $conn->prepare($query);
 
        // Bind dos parâmetros
        $stmt->bindParam(':titulo', $this->titulo);
        $stmt->bindParam(':hora', $this->hora);
        $stmt->bindParam(':dia', $this->dia);
        $stmt->bindParam(':aluno', $this->aluno);
 
        // Executar a consulta
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Método para listar os cursos
    public static function listar() {
        // Conexão com o banco de dados
        $database = new Database();
        $conn = $database->getConnection();
 
        // Preparar a consulta SQL
        $query = "SELECT * FROM curso";
        $stmt = $conn->prepare($query);
        $stmt->execute();
 
        // Retornar os resultados
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}