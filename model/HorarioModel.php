<?php
class HorarioModel extends ActiveRecord {

    const TABLE = 'horario';
    const PRIMARY_KEY = 'id';

    private $id;
    private $id_medico;
    private $ds_medico;
    private $data_consulta;
    private $horario_disponivel;
    private $data_criacao;
    private $data_alteracao;

    public function __construct() {
        parent::__construct(self::TABLE, self::PRIMARY_KEY);
    }

    ###
    # métodos sobrescritos de ActiveRecord
    ###
    public function fetchById($id) {
        $query = "SELECT * FROM ".self::TABLE." WHERE ".self::PRIMARY_KEY." = ".$id." LIMIT 1";
        $resultado = mysqli_query($this->db, $query);
        if ($row = mysqli_fetch_assoc($resultado)) {
            $this->id = $row['id'];
            $this->id_medico = $row['id_medico'];
            $this->data_consulta = $row['data_consulta'];
            $this->horario_disponivel = $row['horario_disponivel'];
            $this->data_criacao = $row['data_criacao'];
            $this->data_alteracao = $row['data_alteracao'];
            return $this;
        }
        return false;
    }

    public function fetchAll() {
        $data = array();
        $query = "SELECT * FROM " . self::TABLE;
        $resultado = mysqli_query($this->db, $query);
        while ($row = mysqli_fetch_assoc($resultado)) {
            $objeto = new self();
            $objeto->id = $row['id'];
            $objeto->id_medico = $row['id_medico']; #este aqui é uma FK

            $medico = new MedicoModel();
            $loadMedico = $medico->fetchById($row['id_medico']);
            $objeto->ds_medico = $loadMedico->getNome();

            $objeto->data_consulta =  $row['data_consulta'] ;
            $objeto->horario_disponivel = $row['horario_disponivel'];
            $objeto->data_criacao = $row['data_criacao'];
            $objeto->data_alteracao = $row['data_alteracao'];
            $data[] = $objeto;
        }
        //echo "<pre>"; print_r($data); echo "</pre>"; die;
        return $data;
    }

    public function save() {

        //$dataConsulta = $this->converteDataBrToEUA($this->data_consulta)." ".$this->horario_disponivel;
        $st_horario_agendado = 1;
        //echo "<pre>"; print_r($this); echo "</pre>"; die;

        $id = isset($this->{self::PRIMARY_KEY}) ? $this->{self::PRIMARY_KEY} : null;
        if (empty($id)) {
            $statement = mysqli_prepare($this->db, " INSERT INTO ".self::TABLE." (id_medico, data_consulta,horario_disponivel) VALUES (?,?,?)");
            mysqli_stmt_bind_param($statement,"ssi", $this->id_medico, $this->data_consulta, $st_horario_agendado );
            mysqli_stmt_execute($statement);
            mysqli_stmt_close($statement);
            $id = mysqli_insert_id($this->db);
            $this->id = $id;
        } else {
            $statement = mysqli_prepare($this->db, " UPDATE ".self::TABLE." SET id_medico = ?, data_consulta = ? , horario_disponivel = ? WHERE " . self::PRIMARY_KEY . " = " . $id);
            mysqli_stmt_bind_param($statement,"sss", $this->id_medico , $dataConsulta , $st_horario_agendado);
            mysqli_stmt_execute($statement);
            mysqli_stmt_close($statement);
        }
        return $id;
    }

    public function delete() {
        $id = isset($this->{self::PRIMARY_KEY}) ? $this->{self::PRIMARY_KEY} : null;
        if (empty($id)) { return false; }
        $query = "DELETE FROM ".self::TABLE." WHERE ".self::PRIMARY_KEY." = ".$id;
        if (mysqli_query($this->db, $query)) { return true; }
        return false;
    }

    ###
    # getters e setters
    ###

   
    public function getId() {
        return $this->id;
    }
    public function getIdMedico() {
        return $this->id_medico;
    }
    public function getDsMedico() {
        return $this->ds_medico;
    }
    public function getConsulta() {
        return $this->data_consulta;
    }
    public function getHorarioDisponivel() {
        return $this->horario_disponivel;
    }
    public function getDataCriacao() {
        return $this->data_criacao;
    }
    public function getDataAlteracao() {
        return $this->data_alteracao;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdMedico($id_medico) {
        $this->id_medico = $id_medico;
    }

    public function setConsulta($data_consulta) {
        $this->data_consulta = $data_consulta;
    }

    public function setHorarioDisponivel($horario_disponivel) {
        $this->horario_disponivel = $horario_disponivel;
    }

    public function setDataCriacao($data_criacao) {
        $this->data_criacao = $data_criacao;
    }
    public function setDataAlteracao($data_alteracao) {
        $this->data_alteracao = $data_alteracao;
    }
}
?>
