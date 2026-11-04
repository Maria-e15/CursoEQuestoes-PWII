
<?php

session_start();

if (!isset($_SESSION['questoes_prova_final'])) {
    die("Não foi possível encontrar a prova.");
}

$questoes = $_SESSION['questoes_prova_final'];
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

$porcentagem = ($acertos / 10) * 100;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Resultado da Prova Final</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>

<main class="container mt-5 text-center">

    <div class="card p-5">

        <h1>Resultado da Prova Final</h1>

        <h2 class="mt-4">
            <?php echo $acertos; ?> de 10 acertos!
        </h2>

        <p class="mt-3">
            Aproveitamento: <?php echo $porcentagem; ?>%
        </p>

        <?php if ($acertos >= 7): ?>

            <p class="text-success">
                Parabéns! Você concluiu o curso!
            </p>

        <?php else: ?>

            <p>
                Continue estudando e pratique mais um pouco!
            </p>

        <?php endif; ?>

        <a href="index.html" class="btn btn-primary mt-3">
            Voltar ao início
        </a>

    </div>

</main>

</body>
</html>
