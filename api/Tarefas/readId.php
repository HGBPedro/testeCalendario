<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');

    include_once '../objects/Tarefas.php';
    include_once '../config/db.php';

    $db = new Database();
    $conn = $db->getConnection();

    $tarefasObj = new Tarefas($conn);

    $tarefaId = isset($_GET['id_Tarefa']) ? $_GET['id_Tarefa'] : 0;

    $query = $tarefasObj->readId($tarefaId);
    $resultsCount = $query->rowCount();

    if($resultsCount > 0)
    {
        $listaTarefas = array();

        while($row = $query->fetch(PDO::FETCH_ASSOC)){
            extract($row);

            $tarefa = array(
                "id_Tarefa" => $id_Tarefa,
                "dt_DataInicio" => $dt_DataInicio,
                "dt_DataFim" => $dt_DataFim,
                //"hr_HoraInicio" => $hr_HoraInicio,
                //"hr_HoraFim" => $hr_HoraFim,
                "de_TituloTarefa" => $de_TituloTarefa,
                "de_Descricao" => $de_Descricao
            );

            $listaTarefas [] = $tarefa;
        }
        http_response_code(200);
        
        echo json_encode($tarefa);
    }
    else
    {
        http_response_code(400);

        echo json_encode(array("Mensagem" => "Tarefa correspondente não encontrada."));
    }

?>