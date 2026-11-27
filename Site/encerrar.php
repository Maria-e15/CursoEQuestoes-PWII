<?php

session_start();

unset(
    $_SESSION['questoes_prova_final'],
    $_SESSION['prova_inicio'],
    $_SESSION['resultado_prova_final']
);

header('Location: index.html');
exit;
