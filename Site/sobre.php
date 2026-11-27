<?php


$sobreCurso = 'O curso de Probabilidade foi desenvolvido para ensinar, de maneira simples e prática, os principais conceitos relacionados à probabilidade e às chances de ocorrência de determinados acontecimentos. Ao longo de cinco aulas, você aprenderá os fundamentos do conteúdo, conhecerá exemplos do cotidiano e resolverá atividades para colocar seus conhecimentos em prática. Ao final do curso, haverá uma avaliação para testar o que foi aprendido durante as aulas e verificar seu desempenho.';

$paraQuem = 'Este curso é destinado a estudantes e a todas as pessoas que desejam aprender ou aprimorar seus conhecimentos sobre Probabilidade. Não é necessário ter conhecimentos avançados sobre o assunto, pois o conteúdo foi organizado para facilitar o aprendizado desde os conceitos básicos. Se você tem curiosidade em entender as chances de algo acontecer e como a probabilidade está presente no nosso dia a dia, este curso é para você!';

$porTras = 'Este projeto foi desenvolvido por Henrique Suhr, Maria Eduarda Nascimento dos Santos e Mariana da Silva Gonçalves, estudantes do 2º ano do Ensino Médio integrado ao curso técnico de Desenvolvimento de Sistemas da ETEC Vasco Antônio Venchiarutti. O curso foi criado como parte de um projeto educacional, unindo tecnologia e educação com o objetivo de compartilhar conhecimentos matemáticos de forma acessível, interativa e interessante.';


$secoes = [
    ['titulo' => 'O que é o<br>curso<br><em>InterseC?</em>', 'menor' => true,  'texto' => $sobreCurso],
    ['titulo' => 'Para <em>quem</em> é<br>o curso?',          'menor' => false, 'texto' => $paraQuem],
    ['titulo' => 'Quem está<br>por trás?',                    'menor' => false, 'texto' => $porTras],
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
