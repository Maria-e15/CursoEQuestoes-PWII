
<?php

session_start();

$aula = isset($_POST['aula']) ? (int) $_POST['aula'] : 0;

$chave = "questoes_aula_" . $aula;

// Verifica se existem questões na sessão
if ($aula < 1 || $aula > 5 || !isset($_SESSION[$chave])) {
    die("Não foi possível corrigir as questões.");
}

$questoes = $_SESSION[$chave];

$respostas = $_POST['respostas'] ?? [];

$acertos = 0;

foreach ($questoes as $questao) {

    $id = $questao['id_questao'];

    if (
        isset($respostas[$id]) &&
        strtolower($respostas[$id]) === strtolower($questao['resposta_correta'])
    ) {
        $acertos++;
    }
}

$_SESSION['aula_concluida_' . $aula] = true;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Resultado dos exercícios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>

    <main class="container mt-5 text-center">

        <div class="card p-5">

            <h1>Resultado dos exercícios</h1>

            <h2 class="mt-4">
                <?php echo $acertos; ?> de 3 acertos!
            </h2>

            <p class="mt-3">
                Você acertou <?php echo $acertos; ?> questões.
            </p>

            <?php if ($acertos == 3): ?>

                <p class="text-success">Parabéns! Você acertou todas!</p>

            <?php elseif ($acertos > 0): ?>

                <p>Bom trabalho! Continue estudando.</p>

            <?php else: ?>

                <p>Continue praticando! Você consegue.</p>

            <?php endif; ?>

            <?php if ($aula < 5): ?>

                <a href="aula<?php echo $aula + 1; ?>.php"
                   class="btn btn-primary mt-3">
                    Próxima aula
                </a>

            <?php else: ?>

                <a href="prova_final.php" class="btn btn-primary mt-3">
                    Ir para a prova final
                </a>

            <?php endif; ?>

        </div>

    </main>

</body>
</html>
