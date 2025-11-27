<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('config.php');

require_once 'dompdf/autoload.inc.php'; // Caminho do DomPDF
use Dompdf\Dompdf;

// Verifique se a conexão com o banco está ativa
if (!isset($conn)) {
    die("Erro: Conexão com o banco de dados não encontrada.");
}

// Verificar se o ID foi enviado
if (isset($_GET['id_atestado'])) {
    $id_atestado = intval($_GET['id_atestado']); // Sanitizar o ID

    // Buscar os dados do atestado no banco
    $sql = "SELECT * FROM atestado AS a
            INNER JOIN paciente AS p ON p.id_paciente = a.paciente_id_paciente
            INNER JOIN medico AS m ON m.id_medico = a.medico_id_medico
            WHERE a.id_atestado = ?";
    
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        die("Erro ao preparar a consulta: " . $conn->error);
    }

    // Fazendo o bind da variável correta
    $stmt->bind_param("i", $id_atestado);
    $stmt->execute();
    $res = $stmt->get_result();

    // Verificando se o atestado foi encontrado
    if ($res->num_rows == 0) {
        die("Erro: Atestado não encontrado.");
    }

    $row = $res->fetch_object();

    // Iniciar o DomPDF
    $dompdf = new Dompdf();

    // HTML para o PDF
    $html = '<h1>Detalhes do Atestado de '. htmlspecialchars($row->nome_paciente).'</h1>';
    $html .= '<p><strong>Médico:</strong> ' . htmlspecialchars($row->nome_medico) . '</p>';
    $html .= '<p><strong>Paciente:</strong> ' . htmlspecialchars($row->nome_paciente) . '</p>';
    $html .= '<p><strong>Data de Emissão:</strong> ' . htmlspecialchars($row->data_emissao) . '</p>';
    $html .= '<p><strong>Motivo:</strong> ' . htmlspecialchars($row->motivo) . '</p>';
    $html .= '<p><strong>Afastamento:</strong> ' . htmlspecialchars($row->afastado) . '</p>';
    $html .= '<p><strong>Data de Início:</strong> ' . htmlspecialchars($row->data_inicio) . '</p>';
    $html .= '<p><strong>Data de Fim:</strong> ' . htmlspecialchars($row->data_fim) . '</p>';

    // Carregar HTML no DomPDF
    $dompdf->loadHtml($html);

    // Configurar o papel e a orientação
    $dompdf->setPaper('A4', 'portrait');

    // Renderizar o PDF
    $dompdf->render();

    // Limpar buffers antes de enviar o PDF
    if (ob_get_length()) {
        ob_end_clean(); // Evita erros ao enviar o PDF
    }

    // Enviar o PDF ao navegador
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="atestado_' . $id_atestado . '.pdf"');
    echo $dompdf->output(); // Envia o conteúdo do PDF
    exit;
} else {
    die("Erro: ID do atestado não informado.");
}
?>
