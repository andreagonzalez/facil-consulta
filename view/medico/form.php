<?php
$label = isset($loadObjeto) ? "Editar Medico" : "Novo Medico";
?>

<div class="centro" style="background:white;width:70%;padding:15px;">
    <h2>Cadastrar Médico</h2>
    <form action="index.php?controller=medico&action=formAction" method="post">
        <table class="tabelaForm">
            <input type="hidden" name="id" value="<?php echo isset($loadObjeto) ? $loadObjeto->getId() : ""; ?>" >
            <tr>
                <td>
                    <label>Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?php echo isset($loadObjeto) ? $loadObjeto->getNome() : ""; ?>" placeHolder="Insira o nome do profissional">
                </td>
            </tr>
            <tr>
                <td>
                    <label>E-mail:</label>
                    <input type="text" id="email" name="email" value="<?php echo isset($loadObjeto) ? $loadObjeto->getEmail() : ""; ?>" placeHolder="exemplo@dominio.com.br">
                </td>
            </tr>
            <tr>
                <td>
                    <label>Senha:</label>
                    <input type="text" id="senha" name="senha" value="<?php echo isset($loadObjeto) ? $loadObjeto->getSenha() : ""; ?>" placeHolder="Escolha uma senha forte e segura" autocomplete="off">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="button" value="<?php echo isset($loadObjeto) ? "Editar médico" : "Realizar Cadastro"; ?>"  class="botaoCadastro fundoPrimario" onclick="validar()">
                </td>
            </tr>
        </table>
    </form> 
</div>

<script>
function validar(){

    if( validarForm()){
        document.querySelector("form").submit();
    }

    function validarForm(){
        var medicoNome = document.querySelector("#nome").value;
        var email = document.querySelector("#email").value;
        var senha = document.querySelector("#senha").value;

        if( medicoNome.toString().trim() == ""){
            alert('Insira o nome do médico');
            return false;
        }
        
        if( email.toString().trim() == ""){
            alert('Insira o email do médico');
            return false;
        }
        if( senha.toString().trim() == ""){
            alert('Insira a senha ');
            return false;
        }
        return true;
    }
}
</script>