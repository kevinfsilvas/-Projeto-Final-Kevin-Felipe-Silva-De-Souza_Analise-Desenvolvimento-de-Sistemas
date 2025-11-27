<h1>Salvar Atestado</h1>

<?php
switch ($_REQUEST['acao']) {
    case 'cadastrar':
        $paciente = $_POST["paciente_id_paciente"];
        $medico = $_POST["medico_id_medico"];
        $data_emissao = $_POST["data_emissao"];
        $motivo = $_POST["motivo"];
        $afastado = $_POST["afastado"];
        $data_inicio = $_POST["data_inicio"];
        $data_fim = $_POST["data_fim"];

        $sql = "INSERT INTO atestado (
        paciente_id_paciente,
        medico_id_medico,
        data_emissao,
        motivo,
        afastado,
        data_inicio, 
        data_fim
        ) VALUES (
        '{$paciente}', 
        '{$medico}', 
        '{$data_emissao}',
        '{$motivo}', 
        '{$afastado}',
        '{$data_inicio}',
        '{$data_fim}'
         )";

        $res = $conn->query($sql);

        if ($res == true) {
            print "<script>alert('O cadastro foi realizado com sucesso');</script>";
            print "<script>location.href='?page=listar-atestado';</script>";
        } else {
            print "<script>alert('Não foi possivel cadastrar');</script>";
            print "<script>location.href='?page=listar-atestado';</script>";
        }
        break;
    case 'editar':
        $paciente = $_POST["paciente_id_paciente"];
        $medico = $_POST["medico_id_medico"];
        $data_emissao = $_POST["data_emissao"];
        $motivo = $_POST["motivo"];
        $afastado = $_POST["afastado"];
        $data_inicio = $_POST["data_inicio"];
        $data_fim = $_POST["data_fim"];
     
        $sql = "UPDATE atestado SET
		paciente_id_paciente='{$paciente}',
		medico_id_medico='{$medico}',
		data_emissao='{$data_emissao}',
        motivo='{$motivo}',
        afastado='{$afastado}',
        data_inicio='{$data_inicio}',
        data_fim='{$data_fim}'

		WHERE id_atestado = ".$_REQUEST['id_atestado'];

        $res = $conn->query($sql);

        if($res==true){
            print "<script>alert('Editou com sucesso!');</script>";
            print "<script>location.href='?page=listar-atestado';</script>";
        }else{
            print "<script>alert('Não editou!');</script>";
            print "<script>location.href='?page=listar-atestado';</script>";
        }
        break;

    case 'excluir':
        $sql = "DELETE FROM atestado WHERE id_atestado=".$_REQUEST['id_atestado'];

		$res = $conn->query($sql);

		if($res==true){
            print "<script>alert('Excluiu com sucesso!');</script>";
            print "<script>location.href='?page=listar-atestado';</script>";
        }else{
            print "<script>alert('Não excluiu!');</script>";
            print "<script>location.href='?page=listar-atestado';</script>";
        }



        break;
}


?>
