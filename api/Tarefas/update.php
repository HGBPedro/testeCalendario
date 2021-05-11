<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
    include_once '../objects/Tarefas.php';
    include_once '../config/db.php';

    $db = new Database();
    $conn = $db->getConnection();

    $tarefasObj = new Tarefas($conn);

    $dados = json_decode(file_get_contents("php://input"));

    if(
        !empty($dados->idTarefa) && 
        !empty($dados->dtDataInicio) &&
        !empty($dados->dtDataFim) &&
        !empty($dados->hrHoraInicio) &&
        !empty($dados->hrHoraFim) &&
        !empty($dados->deTituloTarefa)
    ){
        $tarefasObj->idTarefa = $dados->idTarefa;
        $tarefasObj->dtDataInicio = (new DateTime($dados->dtDataInicio))->format('Y-m-d');
        $tarefasObj->dtDataFim = (new DateTime($dados->dtDataFim))->format('Y-m-d');
        $tarefasObj->hrHoraInicio = (new DateTime($dados->hrHoraInicio))->format('H:i:s');
        $tarefasObj->hrHoraFim = (new DateTime($dados->hrHoraFim))->format('H:i:s');
        $tarefasObj->deTituloTarefa = $dados->deTituloTarefa;
        $tarefasObj->deDescricao = $dados->deDescricao;
        
        if($tarefasObj->update()){
            http_response_code(200);

            echo json_encode(array("mensagem" => "Tarefa atualizada."));
        }
        else {
            http_response_code(503);

            echo json_encode(array("mensagem" => "Erro na atualização da tarefa"));
        }
    }
    else {
        http_response_code(403);

        echo json_encode(array("mensagem" => "Faltam informações para a atualização."));
    }

?>