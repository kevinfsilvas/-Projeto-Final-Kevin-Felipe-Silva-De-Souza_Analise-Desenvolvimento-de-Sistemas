<?php
session_start();
if (empty($_SESSION)) {
    echo "<script>location.href-='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Controle Clínico</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white">Sistema Privado</a>
            <a href="logout.php" class="btn btn-danger sair-btn">Sair</a>
            <?php
            echo "Olá, Seja bem-vindo ao nosso Sistema " . $_SESSION['usuario'];
         


            ?>
        </div>
    </nav>

    <style>
        /* Estilos globais */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            /* A altura total da tela */
            background-image: url('clinicas.jpg');
            background-size: cover;
            /* A imagem cobre toda a área */
            background-position: center;
            background-repeat: no-repeat;

        }

        .navbar-brand {
            color: white;
        }

        .sair-btn {
            position: fixed;
            bottom: 20px;
            /* Distância da parte inferior */
            right: 20px;
            /* Distância da parte direita */
            z-index: 1000;
            /* Garante que o botão fique por cima de outros elementos */
        }


        .navbar-nav .nav-link {
            color: white !important;
            /* Cor padrão dos links */
            font-weight: 500;
            /* Opcional: para dar um peso na fonte */
            transition: background-color 0.3s ease, color 0.3s ease;
            /* Suaviza a transição da cor de fundo e do texto */
        }

        .navbar-nav .nav-link:hover {
            background-color: #007bff;
            /* Cor de fundo ao passar o mouse */
            color: white !important;
            /* Garante que o texto continue branco */
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c82333;
        }

        .form-control {
            border-radius: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            box-shadow: none;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-outline-info {
            border-radius: 20px;
            border-color: #007bff;
            color: #007bff;
            font-weight: 600;
        }

        .btn-outline-info:hover {
            background-color: #007bff;
            color: white;
        }

        /* Container principal ajustado */
        .container {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        /* Estilo de links dentro do dropdown */
        .dropdown-item:hover {
            background-color: #f1f1f1;
        }

        /* Tabelas */
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>

    <nav class="navbar navbar-expand-lg bg-body-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="dashboard.php">SCC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Médico
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-medico">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-medico">Listar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Paciente
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-paciente">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-paciente">Listar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Consulta
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-consulta">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-consulta">Listar</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Atestado
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="?page=cadastrar-atestado">Cadastrar</a></li>
                            <li><a class="dropdown-item" href="?page=listar-atestado">Listar</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-info" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <?php
                include('config.php');
                switch (@$_REQUEST['page']) {
                    case 'cadastrar-medico':
                        include('cadastrar-medico.php');
                        break;
                    case 'editar-medico':
                        include('editar-medico.php');
                        break;
                    case 'listar-medico':
                        include('listar-medico.php');
                        break;
                    case 'salvar-medico':
                        include('salvar-medico.php');
                        break;
                    case 'cadastrar-paciente':
                        include('cadastrar-paciente.php');
                        break;
                    case 'editar-paciente':
                        include('editar-paciente.php');
                        break;
                    case 'listar-paciente':
                        include('listar-paciente.php');
                        break;
                    case 'salvar-paciente':
                        include('salvar-paciente.php');
                        break;
                    case 'cadastrar-consulta':
                        include('cadastrar-consulta.php');
                        break;
                    case 'editar-consulta':
                        include('editar-consulta.php');
                        break;
                    case 'listar-consulta':
                        include('listar-consulta.php');
                        break;
                    case 'salvar-consulta':
                        include('salvar-consulta.php');
                        break;
                    case 'cadastrar-atestado':
                        include('cadastrar-atestado.php');
                        break;
                    case 'editar-atestado':
                        include('editar-atestado.php');
                        break;
                    case 'listar-atestado':
                        include('listar-atestado.php');
                        break;
                    case 'salvar-atestado':
                        include('salvar-atestado.php');
                        break;
                    default:
                        include('home.php');
                }
                ?>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>
