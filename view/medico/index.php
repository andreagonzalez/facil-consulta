<h2>Lista de Médicos</h2>
<br clear="all">

<a href="?controller=medico&action=form" class="botaoLink fundoSecundario">Cadastrar Médico</a>

<br clear="all">
<br clear="all">

<table class="tabelaGrid">
    <tr>
        <th style="width:5%">#</th>
        <th style="width:20%">NOME</th>
        <th style="width:20%">EMAIL</th>
        <th style="width:15%">DATA CRIACAO</th>
        <th style="width:15%">DATA ALTERACAO</th>
        <th style="width:10%"></th>
    </tr>

<?php
if (isset($arrayMedicos) && !empty($arrayMedicos)) {
    foreach ($arrayMedicos as $linha) {  
    ?>
        <tr>
            <td><?php echo $linha->getId(); ?></td>
            <td><?php echo $linha->getNome(); ?></td>
            <td><?php echo $linha->getEmail(); ?></td>
            <td></td>
            <td ></td>
            <td>
                <a href="index.php?controller=medico&action=form&id=<?php echo $linha->getId(); ?>" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                <a href="index.php?controller=medico&action=remove&id=<?php echo $linha->getId(); ?>" title="Remover"><i class="glyphicon glyphicon-trash"></i></a>
                <a href="index.php?controller=horario&action=agenda&id_medico=<?php echo $linha->getId(); ?>" title="Novo Horario"><i class="glyphicon glyphicon-calendar"></i></a>
            </td>
        </tr>
    <?php
    }
}

?>
