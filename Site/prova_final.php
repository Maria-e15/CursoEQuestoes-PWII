
<?php

session_start();
require_once "config/conexao.php";

// Verifica se as cinco aulas foram concluídas
for ($i = 1; $i <= 5; $i++) {
    if (!isset($_SESSION['aula_concluida_' . $i])) {
        die("Você precisa concluir todas as cinco aulas antes de fazer a prova final.");
    }
}

// Sorteia as 10 questões apenas uma vez
if (!isset($_SESSION['questoes_prova_final'])) {

    $sql = "SELECT * FROM questoes
            ORDER BY RAND()
            LIMIT 10";

    $consulta = $conexao->prepare($sql);
    $consulta->execute();

    $_SESSION['questoes_prova_final'] = $consulta->fetchAll(PDO::FETCH_ASSOC);
}

// Recupera as questões sorteadas
$questoes = $_SESSION['questoes_prova_final'];

if (count($questoes) < 10) {
    die("Não existem questões suficientes para a prova final.");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Prova Final</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>

<main class="container mt-5">

    <h1>Prova Final</h1>

    <p>Responda às 10 questões abaixo para concluir o curso.</p>

    <form action="corrigir_prova_final.php" method="POST">

        <?php foreach ($questoes as $indice => $questao): ?>

            <div class="card p-4 mb-4">

                <h5>Questão <?php echo $indice + 1; ?></h5>

                <p style = "text-align: justify;">
                    <?php echo htmlspecialchars($questao['enunciado']); ?>
                </p>

                <?php $alternativas = ['a', 'b', 'c', 'd', 'e']; ?>

                <?php foreach ($alternativas as $letra): ?>

                    <div class="form-check mb-2" style = "text-align: justify;">

                        <input
                            class="form-check-input"
                            type="radio"
                            name="respostas[<?php echo $questao['id_questao']; ?>]"
                            value="<?php echo $letra; ?>"
                            required
                        >

                        <label class="form-check-label">

                            <?php echo strtoupper($letra); ?>)

                            <?php echo htmlspecialchars($questao['alternativa_' . $letra]); ?>

                        </label>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endforeach; ?>

        <button type="submit" class="btn btn-success">
            Finalizar prova
        </button>

    </form>

</main>

</body>
</html>
