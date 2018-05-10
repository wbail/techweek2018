@extends('layouts.app')

@section('content')

<div class="container">

    <h1>Novo Cliente</h1>
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

    <form action="{{ route('cliente.store') }}" method="post">

        {!! csrf_field() !!}

        <input class="form-control" type="text" name="nome" id="nome" placeholder="nome">
        <br>
        <input class="form-control" type="text" name="email" id="email" placeholder="email">
        <br>
        <input class="form-control" type="text" name="documento" id="documento" placeholder="documento" maxlength=11>
        <br>
        <button type="submit" class="btn btn-primary float-right">Salvar</button>

    </form>
</div>


@endsection