@extends('layouts.main')

@section('title', 'Criar Projetos')

@section('content')
    
<div id="titulo" class="col-md-12">
    <h1>Cadastrar Projeto</h1>
</div>

<div id="produto-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastre um novo projeto</h1>
    <form action="/projetos" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label for="nome">Projeto:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Projeto..">
        </div>

        <div class="form-group form-inline">
            <label for="dataIni">Data de início</label>
            <input type="date" class="form-control" id="dataIni" name="dataIni"/>

            <label for="dataFim">Data de final</label>
            <input type="date" class="form-control" id="dataFim" name="dataFim"/>
        </div>

        <div class="form-group">
            <label for="preco">Valor:</label>
            <input type="text" class="form-control" id="valor" name="valor" placeholder="R$...">
        </div>

        <div class="form-group">
            <label for="preco">Risco:</label>
            <select name="risco" id="risco" class="form-control">
                <option value="0">Baixo</option>
                <option value="1">Médio</option>
                <option value="2">Alto</option>
            </select>
        </div>

        <div class="form-group">
            <label for="preco">Participantes</label>
            <input type="text" class="form-control" id="participantes" name="participantes" placeholder="participante 1, participante 2, partticipante 3, ...">
        </div>

        <input type="submit" class="btn btn-primary" value="Criar Projeto">

    </form>
</div>

@endsection