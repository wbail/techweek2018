@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Editando o projeto {{ $projeto->nome }}</h1>
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

    {!! Form::open(['route' => ['projeto.update', $projeto->id], 'method'=>'post']) !!}
        {!! Form::text('nome', $projeto->nome, ['class'=>'form-control', 'placeholder'=>'Nome']) !!}
        <br>
        {!! Form::text('orcamento', $projeto->orcamento, ['class'=>'form-control', 'placeholder'=>'Orçamento']) !!}
        <br>
        {!! Form::text('data_entrega', $projeto->data_entrega, ['class'=>'form-control', 'placeholder'=>'Data Entrega']) !!}
        <br>
        {!! Form::select('cliente', $cliente, $projeto->cliente_id, ['class'=>'form-control', 'placeholder'=>'Cliente']) !!}
        <br>
        {!! Form::submit('Salvar', ['class'=>'btn btn-primary float-right']) !!}
    {!! Form::close() !!}

</div>


@endsection