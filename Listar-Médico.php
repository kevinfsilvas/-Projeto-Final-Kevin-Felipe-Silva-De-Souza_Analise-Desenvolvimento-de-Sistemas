<h1>Listar Médico</h1>
<?php
$sql = "SELECT * FROM medico";

$res = $conn->query($sql);

$qtd = $res->num_rows;

if($qtd > 0){
    echo "<p>Encontrou <b>$qtd</b> reusltado(s)</p>";
    echo "<table class='table table-bordered table-striped table-hover'>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Nome</th>";
    echo "<th>CRM</th>";
    echo "<th>Especialidade</th>";
    echo "<th>Ações</th>";
    echo "</tr>";
    $count = 1;
    while($row = $res->fetch_object()){
     echo "<tr>";   
     echo "<td>".$count++."</td>";  
     echo "<td>".$row->nome_medico."</td>";  
     echo "<td>".$row->crm_medico."</td>";  
     echo "<td>".$row->especialidade_medico."</td>
     ";  
     echo "<td>
     <button class='btn btn-success'onclick=\"location.href='?page=editar-medico&id_medico=".$row->id_medico."';\">Editar</button>
     <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-medico&acao=excluir&id_medico=".$row->id_medico."';}else{false;}\">Excluir</button>
     </td>";
     echo "</tr>";
    }
    echo "<table>";
}else{
    echo "Não encontrou resultado";
}
