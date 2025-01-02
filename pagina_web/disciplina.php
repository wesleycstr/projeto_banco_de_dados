<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disciplinas</title>

    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        }

        /* Barra de ferramentas */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: white;
            padding: 10px;
            display: flex;
            align-items: center;
            z-index: 3;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logo {
            width: 50px;
            height: 50px;
            background-color: #555;
            margin-right: 15px;
            border-radius: 5px;
        }

        .menu {
            display: flex;
            gap: 15px;
        }

        .menu-btn {
            background-color: #444;
            border: 1px solid #555;
            color: white;
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .menu-btn:hover {
            background-color: #555;
            transform: scale(1.05);
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #444;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
            overflow: hidden;
        }

        .dropdown-content button {
            width: 100%;
            text-align: left;
            background: none;
            border: none;
            color: white;
            font-size: 14px;
            padding: 10px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }

        .dropdown-content button:hover {
            background-color: #555;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Fim da barra de menu */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .tab-container {
            margin-top: 80px; /* Espaço para o header */
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        .tab-header {
            display: flex;
            cursor: pointer;
        }

        .tab-header div {
            padding: 10px 20px;
            background: #f1f1f1;
            border: 1px solid #ccc;
            margin-right: 2px;
            border-radius: 5px 5px 0 0;
        }

        .tab-header div.active {
            background: #fff;
            border-bottom: none;
            font-weight: bold;
        }

        .tab-content {
            border: 1px solid #ccc;
            border-radius: 0 5px 5px 5px;
            background: #fff;
            padding: 20px;
            display: none;
        }

        .tab-content.active {
            display: block;
        }
        /*estilo das tabelas*/
        .table-container {
        overflow-x: auto; /* Permite rolagem horizontal em telas menores */
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse; /* Remove espaçamentos entre células */
        font-size: 14px; /* Fonte ajustada */
        background-color: #fff; /* Fundo branco */
    }

    table thead {
        background-color: #333; /* Fundo escuro para o cabeçalho */
        color: white; /* Texto branco */
    }

    table th,
    table td {
        padding: 10px; /* Espaçamento interno das células */
        text-align: left; /* Texto alinhado à esquerda */
        border: 1px solid #ddd; /* Bordas leves */
        word-wrap: break-word; /* Quebra de linha em palavras longas */
    }

    table tbody tr:nth-child(even) {
        background-color: #f9f9f9; /* Fundo alternado para linhas pares */
    }

    table tbody tr:hover {
        background-color: #f1f1f1; /* Destaque para linha ao passar o mouse */
    }

    table th {
        font-size: 15px; /* Fonte maior para o cabeçalho */
        font-weight: bold; /* Negrito para o cabeçalho */
    }

    @media (max-width: 768px) {
        table th,
        table td {
            font-size: 12px; /* Fonte menor para telas menores */
        }
    }
    </style>
</head>

<body>
    <header>
        <div class="logo"></div> <!-- Espaço para o logo -->
        <nav class="menu">
            <div class="dropdown">
                <button class="menu-btn">Cadastro Pessoal</button>
                <div class="dropdown-content">
                    <button onclick="openPopup()">Novo Cadastro</button>
                    <button onclick="openPopup2()">Excluir / Editar</button>
                </div>
            </div>
            <div class="dropdown">
                <button class="menu-btn">Eventos</button>
                <div class="dropdown-content">
                    <button onclick="openPopup3()">Inserir</button>
                    <button onclick="alert('Opção 2.2')">Opção 2.2</button>
                </div>
            </div>
            <div class="dropdown">
                <button class="menu-btn">Menu 3</button>
                <div class="dropdown-content">
                    <button onclick="alert('Opção 3.1')">Opção 3.1</button>
                    <button onclick="alert('Opção 3.2')">Opção 3.2</button>
                    <button onclick="alert('Opção 3.3')">Opção 3.3</button>
                </div>
            </div>
            <div class="dropdown">
                <a href="./planejamento.php">
                    <button class="menu-btn">Disciplinas</button>
                </a>  
            </div>
        </nav>
    </header>

    <div class="tab-container">
        <div class="tab-header">
            <div class="tab-button active" onclick="openTab(event, 'tab1')">Planejamento</div>
            <div class="tab-button" onclick="openTab(event, 'tab2')">Aba 2</div>
            <div class="tab-button" onclick="openTab(event, 'tab3')">Aba 3</div>
        </div>
        <div id="tab1" class="tab-content active">
            <?php
            require_once "conexao.php";

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idturma'])) {
                //$usuario_id = 1; // Exemplo: ID do usuário (pode ser obtido de uma sessão)
                $idturma = $_POST['idturma'];
                echo "<h1>Disciplina: ".$_POST['nomedisciplina']."</h1>";
            }else{
                echo "Sem id";
            }

            try {
                // Realiza a consulta na tabela aulas
                $stmt = $conn->prepare("SELECT t.idturma, t.semestre, d.iddisciplina, d.conteudo, d.idaula, d.data, d.numaulas FROM turmas t JOIN aulas d ON 
                t.iddisciplina = d.iddisciplina WHERE t.idturma = '$idturma'");
                $stmt->execute();
                
                // Recupera os resultados
                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                // Verifica se há registros
                if (count($resultados) > 0) {
                    echo '<h2>Tabela de Aulas</h2>';
                    echo '<table border="1" style="width: 100%; border-collapse: collapse;">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>ID</th>';
                    echo '<th>Conteúdo</th>';
                    echo '<th>Número de Aulas</th>';
                    echo '<th>Data</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    
                    // Exibe os dados na tabela
                    foreach ($resultados as $linha) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($linha['idaula']) . '</td>';
                        echo '<td>' . htmlspecialchars($linha['conteudo']) . '</td>';
                        echo '<td>' . htmlspecialchars($linha['numaulas']) . '</td>';
                        echo '<td>' . htmlspecialchars($linha['data']) . '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                } else {
                    echo '<p>Não há registros na tabela de aulas.</p>';
                }
            } catch (PDOException $e) {
                echo '<p>Erro ao consultar o banco de dados: ' . htmlspecialchars($e->getMessage()) . '</p>';
            }
            ?>
        </div>

        
        <div id="tab2" class="tab-content">
            <h2>Conteúdo da Aba 2</h2>
            <p>Este é o conteúdo exibido na segunda aba.</p>
        </div>
        <div id="tab3" class="tab-content">
            <h2>Conteúdo da Aba 3</h2>
            <p>Este é o conteúdo exibido na terceira aba.</p>
        </div>
    </div>

    <script>
        function openTab(event, tabId) {
            const tabs = document.querySelectorAll('.tab-content');
            const buttons = document.querySelectorAll('.tab-button');

            tabs.forEach(tab => tab.classList.remove('active'));
            buttons.forEach(button => button.classList.remove('active'));

            document.getElementById(tabId).classList.add('active');
            event.target.classList.add('active');
        }
    </script>
</body>
</html>
