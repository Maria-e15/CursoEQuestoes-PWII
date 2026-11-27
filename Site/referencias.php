<?php

$referencias = [
    'TODA MATÉRIA. Probabilidade. Toda Matéria, 2026. Disponível em: https://www.todamateria.com.br/probabilida
    de/. Acesso em: 21 out. 2026.',
'BRASIL ESCOLA. Probabilidade da união de dois eventos. Brasil Escola, 2026. Disponível em: https://brasilescola.uol.com.br/matematica
/probabilidade-uniao-dois-eventos.htm. Acesso em: 22 out. 2026.',
'ESTRATÉGIA VESTIBULARES. Probabilidade da intersecção. Portal Estratégia Vestibulares, 2026. Disponível em: https://vestibulares.estrategia.com/portal
/materias/matematica/probabilidade-da-interseccao/. Acesso em: 22 out. 2026.',
'BRASIL ESCOLA. Probabilidade condicional. Brasil Escola, 2026. Disponível em: https://brasilescola.uol.com.br/matematica
/probabilidade-condicional.htm. Acesso em: 21 out. 2026.',
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

                   
                    <div class="simbolos" aria-hidden="true"></div>

                 
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

                 
                    <svg class="ref-curva" viewBox="0 0 402 70" preserveAspectRatio="none" aria-hidden="true">
                        <path fill="#D4D1FE" d="M0,0 H402 V8 C393.8,7.0 371.0,3.3 353.0,2.0 C335.0,0.7 313.7,-1.3 294.0,0.0 C274.3,1.3 254.7,3.2 235.0,10.0 C215.3,16.8 195.5,32.2 176.0,41.0 C156.5,49.8 137.5,59.0 118.0,63.0 C98.5,67.0 78.7,66.7 59.0,65.0 C39.3,63.3 9.8,55.0 0.0,53.0 Z"/>
                    </svg>
                    <div class="ref-rodape"></div>

                    
                    <div class="barra" aria-hidden="true"><div class="polegar"></div></div>

                </div>
            </div>

        </main>
    </div>
    <script src="style/escala.js"></script>
    <script src="style/scrollbar.js"></script>
</body>

</html>
