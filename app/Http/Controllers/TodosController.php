<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodosController extends Controller
{
    /*
        index para mostrar todos os elementos
        store para guardar qualquer um
        update para atualizar qualquer um
        destroy para apagar qualquer um
        edit para mostrar o formulario de edição
    */

    public function store(Request $request){
        $request -> validate([
            'title' =>  'required|min:3'
        ]);
        
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save();

        return redirect()->route('todos')->with('success', 'Tarefa criada corretamente');

    }

    public function index(){
        $todos = Todo::all();
        $categories = Category::all();
        return view('todos.index', ['todos' =>$todos, 'categories' => $categories]);
    }

    public function show($id){
        $todo = Todo::find($id);
        $categories = Category::all();
        return view('todos.show', ['todo' => $todo, 'categories' => $categories]);
    }

    public function update(Request $request, $id){
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->save();
        
        // return view('todos.index', ['sucess' => 'Tarefa atualizada!']);
        return redirect()->route('todos')->with('success', 'Tarefa atualizada!');
    }

    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success', 'Tarefa atualizada!');
    }
}
