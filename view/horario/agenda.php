<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/jquery.datetimepicker.min.css">
<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.js"></script>

<h2>Agenda</h2>

<div class="centro" style="width:100%;">
    <div style="background:white;width:45%;padding:15px;float:left">
        <h2>Adicionar horários</h2>

        <form method="post" action="index.php?controller=horario&action=agendaAction">
            <input type="hidden" name="id_medico" value="<?=$loadMedico->getId(); ?>">
            <table class="tabelaForm">
                <tr>
                    <td>
                        <label>Nome</label>
                        <input type="text" value="<?php echo isset($loadMedico) ? $loadMedico->getNome() : ""; ?>" placeHolder="Insira o nome do profissional">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Data e hora</label>
                        <input type="text" id="data" name="data" placeHolder="dd/mm/yyyy hh:mm" autocomplete="off">
                    </td>
                </tr>
                <tr>            
                    <td>
                        <input type="button" value="Adicionar Horario" class="botaoCadastro fundoPrimario" onclick="validar()">
                    </td>                        
                </tr>
            </table>
        </form>
    </div>

    <div style="background:white;width:45%;padding:15px;float:left;margin-left:20px;">
        <h2>Horários configurados</h2>
        <table class="tabelaAgendaHorarios">
        <?php
        if (isset($loadHorario) && !empty($loadHorario)) {
            foreach ($loadHorario as $linha) {  
        ?>
            <tr>
                <td>
                    <?=$linha['data_consulta_br']?>
                </td>
                <td>
                    <a href="">Remover</a>
                </td>
            </tr>
        <?php
            }
        }
        ?>
        </table>
    </div>    
</div>
<script>
window.addEventListener('load',inicio);

function inicio(){
    jQuery.datetimepicker.setLocale('pt-BR');
    $('#data').datetimepicker({
        timepicker: true,
        format: 'd/m/Y H:i'
    });
}

function validar(){
    if( validarForm()){
        document.querySelector("form").submit();
    }

    function validarForm(){
        var dataConsulta = document.querySelector("#data").value;
        if( dataConsulta.toString().trim() == ""){
            alert('Insira a data da consulta');
            return false;
        }
        return true;
    }
}
</script>

