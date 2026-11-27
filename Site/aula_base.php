<?php

// Página da videoaula (modelo único usado por aula1.php ... aula5.php)
session_start();

$aulas   = require __DIR__ . '/config/aulas.php';
$ajustes = require __DIR__ . '/config/ajustes.php';

if (!isset($aula) || !isset($aulas[$aula])) {
    die('Aula inválida.');
}

$dados  = $aulas[$aula];
$numero = str_pad($aula, 2, '0', STR_PAD_LEFT);

// ID do vídeo do YouTube a partir do link
parse_str((string) parse_url($dados['video'], PHP_URL_QUERY), $consulta_video);
$id_video = $consulta_video['v'] ?? '';

// Exercícios liberados? (só depois de terminar o vídeo)
$exercicios_liberados = !empty($_SESSION['video_concluido_' . $aula]) || $ajustes['liberar_exercicios_para_teste'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Aula <?php echo $numero; ?> | InterseC</title>
    <link rel="stylesheet" href="style/telas.css">
</head>

<body>
    <div class="moldura">
        <main class="tela aula-pag">

            <div class="simbolos" aria-hidden="true"></div>

            <svg class="fundo-svg" viewBox="0 0 402 874" aria-hidden="true">
                <defs>
                    <linearGradient id="grad" gradientUnits="userSpaceOnUse" x1="0" y1="500" x2="0" y2="874">
                        <stop offset="0" stop-color="#D4D1FE"/>
                        <stop offset=".9" stop-color="#EFEEFF"/>
                        <stop offset="1" stop-color="#FEFEFF"/>
                    </linearGradient>
                </defs>
                <path fill="url(#grad)" d="M0,500 C5.7,502.5 23.0,510.8 34.0,515.0 C45.0,519.2 55.3,521.7 66.0,525.0 C76.7,528.3 87.3,531.8 98.0,535.0 C108.7,538.2 119.3,541.7 130.0,544.0 C140.7,546.3 151.2,547.3 162.0,549.0 C172.8,550.7 184.2,553.2 195.0,554.0 C205.8,554.8 216.3,554.5 227.0,554.0 C237.7,553.5 248.3,553.0 259.0,551.0 C269.7,549.0 280.3,546.3 291.0,542.0 C301.7,537.7 312.2,531.2 323.0,525.0 C333.8,518.8 342.8,511.8 356.0,505.0 C369.2,498.2 394.3,487.5 402.0,484.0 V874 H0 Z"/>
            </svg>

            <h1 class="titulo-aula">
                <span class="n">Aula <?php echo $numero; ?>.</span>
                <span class="n"><?php echo htmlspecialchars($dados['titulo']); ?></span>
                <em><?php echo htmlspecialchars($dados['subtitulo']); ?></em>
            </h1>

            <a class="btn-voltar" href="menu.php" aria-label="Voltar para as aulas"
               style="left:329px; top:64px; width:50px;">
                <img src="imgs/gobackBtn.png" alt="">
            </a>

            <section class="faixa-material">
                <?php if (!empty($dados['material']) && is_file(__DIR__ . '/' . $dados['material'])): ?>
                    <a class="material" href="<?php echo htmlspecialchars($dados['material']); ?>" download
                       aria-label="Baixar o material didático desta aula">
                        <img src="imgs/downloadBook.png" alt="">
                    </a>
                <?php else: ?>
                    <a class="material bloqueado" href="#" data-aviso="Material em breve!"
                       aria-label="Baixar o material didático desta aula">
                        <img src="imgs/downloadBook.png" alt="">
                    </a>
                <?php endif; ?>
                <p>Acompanhe o<br>material didático<br>desta aula!</p>
            </section>

            <a id="btn-exercicios"
               class="btn-exercicios<?php echo $exercicios_liberados ? '' : ' bloqueado'; ?>"
               href="questoes.php?aula=<?php echo $aula; ?>"
               data-aviso="Finalize a aula!">
                <img id="icone-cadeado"
                     src="imgs/<?php echo $exercicios_liberados ? 'unlockedPadlock' : 'padlock'; ?>.png"
                     data-aberto="imgs/unlockedPadlock.png" alt="">
                <span>Exercícios</span>
            </a>
            <p id="legenda-exercicios" class="legenda-exercicios"
               data-bloqueada="Termine a videoaula e|desbloqueie a lista de exercícios"
               data-liberada="Finalize a aula com exercícios.">
                <?php if ($exercicios_liberados): ?>
                    Finalize a aula com exercícios.
                <?php else: ?>
                    Termine a videoaula e<br>desbloqueie a lista de exercícios
                <?php endif; ?>
            </p>
            
            <section class="moldura-video">
                <div class="tela-video">
                    <div id="player" data-video-id="<?php echo htmlspecialchars($id_video); ?>"
                         data-aula="<?php echo $aula; ?>"></div>
                </div>
            </section>

        </main>
    </div>
    <script src="style/escala.js"></script>
    <script src="style/aviso.js"></script>
    <script src="style/aula.js"></script>
</body>

</html>
