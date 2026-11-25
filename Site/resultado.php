<?php

session_start();

$aula = isset($_GET['aula']) ? (int) $_GET['aula'] : 0;

// Sem resultado guardado, volta ao menu
if ($aula < 1 || $aula > 5 || !isset($_SESSION['resultado_aula_' . $aula])) {
    header('Location: menu.php');
    exit;
}

$resultado = $_SESSION['resultado_aula_' . $aula];
$acertos   = (int) $resultado['acertos'];
$total     = (int) $resultado['total'];
$erros     = $resultado['erros'];
$numero    = str_pad($aula, 2, '0', STR_PAD_LEFT);

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Resultados - Aula <?php echo $numero; ?> | InterseC</title>
    <link rel="stylesheet" href="style/telas.css">
</head>

<body>
    <div class="moldura">
        <main class="tela res">

            <!-- Fundo branco + símbolos matemáticos -->
            <div class="simbolos" aria-hidden="true"></div>

            <h1 class="res-titulo">Exercícios<br><span><em>Aula</em> <?php echo $numero; ?>.</span></h1>

            <section class="res-card">
                <h2 class="res-h">Resultados</h2>

                <p class="res-placar"><span><?php echo $acertos; ?></span>/<span><?php echo $total; ?></span></p>

                <h3 class="res-erros-t">Erros:</h3>

                <?php if (empty($erros)): ?>
                    <p class="res-nenhum">Nenhum<br>erro!</p>
                    <div class="res-icone" aria-label="Nenhum erro">
                        <svg viewBox="0 0 80 80" aria-hidden="true">
                            <defs><clipPath id="rc"><circle cx="40" cy="40" r="38"/></clipPath></defs>
                            <circle cx="40" cy="40" r="38" fill="#1AA383"/>
                            <g clip-path="url(#rc)" fill="none" stroke="#10755D" stroke-width="9" stroke-linecap="round" stroke-linejoin="round">
                                <?php for ($i = 2; $i <= 30; $i += 2): ?>
                                    <path d="M22 41 L35 54 L58 28" transform="translate(<?php echo $i; ?> <?php echo $i; ?>)"/>
                                <?php endfor; ?>
                            </g>
                            <path d="M22 41 L35 54 L58 28" fill="none" stroke="#EAF6F2" stroke-width="9" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                <?php else: ?>
                    <ul class="res-lista">
                        <?php foreach ($erros as $n): ?>
                            <li><i></i><?php echo (int) $n; ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="res-icone" aria-label="Há questões erradas">
                        <svg viewBox="0 0 80 80" aria-hidden="true">
                            <defs><clipPath id="rc"><circle cx="40" cy="40" r="38"/></clipPath></defs>
                            <circle cx="40" cy="40" r="38" fill="#EF5350"/>
                            <g clip-path="url(#rc)" fill="none" stroke="#A81414" stroke-width="10" stroke-linecap="round">
                                <?php for ($i = 2; $i <= 30; $i += 2): ?>
                                    <path d="M26 26 L54 54 M54 26 L26 54" transform="translate(<?php echo $i; ?> <?php echo $i; ?>)"/>
                                <?php endfor; ?>
                            </g>
                            <path d="M26 26 L54 54 M54 26 L26 54" fill="none" stroke="#FFFFFF" stroke-width="10" stroke-linecap="round"/>
                        </svg>
                    </div>
                <?php endif; ?>

                <a class="res-continuar" href="menu.php">Continuar</a>
            </section>

            <p class="res-novamente"><a href="questoes.php?aula=<?php echo $aula; ?>&amp;novo=1">Tentar novamente</a></p>

        </main>
    </div>
    <script src="style/escala.js"></script>
</body>

</html>
