<?php include 'layout.php'; 

    if(isset($_SESSION['edit']))
    {
        $edit = json_decode($_SESSION['edit']);
    }
    else{
        echo ' nao tem id';
    }
?>
<section id="about" class="about">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-11">
            <form action="../api/Tarefas/update.php" method=post>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Título:</span>
                            </div>
                            <input type="text" id="deTitulo" value="<?php echo $edit['de_TituloTarefa']?>" name="deTitulo" class="form-control" aria-describedby="basic-addon1">
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
              <button type="submit" class="btn btn-success">Alterar tarefa</button>
            </div>
        </form>
        </div>
    </div>
</section>