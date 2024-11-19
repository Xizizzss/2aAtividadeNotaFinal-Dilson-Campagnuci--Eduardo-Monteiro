<?php

require_once 'database.php';

if ($_POST) {
    
    $descricao_da_tarefa = $_POST['descricao_da_tarefa'];
    $data_vencimento= $_POST['data_vencimento'];
    if(isset($descricao_da_tarefa) && isset($data_vencimento))
    adicionar($descricao_da_tarefa, $data_vencimento);
    header('Location: index.php');
    exit();
}


function adicionar($descricao_da_tarefa, $data_vencimento){
    
    $conexao = conexao();
    $stmt = $conexao->prepare("INSERT INTO tarefas (descricao_da_tarefa, data_vencimento, concluida) VALUES (?, ?, 0)");
    $stmt->execute([$descricao_da_tarefa, $data_vencimento]);

    
}