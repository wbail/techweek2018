@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Nova Tarefa</h1>
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
    {!! Form::open(['route' => 'tarefa.store', 'method'=>'post']) !!}
        {!! Form::text('titulo', null, ['class'=>'form-control', 'placeholder'=>'Título']) !!}
        <br>
        {!! Form::textarea('descricao', null, ['class'=>'form-control', 'placeholder'=>'Descrição', 'rows'=>3]) !!}
        <br>
        <div class="row">
            <div class="col-md-6">
                {!! Form::text('data_inicio', null, ['class'=>'form-control', 'placeholder'=>'Data Início']) !!}
            </div> <!-- ./col-md-6 -->
            <div class="col-md-6">
            {!! Form::text('data_entrega', null, ['class'=>'form-control', 'placeholder'=>'Data Entrega']) !!}
            </div> <!-- ./col-md-6 -->
        </div> <!-- ./row -->
        <br>
        {!! Form::select('user', $user, null, ['class'=>'form-control', 'placeholder'=>'Usuário']) !!}
        <br>
        {!! Form::hidden('projeto', $projeto->id) !!}

        {!! Form::submit('Salvar', ['class'=>'btn btn-primary float-right']) !!}
    {!! Form::close() !!}

 
</div>


@endsection