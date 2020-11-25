<?php
class HorarioController {

    public function index() {
        $agenda = new AgendaModel();
        $load = $agenda->fetchAll();
        // echo "<pre>"; print_r($load); echo "</pre>"; die;

        ob_start();
        include('view/horario/index.php');
        $content = ob_get_clean();
        return $content;
    }

    public function form() {

        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        
        $id_medico = isset($_GET['id_medico']) ? (int) $_GET['id_medico'] : 0;
        $arrayMedico = null;
        if($id_medico > 0){
            $medico = new MedicoModel();
            $arrayMedico = $medico->fetchById($id_medico);
        }

        $loadObjeto = null;

        if($id > 0){
            $objetoModel = new HorarioModel();
            $loadObjeto = $objetoModel->fetchById($id);
        }
        ob_start();
        include('view/horario/form.php');
        $content = ob_get_clean();
        return $content;
    }    
    public function formAction() {
        $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
        $id_medico = isset($_POST['id_medico']) ? (int) $_POST['id_medico'] : 0;
        $data = isset($_POST['data']) ? addslashes($_POST['data']) : "";
        $horario = isset($_POST['horario']) ? addslashes($_POST['horario']) : "";
        // echo "<pre>"; print_r($_POST); echo "</pre>"; die;

        $objeto = new HorarioModel();
        $objeto->setId($id);
        $objeto->setIdMedico($id_medico);
        $objeto->setConsulta($data);
        $objeto->setHorarioDisponivel($horario);
        $objetoId = $objeto->save();

        //header('Location: index.php?controller=horarioo&action=form&id='.$objetoId.'&r=success&m=' . urlencode('Salvo com sucesso!'));
        header('Location: index.php?controller=horario&action=index');
        die;
    }

    public function agenda() {
        // $horario = new HorarioModel();
        // $arrayHorario = $horario->fetchAll();

        $id_medico = $_GET['id_medico'];

        $medico = new MedicoModel();
        $loadMedico = $medico->fetchById($id_medico);
        $loadHorario = $medico->fecthMedicoHorario();

        //echo "<pre>"; print_r($loadHorario); echo "</pre>"; die;

        ob_start();
        include('view/horario/agenda.php');
        $content = ob_get_clean();
        return $content;
    }

    public function agendaAction() {

        $id_medico = $_POST['id_medico'];
        $data = $_POST['data'];
        $data = Funcoes::converterDataBRParaEUA($data,1);

        $objeto = new HorarioModel();
        $objeto->setId($id);
        $objeto->setIdMedico($id_medico);
        $objeto->setConsulta($data);
        $objeto->setHorarioDisponivel(1);
        $objetoId = $objeto->save();

        header("Location: index.php?controller=horario&action=agenda&id_medico=".$id_medico);
        die;
    }

    public function remove() {
        // parâmetros
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        // se algum id foi passado por parâmetro, tenta remover o registro
        if ($id) {
            $objeto = new HorarioModel();
            $objeto->fetchById($id);
            $objeto->delete();
        }

        // redireciona
        header('Location: index.php?controller=horario&r=success&m=' . urlencode('Removido com sucesso!'));
        die;
    }
}
?>