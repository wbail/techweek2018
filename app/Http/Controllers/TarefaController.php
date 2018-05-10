<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TarefaRequest;

use DB;

use App\Tarefa;
use App\Projeto;
use App\User;

class TarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($projetoId)
    {
        $tarefas = Tarefa::with('projeto', 'user')
            ->where('projeto_id', $projetoId)
            ->get();

        if(count($tarefas) < 1)
        {
            return redirect()->route('tarefa.create', ['id'=>$projetoId]);
        }

        return view('tarefa.index', [
            'tarefas' => $tarefas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($projetoId)
    {
        return view('tarefa.create', [
            'projeto' => Projeto::find($projetoId),
            'user' => User::pluck('name', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TarefaRequest $request)
    {
        $tarefa = new Tarefa;
        $tarefa->titulo = $request->input('titulo');
        $tarefa->descricao = $request->input('descricao');
        $tarefa->projeto()->associate($request->input('projeto'));
        $tarefa->save();

        $tarefa->user()->attach($request->input('user'), [
            'data_inicio' => $request->input('data_inicio'),
            'data_entrega' => $request->input('data_entrega')
        ]);

        return redirect()->route('tarefa', ['id' => $request->input('projeto')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tarefa = Tarefa::with('user')
            ->where('id', $id)
            ->first();


        return view('tarefa.edit', [
            'tarefa' => $tarefa,
            'user' => User::pluck('name', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TarefaRequest $request, $id)
    {
        $tarefa = Tarefa::find($id);
        $tarefa->titulo = $request->input('titulo');
        $tarefa->descricao = $request->input('descricao');
        $tarefa->save();
        
        $tarefa->user()->updateExistingPivot($request->input('user'), [
            'data_inicio' => $request->input('data_inicio'),
            'data_entrega' => $request->input('data_entrega')
        ]);

        return redirect()->route('tarefa', ['id'=>$tarefa->projeto_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarefa = Tarefa::find($id);
        
        $tarefa->user()->detach();

        $tarefa->delete();

        return redirect()->route('tarefa', ['id'=>$tarefa->projeto_id]);
    }
}
