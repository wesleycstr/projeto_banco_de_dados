<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendário Interativo</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.5/fullcalendar.min.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
            margin-top: 00px;
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
/* Fim da barra de menu*/
body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f4f4f9;
    }
    .container {
      text-align: center;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      width: 500px;
    }
    .container h1 {
      font-size: 20px;
      margin-bottom: 20px;
    }
    form {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }
    select {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      padding: 10px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    button:hover {
      background-color: #0056b3;
    }
    a {
      display: block;
      margin-top: 10px;
      color: #007BFF;
      text-decoration: none;
    }
    a:hover {
      text-decoration: underline;
    }

    /*ESTILO DA TABELA*/
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
<!-- Barra de ferramentas -->
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
            <!--<button class="menu-btn" a href='./agenda.php'>Planejamento</button>-->
            <a href="./planejamento.php">
                <button class="menu-btn">Disciplinas</button>
            </a>  
            <div class="dropdown-content">
                <!--<button onclick="alert('Opção 3.1')">Opção 3.1</button>
                <button onclick="alert('Opção 3.2')">Opção 3.2</button>
                <button onclick="alert('Opção 3.3')">Opção 3.3</button>-->
            </div>
        </div>
    </nav>
</header>
<body>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID Turma</th>
                    <th>Nome da Disciplina</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "conexao.php";

                // Chama a stored procedure
                $stmt = $conn->prepare("CALL consulta_disciplina()");
                $stmt->execute();

                // Gera as linhas da tabela
                while ($row = $stmt->fetch()) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($row['idturma']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['nomedisciplina']) . '</td>';
                    echo '<td>
                            <form action="./disciplina.php" method="POST">
                                <input type="hidden" name="idturma" value="' . htmlspecialchars($row['idturma']) . '">
                                <input type="hidden" name="nomedisciplina" value="' . htmlspecialchars($row['nomedisciplina']) . '">
                                <button type="submit">Enviar</button>
                            </form>
                          </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.5/fullcalendar-drag-n-drop.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendar.Draggable;

        var containerEl = document.getElementById('external-events');
        var dragHandle = document.querySelector('.drag-handle');
        var offset = { x: 0, y: 0 };
        var isDragging = false;

        /*dragHandle.addEventListener('mousedown', function(e) {
            isDragging = true;
            offset.x = e.clientX - containerEl.offsetLeft;
            offset.y = e.clientY - containerEl.offsetTop;
            document.addEventListener('mousemove', onMouseMove);
            document.addEventListener('mouseup', onMouseUp);
        });*/

        function onMouseMove(e) {
            if (isDragging) {
                containerEl.style.left = (e.clientX - offset.x) + 'px';
                containerEl.style.top = (e.clientY - offset.y) + 'px';
            }
        }

        function onMouseUp() {
            isDragging = false;
            document.removeEventListener('mousemove', onMouseMove);
            document.removeEventListener('mouseup', onMouseUp);
        }
        var calendarEl = document.getElementById('calendar');
        var calendar = new Calendar(calendarEl, {
            locale: 'pt-br',
            timeZone: 'UTC',
            initialView: 'dayGridYear',
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'dayGridYear,multiMonthYear'
            },
            buttonText: {
                dayGridYear: 'Ano',
                multiMonthYear: 'Multi Mês'
            },
            editable: true,
            droppable: true,
            drop: function(info) {
                var title = info.draggedEl.innerText;
                var start = info.dateStr;
                var end = info.dateStr;

                if (document.getElementById('drop-remove').checked) {
                    info.draggedEl.parentNode.removeChild(info.draggedEl);
                }

                fetch('add_event.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: new URLSearchParams({ title: title, start: start, end: end })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                });
            },
            events: 'get_events.php',
            eventDrop: function(info) {
                var updatedTitle = info.event.title;
                var updatedStart = info.event.start.toISOString().slice(0, 10);
                var updatedEnd = info.event.end ? info.event.end.toISOString().slice(0, 10) : updatedStart;

                fetch('get_events.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: new URLSearchParams({ id: info.event.id, title: updatedTitle, start: updatedStart, end: updatedEnd })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                });
            },
            eventResize: function(info) {
                var resizedTitle = info.event.title;
                var resizedStart = info.event.start.toISOString().slice(0, 10);
                var resizedEnd = info.event.end ? info.event.end.toISOString().slice(0, 10) : resizedStart;

                fetch('get_events.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: new URLSearchParams({ id: info.event.id, title: resizedTitle, start: resizedStart, end: resizedEnd })
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                });
            }
        });

        fetch('get_events.php')
            .then(response => response.json())
            .then(data => {
                var draggableEventsEl = document.getElementById('draggable-events');
                data.forEach(event => {
                    var eventEl = document.createElement('div');
                    eventEl.className = 'fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event';
                    eventEl.innerHTML = `<div class='fc-event-main'>${event.title}</div>`;
                    eventEl.dataset.id = event.id;
                    draggableEventsEl.appendChild(eventEl);
                });

                new Draggable(containerEl, {
                    itemSelector: '.fc-event',
                    eventData: function(eventEl) {
                        return { title: eventEl.innerText, id: eventEl.dataset.id };
                    }
                });
            });

        calendar.render();
    });
