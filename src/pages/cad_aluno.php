<?php

require __DIR__ . "/../classes/aluno.php";



// Inicializa as variáveis
$nome = $idade = $cpf = $curso = "";
$alunoCriado = false;

//Cadastrando
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"]);
    $idade = trim($_POST["idade"]);
    $cpf = trim($_POST["cpf"]);
    $curso = trim($_POST["curso"]);
    try {
        $aluno = new Aluno($nome, $idade, $cpf, $curso);
        $alunoCriado = true;
    } catch (Exception $e) {
        echo "<div class='alert alert-danger mt-3'>" . $e->getMessage() . "</div>";
    }
}

?>

<h2 class="text-center my-4">Cadastro de Aluno</h2>

<div class="container d-flex justify-content-center">
    <form method="post" class="row g-3 mb-4 w-75">
        <div class="col-md-4">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control"
                   value="<?= htmlspecialchars($nome) ?>">
        </div>

        <div class="col-md-2">
            <label for="cpf" class="form-label">CPF:</label>
            <input type="text" name="cpf" id="cpf" class="form-control"
                   value="<?= htmlspecialchars($cpf) ?>">
        </div>

        <div class="col-md-1">
            <label for="idade" class="form-label">Idade:</label>
            <input type="number" name="idade" id="idade" class="form-control"
                   value="<?= htmlspecialchars($idade) ?>">
        </div>

        <div class="col-md-3">
            <label for="curso" class="form-label">Curso:</label>
            <input type="text" name="curso" id="curso" class="form-control"
                   value="<?= htmlspecialchars($curso) ?>">
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
        </div>
    </form>
</div>
