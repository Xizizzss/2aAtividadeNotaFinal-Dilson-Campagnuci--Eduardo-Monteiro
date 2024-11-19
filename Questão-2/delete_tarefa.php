<?php

require_once 'database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    excluir($id);
    header('Location: index.php');
    exit();
}


function excluir($id){
    $conexao = conexao();
    $stmt = $conexao->prepare("DELETE FROM tarefas WHERE id = ?");
    $stmt->execute([$id]);

}