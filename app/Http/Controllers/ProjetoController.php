<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjetoRequest;

use App\Projeto;
use App\Cliente;
use App\Tarefa;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projeto.index', [
            'projetos' => Projeto::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projeto.create', [
            'cliente' => Cliente::pluck('nome', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjetoRequest $request)
    {
        $cliente = Cliente::find($request->input('cliente'));

        $projeto = new Projeto;
        $projeto->nome = $request->input('nome');
        $projeto->orcamento = $request->input('orcamento');
        $projeto->data_entrega = $request->input('data_entrega');
        $projeto->cliente()->associate($cliente);
        $projeto->save();

        return redirect()->route('projeto');
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
        return view('projeto.edit', [
            'projeto' => Projeto::find($id),
            'cliente' => Cliente::pluck('nome', 'id')
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjetoRequest $request, $id)
    {
        Projeto::find($id)->update($request->all());
        
        return redirect()->route('projeto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarefa = Tarefa::where('projeto_id', $id)->get();

        if (count($tarefa) < 1)
        {
            Projeto::find($id)->delete();
            return redirect()->route('projeto');
        }
        
        return back()->with('message', 'Existem tarefas vinculadas à esse projeto.');
    }
}
