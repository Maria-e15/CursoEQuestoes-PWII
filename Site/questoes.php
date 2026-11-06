
<?php

session_start();
require_once "config/conexao.php";

// Identifica a aula
$aula = isset($_GET['aula']) ? (int) $_GET['aula'] : 1;

// Verifica se a aula é válida
if ($aula < 1 || $aula > 5) {
    die("Aula inválida.");
}

// Nome da aula no banco
$aula_nome = "Aula " . $aula;

// Identificador das questões na sessão
$chave = "questoes_aula_" . $aula;

// Sorteia as questões apenas uma vez
if (!isset($_SESSION[$chave])) {

    $sql = "SELECT * FROM questoes
            WHERE aula_referente = :aula
            ORDER BY RAND()
            LIMIT 3";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':aula', $aula_nome);
    $consulta->execute();

    $_SESSION[$chave] = $consulta->fetchAll(PDO::FETCH_ASSOC);
}

// Recupera as questões sorteadas
$questoes = $_SESSION[$chave];

if (count($questoes) < 3) {
    die("Não existem questões suficientes para esta aula.");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Exercícios - <?php echo $aula_nome; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
</head>

<body>

    <main class="container mt-5">

        <h1>Exercícios - <?php echo $aula_nome; ?></h1>

        <p>Responda às três questões abaixo:</p>

        <form action="corrigir.php" method="POST">

            <input type="hidden" name="aula" value="<?php echo $aula; ?>">

            <?php foreach ($questoes as $indice => $questao): ?>

                <div class="card p-4 mb-4">

                    <h5>
                        Questão <?php echo $indice + 1; ?>
                    </h5>

                    <p style = "text-align: justify;">
                        <?php echo htmlspecialchars($questao['enunciado']); ?>
                    </p>

                    <?php
                    $alternativas = ['a', 'b', 'c', 'd', 'e'];
                    ?>

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
                Enviar respostas
            </button>

        </form>

    </main>

</body>
</html>
