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
                    <button type="button" class="btn btn-info roi-btn" data-toggle="modal" data-target="#modal-roi{{ $projeto->id }}"><ion-icon name="cash-outline"></ion-icon> Simular ROI</button>
                    <a href="/projetos/{{ $projeto->id }}" class="btn btn-info edit-btn"><ion-icon name="create"></ion-icon> Editar</a>
                    <form action="/projetos/{{ $projeto->id }}" method="POST" class="bt-deletar">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger delete-btn" data-toggle="modal" data-target="#modal-excluir"><ion-icon name="trash"></ion-icon>Excluir</button>
                    </form>

                    @include('layouts.modal-delete')

                    

                </td>
                
            </tr>




            <div class="modal fade" id="modal-roi{{ $projeto->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Simular ROI para o projeto: {{ $projeto->name }}</h5>
                    </div>
                    <div class="modal-body">
                          <div class="col-md-12 mb-4">
                              <div class="col-md-12">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">Valor do Projeto R$</div>
                                    </div>
                                    <input type="text" class="form-control" id="valorProjeto" value="{{ $projeto->valor }}" readonly>
                                </div>
                              </div>
                              <input type="hidden" id="risco" value="{{ $projeto->risco }}">
                              <div class="col-md-6">
                                  <strong>Risco:</strong>
                                  @if ($projeto->risco == 0)
                                  <span>Baixo</span>
                                  @elseif($projeto->risco == 1)
                                  <span>Médio</span>
                                  @else
                                  <span>Alto</span>
                                  @endif
                              </div>
                          </div>
                      <form>
                        <div class="form-group">
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                <div class="input-group-text">R$</div>
                              </div>
                              <input type="text" class="form-control" id="valor-invest" placeholder="Informe o valor a ser investido">
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="message-text" class="col-form-label">Retorno do Investimento:</label>
                          <textarea class="form-control" id="message-text" readonly></textarea>
                        </div>
                      </form>
                    </div>
                    <script>
                      function simular(){
                          $("#simular").on("click", function(){
                              let nameInvest = document.querySelector("#valor-invest");
                              let invest = nameInvest.value;

                              let nameValor = document.querySelector("#valorProjeto");
                              let valor = nameValor.value;

                              let nameRisco = document.querySelector("#risco");
                              let risco = nameRisco.value;

                              if(invest < valor){
                                document.getElementById('message-text').value = "Error: O valor de investimento é baixo!"
                                let nameInvest = document.querySelector("#valor-invest");
                                let invest = nameInvest.value;
                                }else{                             

                                if(risco == 0){
                                    $roi = 0.05 * invest
                                    console.log($roi)
                                    document.getElementById('message-text').value = $roi
                                }else if(risco == 1){
                                    $roi = 0.1 * invest
                                    console.log($roi)
                                    document.getElementById('message-text').value = $roi
                                }else if(risco == 2){
                                    $roi = 0.2 * invest
                                    console.log($roi)
                                    document.getElementById('message-text').value = $roi
                                }
                            }
                          })
                      }        
              
                   </script>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                      <button id="simular" type="button" class="btn btn-primary" onclick="simular()">Simular</button>
                    </div>
                  </div>
                </div>
              </div>







             @endforeach

        </tbody>
       
    </table>
    @if(count($projetos) == 0)
        <p>Não há projetos cadastrados</p>
    @endif
</div>
    



@endsection

        
        
 