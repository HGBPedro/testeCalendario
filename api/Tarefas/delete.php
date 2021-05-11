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

    $id = isset($_POST['id_Tarefa']) ? $_POST['id_Tarefa'] : null;

    if(
        !empty($id) 
    ){
        $tarefasObj->idTarefa = $id;
        
        if($tarefasObj->delete()){
            // http_response_code(200);

            // echo json_encode(array("mensagem" => "Tarefa excluída."));
            header('Location: ../../views/main-page.php', true, 301);
            die();
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