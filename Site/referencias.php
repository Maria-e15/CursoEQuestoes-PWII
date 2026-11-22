<?php

// Para adicionar uma referência, basta incluir um novo item neste vetor:
// o gradiente cresce sozinho e o espaçamento se mantém.
$referencias = [
    'SILVA, Lucas Ramos; MENDES, Beatriz. Probabilidade sem Mistérios: a matemática explicada por estudantes. 2. ed. São Paulo: Editora Intersec, 2026. 145 p.',
    'SOUZA, Carlos Henrique de. O Pensamento Estocástico no Ensino Médio: novas abordagens didáticas. Rio de Janeiro: Ciência Moderna, 2025.',
    'ALMEIDA, Mariana F.; OLIVEIRA, Roberto. A interseção entre a teoria dos conjuntos e a análise combinatória no ambiente escolar. Revista Brasileira de Educação Matemática, São Paulo, v. 14, n. 3, p. 45-58, maio/ago. 2025.',
    'SANTOS, Thiago M. Modelagem probabilística para jovens: desmistificando o acaso. Cadernos de Estatística Aplicada, Belo Horizonte, v. 22, n. 1, p. 12-29, jan./abr. 2026.',
];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Referências | InterseC</title>
    <link rel="stylesheet" href="style/telas.css">
</head>

<body>
    <div class="moldura">
        <main class="tela referencias">

            <div class="pagina">
                <div class="pagina-conteudo">

                    <!-- Camada 1: fundo branco + símbolos matemáticos -->
                    <div class="simbolos" aria-hidden="true"></div>

                    <!-- Camadas 2 e 3: gradiente (cresce com o conteúdo), título e referências -->
                    <div class="ref-corpo">
                        <h1 class="titulo-ref"><em>Referências</em><br>de pesquisa</h1>

                        <a class="btn-voltar" href="menu.php" aria-label="Voltar para as aulas"
                           style="left:320px; top:102px; width:50px;">
                            <img src="imgs/gobackBtn.png" alt="">
                        </a>

                        <ul class="lista-refs">
                            <?php foreach ($referencias as $referencia): ?>
                                <li><?php echo htmlspecialchars($referencia); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <!-- Curva inferior do gradiente -->
                    <svg class="ref-curva" viewBox="0 0 402 70" preserveAspectRatio="none" aria-hidden="true">
                        <path fill="#D4D1FE" d="M0,0 H402 V8 C393.8,7.0 371.0,3.3 353.0,2.0 C335.0,0.7 313.7,-1.3 294.0,0.0 C274.3,1.3 254.7,3.2 235.0,10.0 C215.3,16.8 195.5,32.2 176.0,41.0 C156.5,49.8 137.5,59.0 118.0,63.0 C98.5,67.0 78.7,66.7 59.0,65.0 C39.3,63.3 9.8,55.0 0.0,53.0 Z"/>
                    </svg>
                    <div class="ref-rodape"></div>

                    <!-- Barra de rolagem (aparece só se a lista passar da tela) -->
                    <div class="barra" aria-hidden="true"><div class="polegar"></div></div>

                </div>
            </div>

        </main>
    </div>
    <script src="style/escala.js"></script>
    <script src="style/scrollbar.js"></script>
</body>

</html>
