<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefas;

class TarefasController extends Controller
{

    public function index() {
        $tarefas = Tarefas::all();
        return view('cadastroTarefas', ['tarefas' => $tarefas]); // 'todo' é o nome da sua view
    }


    public function store(Request $request) {
        $request->validate([
            'tarefa' => 'required|string|max:255',
        ]);
    
        Tarefas::create([
            'tarefa' => $request->tarefa,
            'status' => false, // Definir como false (não concluído) por padrão
        ]);
    
        return redirect()->back();
    }
    

    public function update(Request $request, Tarefas $tarefa) {
        // Valida a entrada do formulário
        $request->validate([
            'tarefa' => 'required|string|max:255', // Certifique-se de que 'tarefa' está sendo enviado
        ]);
    
        // Atualiza a tarefa com o novo valor
        $tarefa->tarefa = $request->input('tarefa');
        
        // Verifica se o checkbox foi marcado
        $tarefa->status = $request->has('completed');
        
        // Salva as mudanças
        $tarefa->save();
    
        return redirect()->back();
    }
    
    
    public function destroy(Tarefas $tarefa) {
        $tarefa->delete();
    
        return redirect()->back();
    }
    
}