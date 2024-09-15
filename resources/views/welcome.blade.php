<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>To Do List</title>
</head>
<body>
    <div id="to_do">
        <h1>Coisas a Fazer</h1>

        <form action="" class="to-do-form">
            <input type="text" name="description" placeholder="Escreva sua tarefa aqui" required>
            <button type="submit" class="form-button">
                <i class="fa-solid fa-plus"></i>
            </button>
        </form>

        <div id="tasks">
            <div class="task">
                <input type="checkbox" name="progress" class="progress">
                
                <p class="task-description">
                    Tema de casa
                </p>

                <div class="task-actions">
                    <a class="action-button edit-button">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>

                    <a href="" class="action-button delete-button">
                        <i class="fa-regular fa-trash-can"></i>
                    </a>
                </div>

                <form action="" class="to-do-form edit-task hidden">
                    <input type="text" name="description" placeholder="Edite a sua tarefa aqui">
                    <button type="submit" class="form-button confirm-button">
                        <i class="fa-solid fa-check"></i>
                    </button>
                </form>

            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>