<h1>Editar Atestado</h1>
<?php

$sql = "SELECT * FROM atestado WHERE id_atestado=" . $_REQUEST['id_atestado'];
$res = $conn->query($sql);
$row = $res->fetch_object();

?>

<form action="?page=salvar-atestado" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_atestado" value="<?php echo $row->id_atestado; ?>">

    <div class="mb-3">
        <label>Nome do Paciente</label>
        <select name="paciente_id_paciente" class="form-control">
            <option> -- Escolha um Paciente -- </option>
            <?php
            $sql_1 = "SELECT * FROM paciente AS p INNER JOIN atestado AS a ON p.id_paciente = a.paciente_id_paciente";
            $res_1 = $conn->query($sql_1);
            $qtd_1 = $res_1->num_rows;

            if ($qtd_1 > 0) {
                while ($row_1 = $res_1->fetch_object()) {
                    if ($row_1->id_paciente == $row->paciente_id_paciente) {
                        echo "<option value='" . $row_1->id_paciente . "' selected>" . $row_1->nome_paciente . "</option>";
                    } else {
                        echo "<option value='" . $row_1->id_paciente . "'>" . $row_1->nome_paciente . "</option>";
                    }
                }
            } else {
                echo "<option> Não há pacientes</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Nome do Médico</label>
        <select name="medico_id_medico" class="form-control">
            <option> -- Escolha um Médico -- </option>
            <?php
            $sql_2 = "SELECT * FROM medico AS m INNER JOIN atestado AS a ON m.id_medico = a.medico_id_medico";
            $res_2 = $conn->query($sql_2);
            $qtd_2 = $res_2->num_rows;

            if ($qtd_2 > 0) {
                while ($row_2 = $res_2->fetch_object()) {
                    if ($row_2->id_medico == $row->medico_id_medico) {
                        echo "<option value='" . $row_2->id_medico . "' selected>" . $row_2->nome_medico . "</option>";
                    } else {
                        echo "<option value='" . $row_2->id_medico . "'>" . $row_2->nome_medico . "</option>";
                    }
                }
            } else {
                echo "<option> Não há médicos</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Data de Emissão</label>
        <input type="date" name="data_emissao" class="form-control" value="<?php echo $row->data_emissao; ?>">
    </div>

    <div class="mb-3">
        <label>Motivo</label>
        <input type="text" name="motivo" class="form-control" value="<?php echo $row->motivo; ?>">
    </div>

    <div class="mb-3">
        <label>Afastado</label>
        <input type="text" name="afastado" class="form-control" value="<?php echo $row->afastado; ?>">
    </div>

    <div class="mb-3">
        <label>Data de Início</label>
        <input type="date" name="data_inicio" class="form-control" value="<?php echo $row->data_inicio; ?>">
    </div>

    <div class="mb-3">
        <label>Data de Fim</label>
        <input type="date" name="data_fim" class="form-control" value="<?php echo $row->data_fim; ?>">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</form>
