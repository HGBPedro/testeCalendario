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
        !empty($dados->dtData) &&
        !empty($dados->hrHoraInicio) &&
        !empty($dados->hrHoraFim) &&
        !empty($dados->deTituloTarefa)
    ){
        $tarefasObj->dtData = (new DateTime($dados->dtData))->format('Y-m-d');
        $tarefasObj->hrHoraInicio = (new DateTime($dados->hrHoraInicio))->format('H:i:s');
        $tarefasObj->hrHoraFim = (new DateTime($dados->hrHoraFim))->format('H:i:s');
        $tarefasObj->deTituloTarefa = $dados->deTituloTarefa;
        $tarefasObj->deDescricao = $dados->deDescricao;
        
        if($tarefasObj->create()){
            http_response_code(201);

            echo json_encode(array("mensagem" => "Tarefa incluída."));
        }
        else {
            http_response_code(503);

            echo json_encode(array("mensagem" => "Erro na criação da tarefa"));
        }
    }
    else {
        http_response_code(403);

        echo json_encode(array("mensagem" => "Faltam informações para a inserção."));
    }

?>