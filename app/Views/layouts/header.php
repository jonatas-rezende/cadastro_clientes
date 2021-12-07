<?php if(!$_SESSION){ session_start(); } ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Cadastro Clientes</title>
</head>

<body>
    <header>
        <nav class="navbar fixed-top navbar-expand-lg bg-primary navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Cadastro Clientes</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-mobile">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <?php if(!empty($_SESSION['login'])): ?>
                <div class="collapse navbar-collapse" id="nav-mobile">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sair</a>
                        </li>
                    </ul>
                </div>
                <?php endif ?>
            </div>
        </nav>
    </header>