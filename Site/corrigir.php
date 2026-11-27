<?php

session_start();

$aula = isset($_POST['aula']) ? (int) $_POST['aula'] : 0;

$chave = 'questoes_aula_' . $aula;


if ($aula < 1 || $aula > 5 || !isset($_SESSION[$chave])) {
    die('Não foi possível corrigir as questões.');
}

$questoes  = $_SESSION[$chave];
$respostas = $_POST['respostas'] ?? [];
$acertos   = 0;
$erros     = []; 

foreach ($questoes as $indice => $questao) {

    $id = $questao['id_questao'];

    if (
        isset($respostas[$id]) &&
        strtolower($respostas[$id]) === strtolower($questao['resposta_correta'])
    ) {
        $acertos++;
    } else {
        $erros[] = $indice + 1;
    }
}


$_SESSION['aula_concluida_' . $aula] = true;
$_SESSION['resultado_aula_' . $aula] = ['acertos' => $acertos, 'total' => count($questoes), 'erros' => $erros];

header('Location: resultado.php?aula=' . $aula);
exit;
