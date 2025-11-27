<h1>Listar Atestado</h1>

<?php
$sql = "SELECT * FROM atestado AS a
        INNER JOIN paciente AS p
        ON p.id_paciente = a.paciente_id_paciente
        INNER JOIN medico AS m
        ON m.id_medico = a.medico_id_medico";

$res = $conn->query($sql);

$qtd = $res->num_rows;

if($qtd > 0){
    echo "<p>Encontrou <b>$qtd</b> resultado(s)</p>";
    echo "<table class='table table-bordered table-striped table-hover'>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Médico</th>";
    echo "<th>Paciente</th>";
    echo "<th>Data de Emissão</th>";
    echo "<th>Motivo</th>";
    echo "<th>Afastamento</th>";
    echo "<th>Data de Início</th>";
    echo "<th>Data de Fim</th>";
    echo "<th>Ações</th>";
    echo "</tr>";

    $count = 1;
    while($row = $res->fetch_object()){
        echo "<tr>";   
        echo "<td>".$count++."</td>";  
        echo "<td>".$row->nome_medico."</td>";
        echo "<td>".$row->nome_paciente."</td>";  
        echo "<td>".$row->data_emissao."</td>";  
        echo "<td>".$row->motivo."</td>";  
        echo "<td>".$row->afastado."</td>";  
        echo "<td>".$row->data_inicio."</td>";  
        echo "<td>".$row->data_fim."</td>";  
        echo "<td>
            <button class='btn btn-success' onclick=\"location.href='?page=editar-atestado&id_atestado=".$row->id_atestado."';\">Editar</button>
            <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-atestado&acao=excluir&id_atestado=".$row->id_atestado."';}else{return false;}\">Excluir</button>
              <a href='pdf_atestado.php?id_atestado=" . $row->id_atestado . "' class='btn btn-primary'>Gerar atestado</a>
        </td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Não encontrou resultados.</p>";
}
?>
