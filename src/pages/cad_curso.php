<?php
require __DIR__ . "/../classes/curso.php";

// Inicializa as variáveis
$titulo = $horas = $dias = $aluno = "";
$cursoCriado = false;

// Cadastrando
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST["titulo"]);
    $horas = trim($_POST["horas"]);
    $dias = trim($_POST["dias"]);
    $aluno = trim($_POST["aluno"]);

    try {
        $curso = new Curso($titulo, $horas, $dias, $aluno);
        $cursoCriado = true;
    } catch (Exception $e) {
        echo "<div class='alert alert-danger mt-3'>" . $e->getMessage() . "</div>";
    }
}
?>

<h2 class="text-center my-4">Cadastro de Curso</h2>

<div class="container d-flex justify-content-center">
    <form method="post" class="row g-3 mb-4 w-75">
        <div class="col-md-3">
            <label for="titulo" class="form-label">Título:</label>
            <input type="text" name="titulo" id="titulo" class="form-control"
                   value="<?= htmlspecialchars($titulo) ?>">
        </div>

        <div class="col-md-2">
            <label for="horas" class="form-label">Horas:</label>
            <input type="number" name="horas" id="horas" class="form-control"
                   value="<?= htmlspecialchars($horas) ?>">
        </div>

        <div class="col-md-3">
            <label for="dias" class="form-label">Dias:</label>
            <input type="number" name="dias" id="dias" class="form-control"
                   value="<?= htmlspecialchars($dias) ?>">
        </div>

        <div class="col-md-4">
            <label for="aluno" class="form-label">Aluno:</label>
            <input type="text" name="aluno" id="aluno" class="form-control"
                   value="<?= htmlspecialchars($aluno) ?>">
        </div>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary mt-3">Cadastrar</button>
        </div>
    </form>
</div>
