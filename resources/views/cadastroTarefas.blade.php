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
        <h1>Coisas A FAZER</h1>

        <!-- Formulário para adicionar novas tarefas -->
        <form action="/cadastroTarefas" method="POST" class="to-do-form">
            @csrf
            <input type="text" name="tarefa" placeholder="Escreva sua tarefa aqui" required>
            <button type="submit" class="form-button">
                <i class="fa-solid fa-plus"></i>
            </button>
        </form>

        <!-- Listagem de tarefas -->
        <div id="tarefas">
            @foreach($tarefas as $tarefa)
                <div class="task">
                    <!-- Formulário para marcar como concluída -->
                    <form action="/cadastroTarefas/{{ $tarefa->id }}" method="POST" class="form-check">
                        @csrf
                        @method('PATCH')

                        <!-- Checkbox para marcar como concluído ou não -->
                        <input type="checkbox" name="completed" class="progress" {{ $tarefa->status ? 'checked' : '' }} onchange="this.form.submit()">
                    </form>

                    <!-- Descrição da tarefa -->
                    <p class="task-description">{{ $tarefa->tarefa }}</p>

                    <!-- Ações de editar e deletar -->
                    <div class="task-actions">
                        <!-- Botão de editar -->
                        <a class="action-button edit-button" onclick="toggleEditForm({{ $tarefa->id }})">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <!-- Formulário para excluir a tarefa -->
                        <form action="/cadastroTarefas/{{ $tarefa->id }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-button delete-button">
                                <i class="fa-regular fa-trash-can"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Formulário para editar a tarefa (inicialmente oculto) -->
                    <form action="/cadastroTarefas/{{ $tarefa->id }}" method="POST" class="to-do-form edit-task hidden" id="edit-task-{{ $tarefa->id }}">
                        @csrf
                        @method('PATCH')

                        <!-- Campo de texto para editar a tarefa -->
                        <input type="text" name="tarefa" value="{{ $tarefa->tarefa }}" placeholder="Edite a sua tarefa aqui" required>

                        <!-- Botão para confirmar a edição -->
                        <button type="submit" class="form-button confirm-button">
                            <i class="fa-solid fa-check"></i>
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Função para exibir/ocultar o formulário de edição
        function toggleEditForm(id) {
            var form = document.getElementById('edit-task-' + id);
            form.classList.toggle('hidden');
        }
    </script>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
