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

    $id = $_POST['idTarefa'];
    $titulo = $_POST['deTituloEdit'];
    $dataInicio = $_POST['dtDataInicioEdit'];
    $dataFim = $_POST['dtDataFimEdit'];
    $horaInicio = isset($_POST['hrHoraInicioEdit']) ? $_POST['hrHoraInicioEdit'] : '00:00:00';
    $horaFim = isset($_POST['hrHoraFimEdit']) ? $_POST['hrHoraFimEdit'] : '23:59:59';
    $descricao = $_POST['deDescricaoEdit'];

    if(
        !empty($id) && 
        !empty($dataInicio) &&
        !empty($dataFim) &&
        !empty($titulo)
    ){
        $tarefasObj->idTarefa = $id;
        $tarefasObj->dtDataInicio = (new DateTime($dataInicio))->format('Y-m-d');
        $tarefasObj->dtDataFim = (new DateTime($dataFim))->format('Y-m-d');
        $tarefasObj->hrHoraInicio = (new DateTime($horaInicio))->format('H:i:s');
        $tarefasObj->hrHoraFim = (new DateTime($horaFim))->format('H:i:s');
        $tarefasObj->deTituloTarefa = $titulo;
        $tarefasObj->deDescricao = $descricao;
        
        if($tarefasObj->update()){
            // http_response_code(200);
            // echo json_encode(array("mensagem" => "Tarefa atualizada."));
            header('Location: ../../views/main-page.php', true, 301);
            die();
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