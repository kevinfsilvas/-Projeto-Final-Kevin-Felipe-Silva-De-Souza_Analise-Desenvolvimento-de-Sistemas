<h1>Listar Paciente</h1>

<?php
$sql = "SELECT * FROM paciente";

$res = $conn->query($sql);

$qtd = $res->num_rows;

if($qtd > 0){
    echo "<p>Encontrou <b>$qtd</b> reusltado(s)</p>";
    echo "<table class='table table-bordered table-striped table-hover'>";
    echo "<tr>";
    echo "<th>#</th>";
    echo "<th>Nome</th>";
    echo "<th>CPF</th>";
    echo "<th>Data de Nascimento</th>";
    echo "<th>Sexo</th>";
    echo "<th>Telefone</th>";
    echo "<th>Email</th>";
    echo "<th>Endereço</th>";
    echo "<th>Ações</th>";
    echo "</tr>";
    $count = 1;
    while($row = $res->fetch_object()){
        if($row->sexo_paciente == "m"){
            $sexo = "Masculino";
        }else{
            $sexo = "Feminino";
        }
     echo "<tr>";   
     echo "<td>".$count++."</td>";  
     echo "<td>".$row->nome_paciente."</td>";  
     echo "<td>".$row->cpf_paciente."</td>";  
     echo "<td>".$row->data_nasc_paciente."</td>";
     echo "<td>".$sexo."</td>";
     echo "<td>".$row->fone_paciente."</td>";
     echo "<td>".$row->email_paciente."</td>";
     echo "<td>".$row->endereco_paciente."</td>
     ";  
     echo "<td>
     
     <button class='btn btn-success'onclick=\"location.href='?page=editar-paciente&id_paciente=".$row->id_paciente."';\">Editar</button>
     <button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-paciente&acao=excluir&id_paciente=".$row->id_paciente."';}else{false;}\">Excluir</button>
     </td>";
     
     echo "</tr>";
    }
    echo "<table>";
}else{
    echo "Não encontrou resultado";
}
