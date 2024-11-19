<?php

require_once 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    concluir($id );
    header('Location: index.php');
    exit();
}




function concluir($id ){
    $conexao = conexao();
    $stmt = $conexao->prepare("UPDATE tarefas SET concluida = 1 WHERE id = ?");
    $stmt->execute([$id]);
}

 
