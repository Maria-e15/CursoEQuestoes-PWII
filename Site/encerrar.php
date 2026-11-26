<?php

// "Encerrar": encerra a avaliação final e volta para a tela inicial.
// O progresso das aulas NÃO é apagado (o aluno continua com tudo liberado para rever e treinar).
session_start();

unset(
    $_SESSION['questoes_prova_final'],
    $_SESSION['prova_inicio'],
    $_SESSION['resultado_prova_final']
);

header('Location: index.html');
exit;