</script>

<script>/*
    // Função para abrir a janela pop-up centralizada
    function openPopup() {
        const popupWidth = 1000;
        const popupHeight = 800;
        const screenWidth = window.screen.width;
        const screenHeight = window.screen.height;

        // Calcula a posição para centralizar a pop-up
        const left = (screenWidth / 2) - (popupWidth / 2);
        const top = (screenHeight / 2) - (popupHeight / 2);

        // Abre a janela com o arquivo HTML externo
        window.open(
            "./cadastro.php", // Caminho para o arquivo HTML
            "popupForm",
            `width=${popupWidth},height=${popupHeight},left=${left},top=${top}`
        );
    }*/
</script>
<script>
//Funcao para abrir pop up de cadastro de militar
function openPopup() {
    const popupWidth = 1000;
    const popupHeight = 800;
    const screenWidth = window.screen.width;
    const screenHeight = window.screen.height;

    // Calcula a posição para centralizar a pop-up
    const left = (screenWidth / 2) - (popupWidth / 2);
    const top = (screenHeight / 2) - (popupHeight / 2);

    // Abre a janela pop-up com algumas barras desativadas
    window.open(
        "./cadastro.php", // Caminho para o arquivo HTML
        "popupForm",
        `width=${popupWidth},height=${popupHeight},left=${left},top=${top},toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no`
    );
}

//Funcao para abrir pop up de exclusão de cadastro de militar
function openPopup2() {
    const popupWidth = 1000;
    const popupHeight = 800;
    const screenWidth = window.screen.width;
    const screenHeight = window.screen.height;

    // Calcula a posição para centralizar a pop-up
    const left = (screenWidth / 2) - (popupWidth / 2);
    const top = (screenHeight / 2) - (popupHeight / 2);

    // Abre a janela pop-up com algumas barras desativadas
    window.open(
        "./visualizar_cadastro.php", // Caminho para o arquivo HTML
        "popupForm",
        `width=${popupWidth},height=${popupHeight},left=${left},top=${top},toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no`
    );
}

function openPopup3() {
    const popupWidth = 1000;
    const popupHeight = 800;
    const screenWidth = window.screen.width;
    const screenHeight = window.screen.height;

    // Calcula a posição para centralizar a pop-up
    const left = (screenWidth / 2) - (popupWidth / 2);
    const top = (screenHeight / 2) - (popupHeight / 2);

    // Abre a janela pop-up com algumas barras desativadas
    window.open(
        "./novo_evento.php", // Caminho para o arquivo HTML
        "popupForm",
        `width=${popupWidth},height=${popupHeight},left=${left},top=${top},toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=no`
    );
}


</script>

        

</body>
</html>
