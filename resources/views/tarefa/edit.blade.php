@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Editando a tarefa {{ $tarefa->titulo }}</h1>
    <br>
    @if(count($errors) > 0)
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <br>
    {!! Form::open(['route' => ['tarefa.update', $tarefa->id], 'method'=>'post']) !!}
        {!! Form::text('titulo', $tarefa->titulo, ['class'=>'form-control', 'placeholder'=>'Título']) !!}
        <br>
        {!! Form::textarea('descricao', $tarefa->descricao, ['class'=>'form-control', 'placeholder'=>'Descrição', 'rows'=>3]) !!}
        <br>
        <div class="row">
            <div class="col-md-6">
                {!! Form::text('data_inicio', $tarefa->user[0]->pivot->data_inicio, ['class'=>'form-control', 'placeholder'=>'Data Início']) !!}
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6">
            {!! Form::text('data_entrega', $tarefa->user[0]->pivot->data_entrega, ['class'=>'form-control', 'placeholder'=>'Data Entrega']) !!}
            </div> <!-- ./col-md-6 -->
        </div> <!-- ./row -->
        <br>
        {!! Form::select('user', $user, $tarefa->user[0]->id, ['class'=>'form-control', 'placeholder'=>'Usuário']) !!}
        <br>
        {!! Form::hidden('projeto', $tarefa->projeto_id) !!}

        {!! Form::submit('Salvar', ['class'=>'btn btn-primary float-right']) !!}
    {!! Form::close() !!}
 
</div>

@endsection