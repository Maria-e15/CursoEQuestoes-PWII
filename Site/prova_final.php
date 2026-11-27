<?php

session_start();
require_once 'config/conexao.php';

$ajustes = require __DIR__ . '/config/ajustes.php';


if (!$ajustes['liberar_avaliacao_para_teste']) {
    for ($i = 1; $i <= 5; $i++) {
        if (empty($_SESSION['aula_concluida_' . $i])) {
            header('Location: menu.php');
            exit;
        }
    }
}


if (isset($_GET['novo'])) {
    unset($_SESSION['questoes_prova_final'], $_SESSION['prova_inicio']);
    header('Location: prova_final.php');
    exit;
}


if (!isset($_SESSION['questoes_prova_final'])) {

    $sql = 'SELECT * FROM questoes
            ORDER BY RAND()
            LIMIT 10';

    $consulta = $conexao->prepare($sql);
    $consulta->execute();

    $_SESSION['questoes_prova_final'] = $consulta->fetchAll(PDO::FETCH_ASSOC);
}

$questoes = $_SESSION['questoes_prova_final'];

if (count($questoes) < 10) {
    die('Não existem questões suficientes para a prova final.');
}


if (!isset($_SESSION['prova_inicio'])) {
    $_SESSION['prova_inicio'] = microtime(true);
}
$duracao_segundos = (int) round((float) $ajustes['duracao_prova_minutos'] * 60);
$restante_ms      = (int) max(0, ($_SESSION['prova_inicio'] + $duracao_segundos - microtime(true)) * 1000);

$alternativas = ['a', 'b', 'c', 'd', 'e'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Avaliação final | InterseC</title>
    <link rel="stylesheet" href="style/telas.css">
</head>

<body>
    <div class="moldura">
        <main class="tela quest prova">

            <div class="pagina">
                <div class="pagina-conteudo">

              
                    <div class="simbolos" aria-hidden="true"></div>

                   
                    <svg class="fundo-svg" viewBox="0 0 402 874" aria-hidden="true">
                        <path fill="#D4D1FE" d="M0,564 C9.8,566.7 39.3,574.7 59.0,580.0 C78.7,585.3 98.3,591.8 118.0,596.0 C137.7,600.2 157.3,603.5 177.0,605.0 C196.7,606.5 216.3,607.2 236.0,605.0 C255.7,602.8 275.3,599.8 295.0,592.0 C314.7,584.2 336.2,567.5 354.0,558.0 C371.8,548.5 394.0,538.8 402.0,535.0 V874 H0 Z"/>
                    </svg>
                    <div class="lavanda-corpo lavanda-q" aria-hidden="true"></div>
                    <div class="simbolos simbolos-sobre" aria-hidden="true"></div>

                    
                    <h1 class="titulo-prova">
                        <em>Responda<br>corretamente<br>ao menos 7</em><br>questões e<br>finalize o curso!
                    </h1>

                    <svg class="texto-curvo texto-simbolos" viewBox="0 0 402 874" aria-hidden="true">
                        <defs>
                            <path id="arco" d="M-30,554 C-25.0,554.3 -14.8,553.0 0.0,556.0 C14.8,559.0 39.3,566.7 59.0,572.0 C78.7,577.3 98.3,583.8 118.0,588.0 C137.7,592.2 157.3,595.5 177.0,597.0 C196.7,598.5 216.3,599.2 236.0,597.0 C255.7,594.8 275.3,591.8 295.0,584.0 C314.7,576.2 336.2,559.5 354.0,550.0 C371.8,540.5 387.7,532.0 402.0,527.0 C416.3,522.0 433.7,521.2 440.0,520.0"/>
                        </defs>
                        <text><textPath id="tp" href="#arco" data-texto="π Σ ∫ √ ∞ ± ≠ ≤ × ÷ ∈ ">π Σ ∫ √ ∞ ± ≠ ≤ × ÷ ∈ </textPath></text>
                    </svg>

                    <form class="q-lista" id="form-prova" action="corrigir_prova_final.php" method="POST">

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

                        <button type="submit" class="btn-finalizar">Enviar respostas</button>
                    </form>

                    <!-- Barra de rolagem personalizada (acompanha o conteúdo) -->
                    <div class="barra" aria-hidden="true"><div class="polegar"></div></div>

                </div>
            </div>

            <!-- Cronômetro único: grande no topo e, ao rolar, encolhe e se fixa no canto -->
            <div class="timer-prova" id="timer" role="timer" aria-label="Tempo restante"
                 data-restante="<?php echo $restante_ms; ?>">45:00:00</div>

            <!-- Aviso de tempo encerrado (aparece quando o cronômetro chega a zero) -->
            <div class="aviso-fundo aviso-tempo" id="aviso-tempo" role="alertdialog" aria-live="assertive" hidden>
                <div class="aviso-caixa">
                    <p>Seu tempo acabou!</p>
                    <button type="button" id="btn-encerrar-prova">Encerrar avaliação</button>
                </div>
            </div>

        </main>
    </div>
    <script src="style/escala.js"></script>
    <script src="style/scrollbar.js"></script>
    <script src="style/curva.js"></script>
    <script src="style/aviso.js"></script>
    <script src="style/validar.js"></script>
    <script src="style/timer.js"></script>
</body>

</html>
