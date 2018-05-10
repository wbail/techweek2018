@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Clientes</h1>

    <br>
    <a class="btn btn-primary" href="{{ route('cliente.create') }}" role="button">Novo Cliente</a>
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
                <th>Email</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
            <tr>
                <th>{{ $cliente->id }}</th>
                <th>{{ $cliente->nome }}</th>
                <th>{{ $cliente->email }}</th>
                <th>
                    <a class="btn btn-warning" href="{{ route('cliente.edit', ['id'=>$cliente->id]) }}" role="button">Editar</a>
                    <button type="button" id="{{ $cliente->id }}" class="btn btn-danger" data-toggle="modal" data-target="#ExcluirModal">Excluir</button>
                </th>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>


@endsection