-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01/11/2026 às 21:03
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `database`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `questoes`
--

CREATE TABLE `questoes` (
  `id_questao` bigint(20) NOT NULL,
  `topico` varchar(100) NOT NULL,
  `enunciado` text NOT NULL,
  `alternativa_a` text NOT NULL,
  `alternativa_b` text NOT NULL,
  `alternativa_c` text NOT NULL,
  `alternativa_d` text NOT NULL,
  `alternativa_e` text NOT NULL,
  `resposta_correta` char(1) NOT NULL,
  `aula_referente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `questoes`
--

INSERT INTO `questoes` (`id_questao`, `topico`, `enunciado`, `alternativa_a`, `alternativa_b`, `alternativa_c`, `alternativa_d`, `alternativa_e`, `resposta_correta`, `aula_referente`) VALUES
(1, 'Conceitos Básicos', 'Qual das seguintes situações NÃO representa um experimento aleatório?', 'Lançar uma moeda honesta e observar a face voltada para cima.', 'Retirar uma carta de um baralho completo de 52 cartas sem olhar.', 'Medir a temperatura em que a água pura entra em ebulição ao nível do mar (100 °C).', 'Sortear uma bola numerada em um globo de loteria.', 'Jogar um dado comum de 6 faces e verificar o número obtido.', 'c', 'Aula 1'),
(2, 'Conceitos Básicos', 'No lançamento simultâneo de uma moeda honesta (com faces cara e coroa) e de um dado comum de 6 faces, a cardinalidade do espaço amostral n(Ω) é igual a:', '8', '12', '36', '6', '2', 'b', 'Aula 1'),
(3, 'Conceitos Básicos', 'Em um experimento aleatório que consiste em lançar um dado comum de 6 faces (com números de 1 a 6), assinale a afirmativa correta em relação aos conceitos de eventos:', 'O evento \'obter um número maior que 6\' é um evento certo.', 'O evento \'obter um número menor ou igual a 6\' é um evento impossível.', 'O evento \'obter um número menor que 7\' é um evento certo, com probabilidade de 100%.', 'O evento \'obter um número par\' é um evento impossível.', 'O evento \'obter o número 0\' é um evento certo.', 'c', 'Aula 1'),
(4, 'Conceitos Básicos', 'Se A é o evento \'sortear um número par\' no lançamento de um dado comum de 6 faces (A = {2, 4, 6}), o seu evento complementar Ac é representado por:', 'Sortear o número 2 ou 4.', 'Sortear um número maior que 6.', 'Sortear um número ímpar (1, 3 ou 5).', 'Sortear um número múltiplo de 3.', 'O conjunto vazio.', 'c', 'Aula 1'),
(5, 'Conceitos Básicos', 'Dois eventos A e B definidos em um mesmo espaço amostral Ω são chamados de mutuamente exclusivos (ou mutuamente excludentes) quando:', 'A ocorrência de A garante obrigatoriamente a ocorrência de B.', 'A intersecção entre os dois eventos é vazia, ou seja, A ∩ B = ∅.', 'A união dos eventos A e B resulta em uma probabilidade de 50%.', 'A e B possuem exatamente os mesmos elementos em seus conjuntos.\r\n', 'A probabilidade de A é estritamente maior que a probabilidade de B.', 'b', 'Aula 1'),
(6, 'Conceitos Básicos', 'Uma urna contém 4 esferas de mesmo tamanho e peso, nas cores amarela, azul, preta e branca. Diz-se que este espaço amostral é equiprovável porque:', 'Há maior quantidade de esferas amarelas do que de pretas na urna.', 'Todos os pontos amostrais (cada cor) possuem a mesma probabilidade de ocorrência (25%).', 'O resultado do sorteio da esfera é totalmente previsível antes do experimento.', 'A soma das probabilidades de cada esfera individual é maior do que 1.', 'Sortear a esfera amarela tem 50% de chance e as demais dividem os 50% restantes.', 'b', 'Aula 1'),
(7, 'Cálculo da Probabilidade (Fórmula Geral)', '(FURB 2026 - Prefeitura de Maravilha SC - Q4420657) Em uma turma com 25 estudantes, 12 participam de atividades esportivas no contraturno, oito participam de atividades artísticas e cinco participam de atividades de reforço escolar. Cada um deles participa apenas de uma atividade. Escolhendo-se ao acaso um estudante dessa turma, pode-se afirmar que a probabilidade de ele NÃO participar das atividades esportivas é igual a:', '12/25', '5/12\r\n', '13/25', '13/12', '8/25', 'c', 'Aula 2'),
(8, 'Cálculo da Probabilidade (Fórmula Geral)', '(Texto Base - Baralho) Um baralho comum é formado por 52 cartas divididas igualmente em quatro naipes (copas, paus, ouros e espadas), contendo 13 cartas de cada naipe. Retirando-se uma carta ao acaso desse baralho, qual é a probabilidade de sair uma carta do naipe de paus?', '1/52 (aprox. 1,9%)\r\n', '1/13 (aprox. 7,7%)', '1/4 (ou 25%)', '1/2 (ou 50%)', '3/13 (aprox. 23,0%)', 'c', 'Aula 2'),
(9, 'Cálculo da Probabilidade (Fórmula Geral)', '(Texto Base - Dado) Se lançarmos um dado perfeito de 6 faces, qual é a probabilidade de sair um número estritamente menor que 3 na face voltada para cima?', '1/6 (aprox. 16,6%)', '1/3 (aprox. 33,3%)', '1/2 (ou 50,0%)', '2/3 (aprox. 66,7%)', '5/6 (aprox. 83,3%)', 'b', 'Aula 2'),
(10, 'Cálculo da Probabilidade (Fórmula Geral)', 'Uma urna contém 6 bolas vermelhas, 4 bolas azuis e 5 bolas verdes, todas de mesmo tamanho e formato. Retirando-se uma bola ao acaso dessa urna, qual é a probabilidade de ela ser da cor azul?', '4/15\r\n', '6/15', '1/3', '2/5', '4/11', 'a', 'Aula 2'),
(11, 'Cálculo da Probabilidade (Fórmula Geral)', 'Ao lançar dois dados comuns de 6 faces simultaneamente, qual é a probabilidade de a soma dos pontos obtidos nas faces superiores ser igual a 8?', '1/6\r\n', '5/36', '7/36', '1/9', '1/12', 'b', 'Aula 2'),
(12, 'Cálculo da Probabilidade (Fórmula Geral)', '(SEED-PR 2026 - Q4416597 Adaptada) Um dado de seis lados viciado é lançado. Sabendo-se que uma face prima (2, 3 ou 5) tem 25% a mais de chance de sair do que uma face não prima (1, 4 ou 6), qual é a probabilidade de se obter o número 1 ou o número 6 no lançamento desse dado?', '4/27\r\n', '5/27', '8/27', '1/3', '10/27', 'c', 'Aula 2'),
(13, 'Cálculo da Probabilidade (Fórmula Geral)', '(Unesp 2024) Ana somou dois números distintos sorteados ao acaso do conjunto {8, 9, 10}. Beto multiplicou dois números distintos sorteados ao acaso do conjunto {3, 5, 6}. A probabilidade de que o resultado obtido na conta de Ana tenha sido maior ou igual ao obtido na conta de Beto é igual a:', '1/2\r\n', '2/3', '4/9', '3/8', '5/9', 'e', 'Aula 2'),
(14, 'Cálculo da Probabilidade (Fórmula Geral)', '(IME 2024) Sejam dois dados cúbicos (com faces numeradas de 1 a 6) e um dado na forma de dodecaedro (com faces numeradas de 1 a 12). Em cada tipo de dado, todas as faces possuem a mesma probabilidade de ocorrência. Com um único lançamento de cada dado, a probabilidade de se obter maior pontuação com o dodecaedro do que com os dois dados cúbicos somados é:', '2/3\r\n', '1/6', '7/36', '5/12', '3/16', 'd', 'Aula 2'),
(15, 'União de Dois Eventos', '(UFGD 2024) Lançando-se simultaneamente dois dados comuns e observando-se as faces que caem voltadas para cima, a probabilidade da soma das faces ser igual a 7 ou igual a 9 é:', '1/9\r\n', '5/36', '1/6', '5/18', '7/36', 'd', 'Aula 3'),
(16, 'União de Dois Eventos', '(Brasil Escola - Exemplo 1) Em uma sala de aula há 25 alunos, sendo 15 meninas e 10 meninos. Sabendo que nessa sala há 8 alunos que usam óculos e que 3 deles são meninas, qual é a probabilidade de o aluno sorteado ao acaso ser uma menina OU alguém que usa óculos?', '60%\r\n', '72%', '80%', '88%', '92%', 'c', 'Aula 3'),
(17, 'União de Dois Eventos', '(Brasil Escola - Exemplo 2) Uma moeda honesta foi lançada três vezes consecutivas. Qual é a probabilidade de se obter, exatamente, duas caras OU exatamente duas coroas?', '25%\r\n', '50%', '75%', '87,5%', '100%', 'c', 'Aula 3'),
(18, 'União de Dois Eventos', 'Escolhendo-se ao acaso um número inteiro do conjunto dos números de 1 a 30 inclusive, qual é a probabilidade de o número sorteado ser um múltiplo de 3 OU um múltiplo de 5?', '7/30', '11/30', '7/15', '8/15', '3/5', 'c', 'Aula 3'),
(19, 'União de Dois Eventos', 'Retirando-se ao acaso uma única carta de um baralho completo de 52 cartas, qual é a probabilidade de a carta sorteada ser um Rei OU uma carta do naipe de Copas?', '4/13', '17/52', '9/26', '5/13', '1/2', 'a', 'Aula 3'),
(20, 'União de Dois Eventos', '(SEED-PR 2026 - Q4416599) Considere um espaço amostral Ω = A ∪ B ∪ C ∪ D, sendo as uniões disjontas. Sabendo-se que:\r\nI. A probabilidade de ocorrer A, ou B, ou D é de 70%;\r\nII. A probabilidade de ocorrer A, ou C, ou D é de 80%;\r\nIII. A probabilidade de ocorrer B, ou C, ou D é de 50%.\r\nQual é a probabilidade de ocorrer o evento D?\r\n', '0', '0,2', '0,3', '0,5', '1', 'a', 'Aula 3'),
(21, 'União de Dois Eventos', 'Em uma pesquisa realizada em uma empresa com 100 funcionários, constatou-se que 60 gostam de café, 40 gostam de chá e 15 gostam de ambas as bebidas. Escolhendo-se um funcionário ao acaso, a probabilidade de ele gostar de pelo menos uma dessas bebidas (café ou chá) é igual a:', '85%', '100%', '75%', '65%', '50%', 'a', 'Aula 3'),
(22, 'Probabilidade de Intersecção', '(Estratégia Vestibulares - Exemplo Dado) Pedro lança um dado comum de 6 faces duas vezes consecutivas. Ele ganha o jogo se obtiver um número ímpar no primeiro lançamento E o número 6 no segundo lançamento. Como os lançamentos são eventos independentes, qual a probabilidade de Pedro ganhar o jogo?', '1/36 (aprox. 2,78%)', '1/12 (aprox. 8,33%)', '1/6 (aprox. 16,67%)', '1/4 (ou 25,0%)', '5/36 (aprox. 13,89%)', 'b', 'Aula 4'),
(23, 'Probabilidade de Intersecção', '(Unicamp 2024) João e Maria estão passeando pela floresta e levaram uma sacola com 100 pedrinhas (60 brancas e 40 pretas). Durante o caminho, já tinham sido jogadas 35 pedrinhas brancas e 25 pedrinhas pretas, restando na sacola 25 brancas e 15 pretas. Qual é a probabilidade de as próximas duas pedrinhas jogadas (retiradas sem reposição) serem brancas?', '7/13', '5/13', '11/52', '7/52', '3/13', 'b', 'Aula 4'),
(24, 'Probabilidade de Intersecção', 'Uma urna contém 5 bolas vermelhas e 3 bolas azuis. Uma bola é retirada ao acaso, sua cor é anotada e a bola é devolvida à urna (amostragem COM reposição). Em seguida, retira-se uma segunda bola. A probabilidade de ambas as bolas retiradas serem vermelhas é:', '15/64', '25/64', '5/14', '10/64', '9/64', 'b', 'Aula 4'),
(25, 'Probabilidade de Intersecção', 'Uma caixa contém 5 bolas vermelhas e 3 bolas azuis. Duas bolas são retiradas sucessivamente da caixa, SEM reposição. Qual é a probabilidade de a primeira bola ser vermelha E a segunda bola ser azul?', '15/64', '15/56', '5/28', '9/56', '15/28', 'b', 'Aula 4'),
(26, 'Probabilidade de Intersecção', 'Duas moedas honestas são lançadas simultaneamente para o alto. A probabilidade de obter a face \'cara\' na primeira moeda E a face \'cara\' na segunda moeda é igual a:', '1/2 (50%)\r\n', '1/4 (25%)', '3/4 (75%)', '1/8 (12,5%)', '1/3 (33,3%)', 'b', 'Aula 4'),
(27, 'Probabilidade de Intersecção', 'Dois atiradores, A e B, disparam simultaneamente contra um mesmo alvo. A probabilidade de o atirador A acertar o alvo é de 0,7 (70%) e a de o atirador B acertar é de 0,8 (80%). Sabendo que os desempenhos dos atiradores são eventos independentes, qual é a probabilidade de AMBOS acertarem o alvo?', '0,56 (ou 56%)\r\n', '0,75 (ou 75%)', '0,96 (ou 96%)', '0,80 (ou 80%)', '0,64 (ou 64%)', 'a', 'Aula 4'),
(28, 'Probabilidade de Intersecção', '(SEED-PR 2026 - Q4416594 Adaptada) Em um sistema de cadastramento de senhas, cada código é gerado pela escolha aleatória e independente de 2 algarismos de 0 a 9 (permitindo repetição). Qual é a probabilidade de o primeiro algarismo ser PAR e o segundo algarismo também ser PAR?', '1/2', '1/4 (ou 25%)', '1/5', '1/10', '2/5', 'b', 'Aula 4'),
(29, 'Probabilidade Condicional', '(Uerj 2024) A partir dos dados de uma pesquisa populacional, escolhe-se ao acaso uma pessoa de um determinado grupo. Em uma amostra de 100 mulheres, 44 são pretas e 56 pertencem a outras etnias. Sabendo-se que a pessoa escolhida é uma MULHER, a probabilidade de ela ser preta é mais próxima de:', '0,64', '0,56', '0,44', '0,36', '0,50', 'c', 'Aula 5'),
(30, 'Probabilidade Condicional', '(Brasil Escola - Exemplo Moeda) Uma moeda comum foi lançada três vezes consecutivas e o resultado foi anotado. Qual é a probabilidade de se obter exatamente duas caras, SABENDO QUE o primeiro resultado foi cara?', '25%', '33,3%', '50%', '66,7%', '75%', 'c', 'Aula 5'),
(31, 'Probabilidade Condicional', '(Texto Base - Exemplo Dados) Durante o lançamento simultâneo de dois dados comuns de 6 faces, deseja-se calcular a probabilidade de a soma das faces superiores ser igual a 6, SABENDO QUE os resultados obtidos em ambos os dados foram números PARES. Essa probabilidade é de:', '1/9', '2/9', '1/3', '4/9', '1/6', 'b', 'Aula 5'),
(32, 'Probabilidade Condicional', 'Em um grupo de 50 pessoas composto por 30 homens e 20 mulheres, 12 dos homens usam óculos e 8 das mulheres usam óculos. Sorteia-se uma pessoa ao acaso e verifica-se que ela é um HOMEM. A probabilidade de esse homem usar óculos é:', '24%', '40%', '50%', '60%', '12%', 'b', 'Aula 5'),
(33, 'Probabilidade Condicional', 'Lança-se um dado comum de 6 faces. Sabendo que o número sorteado foi um número PAR, qual é a probabilidade condicional de esse número ser estritamente maior do que 3?', '1/3', '1/2', '2/3', '1/6', '5/6', 'c', 'Aula 5'),
(34, 'Probabilidade Condicional', 'Uma carta é retirada ao acaso de um baralho completo de 52 cartas. Sabendo-se previamente que a carta sorteada é da cor VERMELHA (ou seja, de Copas ou Ouros), qual é a probabilidade de ela ser um Rei?', '1/13', '2/13', '1/26', '1/4', '1/52', 'a', 'Aula 5'),
(35, 'Probabilidade Condicional', 'Em um estudo clínico para diagnosticar uma condição de saúde em 200 pacientes, 50 indivíduos apresentaram resultado POSITIVO no teste inicial. Desses 50 testes positivos, confirma-se que 40 pacientes realmente possuem a condição. Escolhendo-se ao acaso um paciente cujo teste deu positivo, qual a probabilidade condicional de ele efetivamente possuir a condição?', '20%', '50%', '80%', '85%', '90%', 'c', 'Aula 5'),
(36, 'Probabilidade Condicional', 'Um número inteiro do conjunto {1, 2, 3, ..., 20} é escolhido ao acaso. Sabendo que o número escolhido é um MÚLTIPLO DE 3, a probabilidade de ele ser um número PAR é igual a:', '1/3', '1/2', '2/3', '1/6', '3/10', 'b', 'Aula 5');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `questoes`
--
ALTER TABLE `questoes`
  ADD PRIMARY KEY (`id_questao`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `questoes`
--
ALTER TABLE `questoes`
  MODIFY `id_questao` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
