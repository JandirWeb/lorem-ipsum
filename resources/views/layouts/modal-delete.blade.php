<!-- Modal Excluir-->
<form action="/projetos/{{ $projeto->id }}" method="POST" class="bt-deletar">
    @csrf
    @method('DELETE')
  <div class="modal fade" id="modal-excluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Confirmação</h5>
        </div>
        <div class="modal-body">
          <p class="text-center">Confirma a exclusão do projeto?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Excluir</button>
        </div>
      </div>
    </div>
  </div>
</form>