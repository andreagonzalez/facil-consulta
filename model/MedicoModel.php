<?php
class MedicoModel extends ActiveRecord {

    const TABLE = 'medico';
    const PRIMARY_KEY = 'id';

    private $id;
    private $nome;
    private $email;
    private $senha;


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
            $this->nome = $row['nome'];
            $this->email = $row['email'];
            $this->senha = $row['senha'];
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
            $objeto->nome = $row['nome'];
            $objeto->email = $row['email'];
            $data[] = $objeto; #### É AQUI QUE CRIA O ARRAY DE MÉDICO?
        }
        return $data;
    }

    public function save() {

        //echo "<pre>"; print_r($this); echo "</pre>"; die;

        $id = isset($this->{self::PRIMARY_KEY}) ? $this->{self::PRIMARY_KEY} : null;
        if (empty($id)) {

            $statement = mysqli_prepare($this->db, " INSERT INTO ".self::TABLE." (nome,email,senha) VALUES (?,?,?)");
            mysqli_stmt_bind_param($statement,"sss", $this->nome , $this->email , $this->senha );
            mysqli_stmt_execute($statement);
            mysqli_stmt_close($statement);
            $id = mysqli_insert_id($this->db);
            $this->id = $id;
        } else {
            $statement = mysqli_prepare($this->db, " UPDATE ".self::TABLE." SET nome = ?, email = ? , senha = ? WHERE " . self::PRIMARY_KEY . " = " . $id);
            mysqli_stmt_bind_param($statement,"sss", $this->nome , $this-> email , $this->senha);
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

    public function fecthMedicoHorario(){
        //echo "<pre>"; print_r($this); echo "</pre>";
        $data = array();
        $query = " SELECT * FROM horario WHERE id_medico = ".$this->getId()." ORDER BY horario.data_consulta ASC ;";
        $resultado = mysqli_query($this->db, $query);
        while ($row = mysqli_fetch_assoc($resultado)) {
            $row['data_consulta_br'] = Funcoes::converterDataEUAParaBR($row['data_consulta'],1); 
            $data[] = $row; 
        }
        return $data;        
    }

    ###
    # getters e setters
    ###
    public function getId() {
        return $this->id;
    }
    public function getNome() {
        return $this->nome;
    }
    public function getEmail() {
        return $this->email;
    }
    public function getSenha() {
        return $this->senha;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }    
}
?>
