<?php

// Conteúdo da página "Sobre". Para trocar os textos, edite este vetor.
$lorem_1 = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae fermentum diam. Cras sollicitudin magna a felis convallis commodo. Curabitur sagittis odio a est hendrerit vulputate. Donec metus augue, consequat eget purus et, finibus ornare turpis. Etiam et augue nibh. Donec facilisis nisi elit, eget venenatis lorem ornare eu, pellentesque, sollicitudin purus quis, condimentum est. Donec in felis ac risus rutrum iaculis vel sit amet ante. In hac habitasse platea dictumst. Vivamus ultrices imperdiet dignissim. Vestibulum lobortis odio mi. Praesent varius congue luctus.';

$lorem_2 = 'Nunc sollicitudin nibh quis dapibus cursus. Quisque vel ligula vehicula, cursus nisi vel, scelerisque est. Suspendisse faucibus egestas sapien, quis vulputate arcu ullamcorper a. Cras eleifend bibendum ligula. Ut eu suscipit arcu, at condimentum turpis. Nulla feugiat dolor eu sollicitudin hendrerit. Nullam interdum scelerisque egestas. Curabitur magna lacus, facilisis at dui vel, auctor malesuada massa.';

// O título aceita <em> para destacar uma palavra em azul. "menor" = primeiro título (mais estreito, por causa da seta).
$secoes = [
    ['titulo' => 'O que é o<br>curso<br><em>InterseC?</em>', 'menor' => true,  'texto' => $lorem_1],
    ['titulo' => 'Para <em>quem</em> é<br>o curso?',          'menor' => false, 'texto' => $lorem_2],
    ['titulo' => 'Quem está<br>por trás?',                    'menor' => false, 'texto' => $lorem_2],
];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Sobre | InterseC</title>
    <link rel="stylesheet" href="style/telas.css">
</head>

<body>
    <div class="moldura">
        <main class="tela sobre">

            <div class="pagina">
                <div class="pagina-conteudo">

                    <!-- Fundo: gradiente azul claro → branco com símbolos matemáticos -->
                    <div class="simbolos simbolos-sobre" aria-hidden="true"></div>

                    <img class="onda-topo" src="imgs/waveScreen1.png" alt="">

                    <a class="btn-voltar" href="index.html" aria-label="Voltar"
                       style="left:327px; top:176px; width:52px;">
                        <img src="imgs/gobackBtn.png" alt="">
                    </a>

                    <div class="sobre-conteudo">
                        <?php foreach ($secoes as $secao): ?>
                            <section class="bloco">
                                <h1 class="titulo-bloco<?php echo $secao['menor'] ? ' menor' : ''; ?>"><?php echo $secao['titulo']; ?></h1>
                                <p class="texto-bloco"><?php echo htmlspecialchars($secao['texto']); ?></p>
                            </section>
                        <?php endforeach; ?>
                    </div>

                    <!-- Barra de rolagem personalizada -->
                    <div class="barra" aria-hidden="true"><div class="polegar"></div></div>

                </div>
            </div>

        </main>
    </div>
    <script src="style/escala.js"></script>
    <script src="style/scrollbar.js"></script>
</body>

</html>
