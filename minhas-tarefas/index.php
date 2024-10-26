
<html>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
          
        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>

  <h1>Criando um Menu !</h1>  

<head></head>

<body>
    <?php
    include("BD.php");
    include("Tarefa.php");
    include("TarefaDAO.php");

    $dao = new TarefaDAO();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['acao']) && $_POST['acao'] == 'excluir') {
            $dao->remover($_POST['id']);

        } else {
            $tarefa = new Tarefa();
            $tarefa->setNome($_POST['nome']);
            $tarefa->setPrioridade($_POST['prioridade']);
            $dao->persistir($tarefa);
        }
    }

    $tarefas = $dao->listarTodos();
    ?>

    <form method="POST" action="index.php">
        <fieldset>
            <legend>Nova Tarefa</legend>
            <label for="nome">Nome</label>
            <input name="nome" required />

            <label for="prioridade">Prioridade</label>
            <input name="prioridade" type="number" min="1" max="5" required />

            <input type="submit" value="Salvar">
        </fieldset>
    </form>

    <fieldset>
        <legend>Tarefas</legend>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Prioridade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tarefas as $tarefa) {
                    echo "<tr> 
                            <td>{$tarefa->getId()}</td>
                            <td>{$tarefa->getNome()}</td>
                            <td>{$tarefa->getPrioridade()}</td>
                            <td>
                                <form method='POST' action='index.php'>
                                    <input type='hidden' name='id' value='{$tarefa->getId()}' />
                                    <input type='hidden' name='acao' value='excluir' />
                                    <input type='submit' value='Excluir' />
                                </form>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </fieldset>
</body>

</html>