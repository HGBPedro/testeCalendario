<?php
    class Tarefas{
        
        private $table_name = 'tbl_tarefas';
        private $conn;

        public $idTarefa;
        public $dtData;
        public $hrHoraInicio;
        public $hrHoraFim;
        public $deTitulo;
        public $deDescricao;

        public function __construct($connection){
            $this->conn = $connection;
        }

        public function readAll(){
            $query = "SELECT * FROM " . $this->table_name;

            $result = $this->conn->prepare($query);
            $result->execute();

            return $result;
        }

        public function readId($id){
            $query = "SELECT * FROM " . $this->table_name . " WHERE id_Tarefa = " . $id;
            
            $result = $this->conn->prepare($query);
            $result->execute();

            return $result;
        }

        public function create(){
            $query = "INSERT INTO " 
                    . $this->table_name
                    . " (dt_Data, hr_HoraInicio, hr_HoraFim, de_TituloTarefa, de_Descricao)
                        VALUES( 
                        :dtData, 
                        :hrHoraInicio, 
                        :hrHoraFim, 
                        :deTituloTarefa, 
                        :deDescricao)";
            
            $result = $this->conn->prepare($query);

            $this->dtData=htmlspecialchars(strip_tags($this->dtData));
            $this->hrHoraInicio=htmlspecialchars(strip_tags($this->hrHoraInicio));
            $this->hrHoraFim=htmlspecialchars(strip_tags($this->hrHoraFim));
            $this->deTituloTarefa=htmlspecialchars(strip_tags($this->deTituloTarefa));
            $this->deDescricao=htmlspecialchars(strip_tags($this->deDescricao));

            $result->bindParam(":dtData", $this->dtData);
            $result->bindParam(":hrHoraInicio", $this->hrHoraInicio);
            $result->bindParam(":hrHoraFim", $this->hrHoraFim);
            $result->bindParam(":deTituloTarefa", $this->deTituloTarefa);
            $result->bindParam(":deDescricao", $this->deDescricao);

            if($result->execute())
            {
                return true;
            }
            else {
                return false;
            }
        }
        
        public function update(){
            $query = "UPDATE " 
                    . $this->table_name
                    . " SET
                         dt_Data = :dtData, 
                         hr_HoraInicio = :hrHoraInicio, 
                         hr_HoraFim = :hrHoraFim,
                         de_TituloTarefa = :deTituloTarefa, 
                         de_Descricao = :deDescricao
                        WHERE 
                         id_Tarefa = :idTarefa";

                        
            $result = $this->conn->prepare($query);
            
            $this->idTarefa = htmlspecialchars(strip_tags($this->idTarefa));
            $this->dtData = htmlspecialchars(strip_tags($this->dtData));
            $this->hrHoraInicio = htmlspecialchars(strip_tags($this->hrHoraInicio));
            $this->hrHoraFim = htmlspecialchars(strip_tags($this->hrHoraFim));
            $this->deTituloTarefa = htmlspecialchars(strip_tags($this->deTituloTarefa));
            $this->deDescricao = htmlspecialchars(strip_tags($this->deDescricao));
            
            $result->bindParam(":idTarefa", $this->idTarefa);
            $result->bindParam(":dtData", $this->dtData);
            $result->bindParam(":hrHoraInicio", $this->hrHoraInicio);
            $result->bindParam(":hrHoraFim", $this->hrHoraFim);
            $result->bindParam(":deTituloTarefa", $this->deTituloTarefa);
            $result->bindParam(":deDescricao", $this->deDescricao);
            
            if($result->execute())
            {
                return true;
            }
            else {
                return false;
            }
        }

        public function delete(){
            $query = "DELETE FROM " . $this->table_name . " WHERE id_Tarefa = :idTarefa";

            $result = $this->conn->prepare($query);
            
            $this->idTarefa = htmlspecialchars(strip_tags($this->idTarefa));
            
            $result->bindParam(":idTarefa", $this->idTarefa);
            
            if($result->execute())
            {
                return true;
            }
            else {
                return false;
            }
        }
    }
?>