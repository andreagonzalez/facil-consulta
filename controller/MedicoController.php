<?php
class MedicoController {

    public function index() {
        $medico = new MedicoModel();
        $arrayMedicos = $medico->fetchAll();

        ob_start();
        include('view/medico/index.php');
        $content = ob_get_clean();
        return $content;
    }

    public function form() {

        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        $loadObjeto = null;

        if($id > 0){
            $objetoModel = new MedicoModel();
            $loadObjeto = $objetoModel->fetchById($id);
        }
        ob_start();
        include('view/medico/form.php');
        $content = ob_get_clean();
        return $content;
    }    

    public function formAction() {

        $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
        $nome = isset($_POST['nome']) ? $_POST['nome'] : "";
        $email = isset($_POST['email']) ? addslashes($_POST['email']) : "";
        $senha = isset($_POST['senha']) ? addslashes($_POST['senha']) : "";
        //echo "<pre>"; print_r($_POST); echo "</pre>"; die;

        $objeto = new MedicoModel();
        $objeto->setId($id);
        $objeto->setNome($nome);
        $objeto->setEmail($email);
        $objeto->setSenha($senha);
        $objetoId = $objeto->save();

        //header('Location: index.php?controller=medico&action=form&id='.$objetoId.'&r=success&m=' . urlencode('Salvo com sucesso!'));
        header('Location: index.php?controller=medico&action=index');
        die;
    }
    
    public function remove() {
        // parâmetros
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

        // se algum id foi passado por parâmetro, tenta remover o registro
        if ($id) {
            $objeto = new MedicoModel();
            $objeto->fetchById($id);
            $objeto->delete();
        }

        // redireciona
        header('Location: index.php?controller=medico&r=success&m=' . urlencode('Removido com sucesso!'));
        die;
    }    
}
?>