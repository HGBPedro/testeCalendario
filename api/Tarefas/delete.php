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
        !empty($dados->idTarefa) 
    ){
        $tarefasObj->idTarefa = $dados->idTarefa;
        
        if($tarefasObj->delete()){
            http_response_code(200);

            echo json_encode(array("mensagem" => "Tarefa excluída."));
        }
        else {
            http_response_code(503);

            echo(json_encode(array("mensagem" => "Erro na exclusão da tarefa")));
        }
    }
    else {
        http_response_code(403);

        echo(json_encode(array("mensagem" => "Tarefa não informada.")));
    }

?>