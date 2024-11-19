<?php

require_once 'database.php';


criarTabela();


function listarTarefas() {
    $conexao = conexao();
    $stmt = $conexao->query("SELECT * FROM tarefas ORDER BY data_vencimento ASC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$tarefas = listarTarefas();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Tarefas (To-do list)</title>

    
    <style>
   * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #000;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    padding: 20px;
}

.painel-interno {
    background-color: #344b52;
    width: 100%;
    max-width: 400px;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin: 10px 0;
}

.painel {
    background-color: #344b52;
    width: 100%;
    max-width: 1200px;
    display: flex;
    flex-direction: column; 
    align-items: center;
    gap: 20px;
}

h1 {
    text-align: center;
    color: #fff;
    margin-bottom: 16px;
}

h2 {
    color: #fff;
    margin-bottom: 8px;
}

label {
    font-size: 1rem;
    color: #fff;
}

input[type="text"], input[type="date"] {
    width: 100%;
    padding: 8px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
}

button {
    background-color: #9db3b4;
    color: white;
    border: none;
    padding: 10px 15px;
    font-size: 1rem;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #587983;
}

ul {
    list-style-type: none;
    margin-top: 20px;
    padding-left: 0;
    width: 100%;
}

li {
    padding: 10px;
    background-color: #f9f9f9;
    margin-bottom: 10px;
    border-radius: 4px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

li .marcar {
    color: red;
}

li .excluir {
    color: red ! important;
}

.acoes-da-tarefa a {
    text-decoration: none;
    color: #007BFF;
    font-size: 0.9rem;
    margin: 0 10px;
}

.completed {
    background-color: #cfd3ca;
    color: #587983;
}


@media (min-width: 768px) {
    .painel {
        flex-direction: row;
        justify-content: space-between;
        gap: 30px;
    }

    .painel-interno {
        max-width: 400px;
        padding: 30px;
    }

    ul {
        width: 100%;
    }

    li {
        flex-direction: row;
        justify-content: space-between;
        padding: 15px;
    }
}

@media (min-width: 1024px) {
    .painel {
        max-width: 1200px;
        flex-direction: row;
        justify-content: space-between;
        gap: 20px;
    }

    .painel-interno {
        max-width: 400px;
        padding: 30px;
    }
}


    </style>

    
    <script>
        function confirmarExclusao(id) {
            var resposta = confirm("Tem certeza que deseja excluir esta tarefa?");
            if (resposta) {
                window.location.href = "delete_tarefa.php?id=" + id;
            }
        }
    </script>
</head>
<body>


    <div class="paniel">
    <h2>Gerenciamento de Tarefas  (To-do list)</h2>
        <div class="painel-interno">

    <h2>Adicionar Nova Tarefa</h2>
    
            <form action="add_tarefa.php" method="POST">
                <label for="descricao_da_tarefa">Descrição:</label>
                <input type="text" id="descricao_da_tarefa" name="descricao_da_tarefa" required><br>
                <label for="data_vencimento">Data de Vencimento:</label>
                <input type="date" id="data_vencimento" name="data_vencimento" required><br>
                <button type="submit">Adicionar</button>
            </form>

        

        </div>

        <div class="painel-interno">

            <h2>Tarefas Concluídas</h2>
            <ul>
                <?php foreach ($tarefas as $tarefa): ?>
                    <?php if ($tarefa['concluida'] == 1): ?>
                        <li class="completed">
                            <div>
                                <?= $tarefa['descricao_da_tarefa'] ?> - <?= $tarefa['data_vencimento'] ?>
                            </div>
                            <div class="acoes-da-tarefa">
                                <a href="javascript:void(0);" class="excluir" onclick="confirmarExclusao(<?= $tarefa['id'] ?>)">Excluir</a>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>

        </div>

        <div class="painel-interno">


            <h2>Tarefas Não Concluídas</h2>
            <ul>
                <?php foreach ($tarefas as $tarefa): ?>
                    <?php if ($tarefa['concluida'] == 0): ?>
                        <li>
                            <div>
                                <?= $tarefa['descricao_da_tarefa'] ?> - <?= $tarefa['data_vencimento'] ?>
                            </div>
                            <div class="acoes-da-tarefa">
                                <a href="update_tarefa.php?id=<?= $tarefa['id'] ?>">Concluir</a> |
                                <a href="javascript:void(0);" class="excluir" onclick="confirmarExclusao(<?= $tarefa['id'] ?>)">Excluir</a>
                            </div>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>


        </div>

    </div>


</body>
</html>
