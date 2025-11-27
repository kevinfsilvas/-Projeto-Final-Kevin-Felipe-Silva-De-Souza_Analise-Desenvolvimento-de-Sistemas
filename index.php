<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh+oOVwVF4tpIr+RxEQhxROYVqLTa1RIbnfCe59XIcW3gGNFMAyT5AykVcUp<\ctrl61>wM4d/381fQ4DXw" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-image: url('clinicas.jpg'); /* Imagem de fundo */
            background-size: cover; /* A imagem cobre toda a área */
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            color: #fff;
        }

        .login {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.6); /* Fundo escuro translúcido */
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra suave */
            border: none;
        }

        .card-body {
            padding: 2rem;
        }

        .titulo-login {
            color: #2196F3;
            text-align: center;
            margin-bottom: 1.5rem;
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

        .btn-primary {
            background-image: linear-gradient(to right, #2196F3, #0B80FF);
            color: #fff;
            border-radius: 20px;
            width: 100%;
            padding: 12px;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-primary:focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        /* Estilo das labels */
        label {
            font-weight: 600;
            color: #ddd;
        }

        /* Espacamento entre os inputs e o botão */
        .mb-3 {
            margin-bottom: 1.5rem !important;
        }

    </style>
</head>

<body>
    <div class="login">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="titulo-login"> Login Restrito</h3>
                            <form action="login.php" method="POST">
                                <div class="mb-3">
                                    <label for="usuario">Usuário</label>
                                    <input type="text" name="usuario" class="form-control" id="usuario" required>
                                </div>
                                <div class="mb-3">
                                    <label for="senha">Senha</label>
                                    <input type="password" name="senha" class="form-control" id="senha" required>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>
<table></table>
