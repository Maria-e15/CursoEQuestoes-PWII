<?php

$servidor = "localhost";
$banco = "database";
$usuario = "root";
$senha = "";

try {
    $conexao = new PDO(
        "mysql:host=$servidor; dbname=$banco",
        $usuario,
        $senha
    );
} catch(PDOException $erro) {

    echo "Erro na conexão: " . $erro->getMessage();
}

?>