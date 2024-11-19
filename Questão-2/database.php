<?php

function conexao() {
    try {
        $arquivo = 'tarefas.db';
        $conexao = new PDO('sqlite:' . $arquivo);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexao;
    } catch (PDOException $e) {
        echo "Erro na conexão: " . $e->getMessage();
        exit; // Ou, se necessário, retornar um valor específico ou fazer outro tratamento
    }
}

function criarTabela() {
    try {
        $conexao = conexao();
        $sql = "
            CREATE TABLE IF NOT EXISTS tarefas (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                descricao_da_tarefa TEXT NOT NULL,
                data_vencimento DATE NOT NULL,
                concluida INTEGER NOT NULL DEFAULT 0
            )
        ";
        $conexao->exec($sql);
    } catch (PDOException $e) {
        echo "Erro ao criar tabela: " . $e->getMessage();
    }
}
