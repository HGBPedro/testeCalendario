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

    $titulo = $_POST['deTitulo'];
    $dataInicio = $_POST['dtDataInicio'];
    $dataFim = $_POST['dtDataFim'];
    $horaInicio = isset($_POST['hrHoraInicio']) ? $_POST['hrHoraInicio'] : '00:00:00';
    $horaFim = isset($_POST['hrHoraFim']) ? $_POST['hrHoraFim'] : '23:59:59';
    $descricao = $_POST['deDescricao'];

    if(
        !empty($titulo) &&
        !empty($dataInicio) &&
        !empty($dataFim)
    ){
        $tarefasObj->dtDataInicio = (new DateTime($dataInicio))->format('Y-m-d');
        $tarefasObj->dtDataFim = (new DateTime($dataFim))->format('Y-m-d');
        $tarefasObj->hrHoraInicio = (new DateTime($horaInicio))->format('H:i:s');
        $tarefasObj->hrHoraFim = (new DateTime($horaFim))->format('H:i:s');
        $tarefasObj->deTituloTarefa = $titulo;
        $tarefasObj->deDescricao = $descricao;
        
        if($tarefasObj->create()){
            header('Location: ../../views/main-page.php', true, 301);
            die();
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