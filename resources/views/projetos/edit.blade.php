
@extends('layouts.main')

@section('title', 'Editar ' . $projeto->title)

@section('content')

<div id="titulo" class="col-md-12">
    <h1>Editar Projeto {{ $projeto->name }}</h1>
</div>

<div id="produto-create-container" class="col-md-6 offset-md-3">
    <h1>Editar Projeto</h1>
    <form action="/projetos/update/{{ $projeto->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Projeto:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Projeto.." value="{{ $projeto->name }}">
        </div>

        <div class="form-group form-inline">
            <label for="descricao">Data de início</label>
            <input type="date" class="form-control" id="dataIni" name="dataIni" value="{{ $projeto->dataIni }}"/>

            <label for="descricao">Data de final</label>
            <input type="date" class="form-control" id="dataFim" name="dataFim" value="{{ $projeto->dataFim }}"/>
        </div>

        <div class="form-group">
            <label for="preco">Valor:</label>
            <input type="text" class="form-control" id="valor" name="valor" placeholder="R$..."value="{{ $projeto->valor }}">
        </div>

        <div class="form-group">
            <label for="preco">Risco:</label>
            <select name="risco" id="risco" class="form-control">
                <option value="0" {{ $projeto->risco == 0 ? "selected='selected'": ""}}>Baixo</option>
                <option value="1" {{ $projeto->risco == 1 ? "selected='selected'": ""}}>Médio</option>
                <option value="2" {{ $projeto->risco == 2 ? "selected='selected'": ""}}>Alto</option>
            </select>
        </div>

        <div class="form-group">
            <label for="preco">Participantes</label>
            <input type="text" class="form-control" id="participantes" name="participantes" placeholder="participante 1, participante 2, partticipante 3, ..." value="{{ $projeto->participantes }}">
        </div>

        <input type="submit" class="btn btn-primary" value="Editar Projeto">

    </form>
</div>

@endsection