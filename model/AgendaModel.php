<?php
class AgendaModel extends ActiveRecord {

    const TABLE = 'medico';
    const PRIMARY_KEY = 'id';

    public function __construct() {
        parent::__construct(self::TABLE, self::PRIMARY_KEY);
    }

    public function fetchById($id){}
    public function fetchAll() {
        $data = array();
        $query = "SELECT * FROM medico ";
        $resultado = mysqli_query($this->db, $query);
        // busca lista todos os medicos
        while ($linhaMedico = mysqli_fetch_assoc($resultado)) {
            $id_medico = $linhaMedico['id'];
            
            // busca lista de horarios
            $query2 = "SELECT * FROM horario WHERE id_medico = $id_medico ORDER BY data_consulta ASC ";
            $resultado2 = mysqli_query($this->db, $query2);
            $horarios = array();
            while ($linhaHorario = mysqli_fetch_assoc($resultado2)) {
                $horarios[] = $linhaHorario;
            }

            $linhaMedico['horarios'] = $horarios;
            $data[] = $linhaMedico;
        }
        //echo "<pre>"; print_r($data); echo "</pre>"; die;
        return $data;
    }
    public function save() {}
    public function delete() {}    
}
?>
