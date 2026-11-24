<?php

session_start();
require_once 'config/conexao.php';

$aulas   = require __DIR__ . '/config/aulas.php';
$ajustes = require __DIR__ . '/config/ajustes.php';

// Identifica a aula
$aula = isset($_GET['aula']) ? (int) $_GET['aula'] : 1;

// Verifica se a aula é válida
if ($aula < 1 || $aula > 5) {
    die('Aula inválida.');
}

// Os exercícios só abrem depois de terminar o vídeo da aula
if (empty($_SESSION['video_concluido_' . $aula]) && !$ajustes['liberar_exercicios_para_teste']) {
    header('Location: aula' . $aula . '.php');
    exit;
}

// Nome da aula no banco
$aula_nome = 'Aula ' . $aula;
$numero    = str_pad($aula, 2, '0', STR_PAD_LEFT);

// Identificador das questões na sessão
$chave = 'questoes_aula_' . $aula;

// Sorteia as questões apenas uma vez
if (!isset($_SESSION[$chave])) {

    $sql = 'SELECT * FROM questoes
            WHERE aula_referente = :aula
            ORDER BY RAND()
            LIMIT 3';

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':aula', $aula_nome);
    $consulta->execute();

    $_SESSION[$chave] = $consulta->fetchAll(PDO::FETCH_ASSOC);
}

// Recupera as questões sorteadas
$questoes = $_SESSION[$chave];

if (count($questoes) < 3) {
    die('Não existem questões suficientes para esta aula.');
}

$alternativas = ['a', 'b', 'c', 'd', 'e'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Exercícios - <?php echo $aula_nome; ?> | InterseC</title>
    <link rel="stylesheet" href="style/telas.css">
</head>

<body>
    <div class="moldura">
        <main class="tela quest">

            <div class="pagina">
                <div class="pagina-conteudo">

                    <!-- Camada 1: fundo branco + símbolos matemáticos -->
                    <div class="simbolos" aria-hidden="true"></div>

                    <!-- Camada 2: gradiente lavanda (topo curvo + corpo até o fim da página) -->
                    <svg class="fundo-svg" viewBox="0 0 402 874" aria-hidden="true">
                        <path fill="#D4D1FE" d="M0,237 C9.8,239.3 39.3,245.0 59.0,251.0 C78.7,257.0 98.3,268.0 118.0,273.0 C137.7,278.0 157.3,280.2 177.0,281.0 C196.7,281.8 216.2,281.2 236.0,278.0 C255.8,274.8 276.2,269.3 296.0,262.0 C315.8,254.7 337.3,241.8 355.0,234.0 C372.7,226.2 394.2,218.2 402.0,215.0 V874 H0 Z"/>
                    </svg>
                    <div class="lavanda-corpo lavanda-q" aria-hidden="true"></div>
                    <div class="simbolos simbolos-sobre" aria-hidden="true"></div>

                    <!-- Camada 3: título, seta e símbolos em movimento sobre a curva -->
                    <h1 class="titulo-quest">Exercícios<br><span><em>Aula</em> <?php echo $numero; ?>.</span></h1>

                    <a class="btn-voltar" href="aula<?php echo $aula; ?>.php" aria-label="Voltar para a aula"
                       style="left:326px; top:57px; width:50px;">
                        <img src="imgs/gobackBtn.png" alt="">
                    </a>

                    <svg class="texto-curvo texto-simbolos" viewBox="0 0 402 874" aria-hidden="true">
                        <defs>
                            <path id="arco" d="M-30,229 C-25.0,229.0 -14.8,226.7 0.0,229.0 C14.8,231.3 39.3,236.8 59.0,243.0 C78.7,249.2 98.3,261.0 118.0,266.0 C137.7,271.0 157.3,272.2 177.0,273.0 C196.7,273.8 216.2,274.0 236.0,271.0 C255.8,268.0 276.2,262.5 296.0,255.0 C315.8,247.5 337.3,234.0 355.0,226.0 C372.7,218.0 387.8,212.0 402.0,207.0 C416.2,202.0 433.7,197.8 440.0,196.0"/>
                        </defs>
                        <text><textPath id="tp" href="#arco" data-texto="π Σ ∫ √ ∞ ± ≠ ≤ × ÷ ∈ ">π Σ ∫ √ ∞ ± ≠ ≤ × ÷ ∈ </textPath></text>
                    </svg>

                    <form class="q-lista" action="corrigir.php" method="POST">
                        <input type="hidden" name="aula" value="<?php echo $aula; ?>">

                        <?php foreach ($questoes as $indice => $questao): ?>
                            <section class="q-card">
                                <h2 class="q-titulo">
                                    Questão <?php echo $indice + 1; ?>.
                                    <em>(<?php echo htmlspecialchars($questao['topico']); ?>)</em>
                                </h2>

                                <p class="q-enunciado"><?php echo htmlspecialchars($questao['enunciado']); ?></p>

                                <div class="q-opcoes">
                                    <?php foreach ($alternativas as $letra): ?>
                                        <label class="q-op">
                                            <input type="radio"
                                                   name="respostas[<?php echo $questao['id_questao']; ?>]"
                                                   value="<?php echo $letra; ?>" required>
                                            <span><?php echo htmlspecialchars($questao['alternativa_' . $letra]); ?></span>
                                        </label>
                                    <?php endforeach; ?>
                                </div>
                            </section>
                        <?php endforeach; ?>

                        <button type="submit" class="btn-finalizar">Finalizar aula!</button>
                    </form>

                    <!-- Barra de rolagem personalizada (acompanha o conteúdo) -->
                    <div class="barra" aria-hidden="true"><div class="polegar"></div></div>

                </div>
            </div>

        </main>
    </div>
    <script src="style/escala.js"></script>
    <script src="style/scrollbar.js"></script>
    <script src="style/curva.js"></script>
</body>

</html>
