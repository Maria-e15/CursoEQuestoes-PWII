
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 1 - Conceitos Básicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
    <main class="container mt-5">
        <h1 class="mb-4"><strong>Aula 1<strong></h1><br>

        <h1><strong>Conceitos Básicos da Probabilidade</strong></h3><br>

        <h3 style = "text-align: justify;"> <strong>Teoria da Probabilidade e Experimento Aleatório:</strong> 
        A teoria da probabilidade é o campo da Matemática que estuda experimentos ou fenômenos aleatórios. Através dela, é possível analisar as chances de um determinado evento ocorrer.
        <br><br>
        Um experimento aleatório é aquele cujo resultado não pode ser conhecido antes de sua realização. Quando calculamos a probabilidade, estamos associando um grau de confiança à ocorrência dos resultados possíveis de experimentos cujos resultados não podem ser determinados antecipadamente. Assim, a probabilidade é a medida da chance de algo acontecer. 
        <br><br>
        Um exemplo clássico de experimento aleatório é jogar um dado para o alto. Ao cair, não é possível prever com total certeza qual das 6 faces estará voltada para cima.
        <br><br></h3>

        <h3> <strong>Espaço Amostral (Ω) e Cardinalidade</strong></h3>
        <br><br>

        <h3 style = "text-align: justify;"> <strong>Definição de Espaço Amostral:</strong> 
        O espaço amostral é o conjunto de todos os resultados possíveis obtidos a partir de um experimento aleatório. Representa-se o espaço amostral pelo símbolo Ω.</h3>
        <br><br>

        <h3><strong>Exemplos Práticos:</strong></h3>
        <br><br>

        <h3 style = "text-align: justify;">Exemplos de Espaços Amostrais em Experimentos Aleatórios:<br>
        • Lançamento de um dado: O espaço amostral é composto pelas seis faces que o compõem: Ω = {1, 2, 3, 4, 5, 6}.<br>
        • Lançamento de uma moeda: O espaço amostral contém dois resultados possíveis: Ω = {cara, coroa}.<br>
        • Retirada de uma carta de baralho: O espaço amostral corresponde às 52 cartas que compõem o baralho.<br><br>
        <strong>Cardinalidade:</strong> 
        A quantidade de elementos em um conjunto chama-se cardinalidade, expressa pela letra n seguida do símbolo do conjunto entre parênteses. Assim, a cardinalidade do espaço amostral do lançamento de um dado é n(Ω) = 6. Já no lançamento de uma moeda, a cardinalidade é n(Ω) = 2.<br><br>
        <strong>Pontos Amostrais e Espaço Equiprovável:</strong>
         Cada um dos resultados possíveis é chamado de ponto amostral do conjunto universo. Se cada um dos pontos amostrais possuir a mesma probabilidade de ocorrer, dizemos que este espaço amostral é equiprovável.<br><br>
        <strong>Exemplo da Urna:</strong>
         Exemplo de Espaço Equiprovável: Considere uma urna com 4 esferas de mesmo tamanho e de cores diferentes: amarela, azul, preta e branca. Ao sortear uma esfera ao acaso, sendo o experimento honesto, todas as cores possuem a mesma chance de serem sorteadas (25% cada).<br>
        </h3> <br>

        <img src= "imgs/imagem1.png" alt= "Figura 1: Representação gráfica do Espaço Amostral (Ω) e do Evento (A)." style="width: 99%; height: auto;"><br><br>

        <h3><strong>Eventos na Probabilidade</strong><br><br></h3>

        <h3 style = "text-align: justify;"><strong>Definição de Evento:</strong> Uma vez definidos o experimento aleatório e o espaço amostral, para calcular uma probabilidade é preciso fazer uma pergunta. Esta pergunta define o conceito de evento.<br>
        Evento é qualquer subconjunto do espaço amostral de um experimento aleatório.<br><br>
        <strong>Exemplo de Evento:</strong> No lançamento de um dado de seis faces, se perguntarmos 'Qual a probabilidade de sair um número par?', o conjunto evento será A = {2, 4, 6}, com cardinalidade n(A) = 3.<br><br></h3>

        <h3><strong>Tipos Especiais de Eventos</strong><br><br></h3>

        <h3 style = "text-align: justify;"><strong>1. Evento Certo:</strong> O conjunto do evento é exatamente igual ao espaço amostral, ou seja, possuem os mesmos elementos (chance de ocorrência de 100%). Exemplo: Em uma delegação feminina de atletas, sortear uma pessoa ao acaso e ela ser mulher.
        <br><br>
        <strong>2. Evento Impossível:</strong> O conjunto do evento é vazio (chance de ocorrência de 0%). Exemplo: Imagine uma caixa com bolas numeradas de 1 a 20 e todas vermelhas. O evento 'tirar uma bola com número maior que 30' é impossível.
        <br><br>
        <strong>3. Evento Complementar:</strong> Dois eventos cujos conjuntos formam, juntos, todo o espaço amostral. Exemplo: No lançamento de uma moeda com Ω = {cara, coroa}, se o evento A for 'sair cara' (A = {cara}), o evento B 'sair coroa' (B = {coroa}) é complementar ao evento A.
        <br><br>
        <strong>4. Eventos Mutuamente Exclusivos:</strong> Os conjuntos dos eventos não possuem elementos em comum; a intersecção entre eles é vazia (A ∩ B = ∅). Exemplo: No lançamento de um dado, os eventos A ('ocorrer número menor que 5', A = {1, 2, 3, 4}) e B ('ocorrer número maior que 5', B = {6}) são mutuamente exclusivos.
        </h3><br><br>

        <a href="questoes.php?aula=1" class="btn btn-primary">
        Responder exercícios
        </a>
    </main>

</body>
</html>
