<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    include_once '../objects/Tarefas.php';
    include_once '../config/db.php';

    $db = new Database();
    $conn = $db->getConnection();

    $tarefasObj = new Tarefas($conn);

    $query = $tarefasObj->readAll();
    $resultsCount = $query->rowCount();

    if($resultsCount > 0)
    {
        $listaTarefas = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $tarefa = array(
                "id" => $id_Tarefa,
                "title" => $de_TituloTarefa,
                "start" => $dt_DataInicio,
                "end" => $dt_DataFim,
                //"startTime" => $hr_HoraInicio,
                //"endTime" => $hr_HoraFim,
                //"allDay" => false
                "progressiveEventRendering" => true,
                "forceEventDuration" => true
            );

            $listaTarefas [] = $tarefa;
        }

        http_response_code(200);

        echo json_encode($listaTarefas);
    }
    else
    {
        http_response_code(400);

        echo json_encode(array("mensagem" => "Nenhuma tarefa encontrada."));
    }

?>