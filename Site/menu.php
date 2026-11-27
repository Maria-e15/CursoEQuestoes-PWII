<?php

session_start();


header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');


$aulas   = require __DIR__ . '/config/aulas.php';
$ajustes = require __DIR__ . '/config/ajustes.php';


$concluidas = 0;
$proxima = 0;
$concluida = [];
foreach ($aulas as $numero => $aula) {
    $concluida[$numero] = !empty($_SESSION['aula_concluida_' . $numero]) || isset($_SESSION['resultado_aula_' . $numero]);
    if ($concluida[$numero]) {
        $concluidas++;
    } elseif ($proxima === 0) {
        $proxima = $numero;
    }
}
if ($proxima === 0) {
    $proxima = 1;
}


$avaliacao_liberada = $ajustes['liberar_avaliacao_para_teste'] || ($concluidas === count($aulas));

if (isset($_GET['diagnostico'])) {
    header('Content-Type: text/plain; charset=utf-8');
    echo "Diagnóstico do progresso (menu.php?diagnostico=1)\n\n";
    foreach ($aulas as $numero => $aula) {
        echo 'Aula ' . $numero . ': vídeo=' . (!empty($_SESSION['video_concluido_' . $numero]) ? 'sim' : 'não')
           . ' | exercícios respondidos=' . ($concluida[$numero] ? 'sim' : 'não') . "\n";
    }
    echo "\nAulas concluídas: $concluidas de " . count($aulas) . "\n";
    echo 'Avaliação final liberada: ' . ($avaliacao_liberada ? 'sim' : 'não') . "\n";
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Aulas | InterseC</title>
    <link rel="stylesheet" href="style/telas.css">
</head>

<body>
    <div class="moldura">
        <main class="tela menu">

          
            <div class="pagina">
                <div class="pagina-conteudo">

                    
                    <div class="simbolos" aria-hidden="true"></div>

                    <svg class="fundo-svg" viewBox="0 0 402 874" aria-hidden="true">
                        <path fill="#D4D1FE" d="M0,523 C7.2,521.5 28.7,519.3 43.0,514.0 C57.3,508.7 71.7,498.7 86.0,491.0 C100.3,483.3 114.7,474.2 129.0,468.0 C143.3,461.8 157.8,457.0 172.0,454.0 C186.2,451.0 199.8,449.5 214.0,450.0 C228.2,450.5 242.7,453.5 257.0,457.0 C271.3,460.5 285.7,466.0 300.0,471.0 C314.3,476.0 328.7,482.0 343.0,487.0 C357.3,492.0 376.2,497.8 386.0,501.0 C395.8,504.2 399.3,505.2 402.0,506.0 V874 H0 Z"/>
                    </svg>
                    <div class="lavanda-corpo" aria-hidden="true"></div>
                    <div class="simbolos simbolos-sobre" aria-hidden="true"></div>

                   
                    <img class="onda-menu" src="imgs/wave.png" alt="">

                    <a class="pilula" href="index.html" aria-label="InterseC – voltar ao início">
                        <img src="imgs/logo.png" alt="">
                        InterseC
                    </a>

                    <h1 class="titulo-menu">
                        Assista à suas<br>aulas <strong>gratuitas!</strong>
                    </h1>

                    <svg class="texto-curvo" viewBox="0 0 402 874" aria-hidden="true">
                        <defs>
                            <path id="arco" d="M-12,492 C-10.0,491.7 -12.0,492.3 0.0,490.0 C12.0,487.7 41.7,485.0 60.0,478.0 C78.3,471.0 93.3,456.8 110.0,448.0 C126.7,439.2 140.8,430.7 160.0,425.0 C179.2,419.3 205.0,414.0 225.0,414.0 C245.0,414.0 260.8,418.7 280.0,425.0 C299.2,431.3 319.7,443.2 340.0,452.0 C360.3,460.8 387.0,471.7 402.0,478.0 C417.0,484.3 425.3,488.0 430.0,490.0"/>
                        </defs>
                        <text><textPath id="tp" href="#arco" data-texto="vídeo aulas • material didático • avaliação final • ">vídeo aulas • material didático • avaliação final • </textPath></text>
                    </svg>

                    <div class="lista">
                        <?php foreach ($aulas as $numero => $aula): ?>
                            <section class="aula<?php echo $concluida[$numero] ? ' concluida' : ''; ?>">
                                <a class="aula-botao" href="aula<?php echo $numero; ?>.php"
                                   aria-label="Assistir à aula <?php echo $numero; ?>">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M7.5 4.6 L19.4 11.2 Q20.4 12 19.4 12.8 L7.5 19.4 Q6 20.2 6 18.6 V5.4 Q6 3.8 7.5 4.6 Z"/>
                                    </svg>
                                </a>
                                <div class="aula-rotulo">Aula <span><?php echo str_pad($numero, 2, '0', STR_PAD_LEFT); ?>.</span></div>
                                <div class="aula-titulo">
                                    <?php echo htmlspecialchars($aula['titulo']); ?>
                                    <span><?php echo htmlspecialchars($aula['subtitulo']); ?></span>
                                </div>
                            </section>
                        <?php endforeach; ?>

                        <section class="final">
                            <?php if ($avaliacao_liberada): ?>
                                <a class="btn-final" href="startAvaliacao.php">
                                    <img src="imgs/unlockedPadlock.png" alt="">
                                    <span>Avaliação<br>final</span>
                                </a>
                            <?php else: ?>
                                <a class="btn-final bloqueado" href="#" data-aviso="Finalize todas as aulas primeiro!">
                                    <img src="imgs/padlock.png" alt="">
                                    <span>Avaliação<br>final</span>
                                </a>
                            <?php endif; ?>

                            <p>
                                Responda corretamente ao<br>
                                menos 7 questões das 10 totais<br>
                                e finalize o curso Descomplicando<br>
                                a Probabilidade.
                            </p>

                            <a class="link-ref" href="referencias.php">Referências</a>
                        </section>
                    </div>

                 
                    <div class="barra" aria-hidden="true"><div class="polegar"></div></div>

                </div>
            </div>

        </main>
    </div>
    <script src="style/escala.js"></script>
    <script src="style/scrollbar.js"></script>
    <script src="style/aviso.js"></script>
    <script>
        
        window.addEventListener('pageshow', function (e) { if (e.persisted) location.reload(); });
    </script>
    <script src="style/curva.js"></script>
</body>

</html>
