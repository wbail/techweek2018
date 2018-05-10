@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Tarefas do projeto {{ $tarefas[0]->projeto->nome }}</h1>

    <br>
    <a class="btn btn-primary" href="{{ route('tarefa.create', ['id'=>$tarefas[0]->projeto->id]) }}" role="button">Nova Tarefa</a>
    <br>
    <br>
    @if (session('message'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>{{ session('message') }}</strong>
        </div>
    @endif
    <br>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Projeto</th>
                <th>Título</th>
                <th>Descrição</th>
                <th>Resumo</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tarefas as $tarefa)
            <tr>
                <th>{{ $tarefa->id }}</th>
                <th>{{ $tarefa->projeto->nome }}</th>
                <th>{{ $tarefa->titulo }}</th>
                <th>{{ $tarefa->descricao }}</th>
                <th>
                    @foreach($tarefa->user as $user)
                        Usuario: <label class="badge badge-dark">{{ $user->name }} </label>
                        <br>
                        Data de Início: <label class="badge badge-success">{{ $user->pivot->data_inicio }} </label>
                        <br>
                        Data de Entrega: <label class="badge badge-danger">{{ $user->pivot->data_entrega }} </label>
                    @endforeach
                </th>
                <th>
                    <a class="btn btn-warning" href="{{ route('tarefa.edit', ['id'=>$tarefa->id]) }}" role="button">Editar</a>
                    <button type="button" id="{{ $tarefa->id }}" class="btn btn-danger" data-toggle="modal" data-target="#ExcluirModal">Excluir</button>
                </th>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>


@endsection