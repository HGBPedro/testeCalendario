<div class="modal fade" id="modalInsert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Criar tarefa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="../api/Tarefas/create.php" method=post>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Título:</span>
                            </div>
                            <input type="text" id="deTitulo" name="deTitulo" class="form-control" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Data de início:</span>
                            </div>
                            <input type="date" id="dtDataInicio" name="dtDataInicio" class="form-control" aria-describedby="basic-addon2">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">Data de encerramento:</span>
                            </div>
                            <input type="date" id="dtDataFim" name="dtDataFim" class="form-control" aria-describedby="basic-addon3">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Descrição:</span>
                            </div>
                            <textarea id="deDescricao" name="deDescricao" class="form-control"></textarea>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Criar tarefa</button>
            </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar tarefa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
        <form action="../api/Tarefas/update.php" method=post>
            <input type="hidden" id="idTarefaEdit" name="idTarefa">
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Título:</span>
                            </div>
                            <input type="text" id="deTituloEdit" value="" name="deTituloEdit" class="form-control" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2">Data de início:</span>
                            </div>
                            <input type="date" id="dtDataInicioEdit" name="dtDataInicioEdit" class="form-control" aria-describedby="basic-addon2">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon3">Data de encerramento:</span>
                            </div>
                            <input type="date" id="dtDataFimEdit" name="dtDataFimEdit" class="form-control" aria-describedby="basic-addon3">
                        </div>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Descrição:</span>
                            </div>
                            <textarea id="deDescricaoEdit" name="deDescricaoEdit" class="form-control"></textarea>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger align-self-start" onClick="excluirModal()">Excluir tarefa</button>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Alterar tarefa</button>
            </div>
        </form>
    </div>
  </div>
</div>