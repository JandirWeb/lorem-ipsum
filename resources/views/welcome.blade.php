@extends('layouts.main')

@section('title', 'Lorem Ipsum Inc.')

@section('content')

<div id="titulo" class="col-md-12">
    
    <h1>Lista de Projetos Cadastrados</h1>
        
</div>

<div id="projetos-list" class="col-md-12">
    
    <table class="table tabelas">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Projeto</th>
                <th scope="col">Data de Início</th>
                <th scope="col">Data Final</th>
                <th scope="col">Valor</th>
                <th scope="col">Risco</th>
                <th scope="col">Participantes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projetos as $projeto)
            <tr>
                <th scope="row"> {{ $projeto->id }} </th>
                <td>{{ $projeto->name }}</td>
                <td>{{ date('d/m/Y', strtotime($projeto->dataIni)) }}</td>
                <td>{{ date('d/m/Y', strtotime($projeto->dataFim)) }}</td>
                <td>R$ {{ $projeto->valor }}</td>
                <td>
                    @if ($projeto->risco == 0)
                        <span>Baixo</span>
                        @elseif($projeto->risco == 1)
                        <span>Médio</span>
                        @else
                        <span>Alto</span>
                    @endif
                </td>
                <td class="participantes">{{ $projeto->participantes }}</td>
                <td>
                    <button type="button" class="btn btn-info roi-btn" data-toggle="modal" data-target="#modal-roi"><ion-icon name="cash-outline"></ion-icon> Simular ROI</button>
                    <a href="/projetos/{{ $projeto->id }}" class="btn btn-info edit-btn"><ion-icon name="create"></ion-icon> Editar</a>
                    <form action="/projetos/{{ $projeto->id }}" method="POST" class="bt-deletar">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-btn" data-toggle="modal" data-target="#modal-excluir"><ion-icon name="trash"></ion-icon>Excluir</button>
                    </form>

                    @include('layouts.modal-delete')

                    @include('layouts.modal-roi')

                </td>
                
            </tr>
             @endforeach

        </tbody>
       
    </table>
    @if(count($projetos) == 0)
        <p>Não há projetos cadastrados</p>
    @endif
</div>
    



@endsection

        
        
 