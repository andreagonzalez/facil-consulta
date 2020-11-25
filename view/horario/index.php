<?php
if (isset($load) && !empty($load)) {
    foreach ($load as $medico) {  
        $id_medico = $medico['id'];
?>
    <div class="centro" style="background:white;width:90%;padding:15px;margin-bottom:25px;">
        <table class="tabelaMedicosNomes">
            <tr>
                <td><?=$medico['nome'];?></td>
                <td><a href="?controller=medico&action=form&id=<?=$id_medico;?>" class="botaoMedicosAcoes">Editar cadastro</a></td>
                <td><a href="?controller=horario&action=agenda&id_medico=<?=$id_medico;?>" class="botaoMedicosAcoes">Configurar horário</a></td>
            </tr>
        </table>
        <table class="tabelaMedicosHorarios">
            <?php
            $i = 0;
            foreach ($medico['horarios'] as $horarios) {  
                $i++;
                if($i<2 && $i%4==0) echo "<tr>";
                echo "<td><div><div class='botaoMedicosHorarios'>".Funcoes::converterDataEUAParaBR($horarios['data_consulta'],1)."</div></div></td>";

                if($i>3 && $i%4==0) echo "</tr>";
            }                
            // BUG
            if( count( $medico['horarios'] ) < 4 ) { 
                echo str_repeat("<td><div><div class=''></div></div></td>", 4 - count( $medico['horarios'] ) );
                echo "</tr>";
            }
            ?>
        </table>
    </div>

<?php
    }
}

