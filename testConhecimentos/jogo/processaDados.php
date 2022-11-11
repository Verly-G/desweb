<?php
    // Substitui o POST
    $usuario = file_get_contents('php://input');

    // Transformando em JSON
    $usuario = json_decode($usuario, true);

    // Devolvendo os dados em JSON
    echo json_encode($usuario);
?>