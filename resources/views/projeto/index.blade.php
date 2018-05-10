@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Projetos</h1>

    <br>
    <a class="btn btn-primary" href="{{ route('projeto.create') }}" role="button">Novo Projeto</a>
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
                <th>Nome</th>
                <th>Orçamento</th>
                <th>Cliente</th>
                <th>Data de Entrega</th>
                <th>Tarefas</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projetos as $projeto)
            <tr>
                <th>{{ $projeto->id }}</th>
                <th>{{ $projeto->nome }}</th>
                <th>{{ $projeto->orcamento }}</th>
                <th>{{ $projeto->cliente->nome }}</th>
                <th>{{ $projeto->data_entrega }}</th>
                <th>
                    <a class="btn btn-info" href="{{ route('tarefa', ['id'=>$projeto->id]) }}" role="button">Tarefas</a>
                </th>
                <th>
                    <a class="btn btn-warning" href="{{ route('projeto.edit', ['id'=>$projeto->id]) }}" role="button">Editar</a>
                    <button type="button" id="{{ $projeto->id }}" class="btn btn-danger" data-toggle="modal" data-target="#ExcluirModal">Excluir</button>
                </th>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>


@endsection