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
        $alunoCriado = $aluno->cadastrar();

if ($alunoCriado) {
        echo "<div class='alert alert-success'>Cadastro efetuado com sucesso</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro ao cadastrar aluno</div>";
    }

    } catch (Exception $e) {
        echo "<div class='alert alert-danger mt-3'>" . $e->getMessage() . "</div>";
    }
}

$alunos = Aluno::listar();
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

<h3>Lista de Alunos</h3>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CPF</th>
            <th>Idade</th>
        </tr>
    </thead>
    <tbody>
       <?php if ($alunos && count($alunos) > 0): ?>
            <?php foreach ($alunos as $aluno): ?>
                <tr>
                    <td><?= htmlspecialchars($aluno['nome']) ?></td>
                    <td><?= htmlspecialchars($aluno['cpf']) ?></td>
                    <td><?= htmlspecialchars($aluno['idade']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4" class="text-center">Nenhum aluno cadastrado.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>