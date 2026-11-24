<?php

session_start();

$aula = isset($_POST['aula']) ? (int) $_POST['aula'] : 0;

$chave = 'questoes_aula_' . $aula;

// Verifica se existem questões na sessão
if ($aula < 1 || $aula > 5 || !isset($_SESSION[$chave])) {
    die('Não foi possível corrigir as questões.');
}

$questoes  = $_SESSION[$chave];
$respostas = $_POST['respostas'] ?? [];
$acertos   = 0;

foreach ($questoes as $questao) {

    $id = $questao['id_questao'];

    if (
        isset($respostas[$id]) &&
        strtolower($respostas[$id]) === strtolower($questao['resposta_correta'])
    ) {
        $acertos++;
    }
}

$_SESSION['acertos_aula_' . $aula]   = $acertos;
$_SESSION['aula_concluida_' . $aula] = true;

// "Finalizar aula!" leva o aluno de volta ao menu principal
header('Location: menu.php');
exit;
