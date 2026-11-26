<?php

session_start();

if (!isset($_SESSION['questoes_prova_final'])) {
    die('Não foi possível encontrar a prova.');
}

$questoes  = $_SESSION['questoes_prova_final'];
$respostas = $_POST['respostas'] ?? [];

$acertos = 0;

foreach ($questoes as $questao) {

    $id = $questao['id_questao'];

    if (
        isset($respostas[$id]) &&
        strtolower($respostas[$id]) === strtolower($questao['resposta_correta'])
    ) {
        $acertos++;
    }
}

// Guarda o resultado para a tela de resultados finais
$_SESSION['resultado_prova_final'] = ['acertos' => $acertos, 'total' => count($questoes)];

// Encerra o cronômetro desta tentativa
unset($_SESSION['prova_inicio']);

header('Location: resultado_final.php');
exit;
