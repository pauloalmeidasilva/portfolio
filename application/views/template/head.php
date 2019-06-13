<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <?php if (isset($stylesheets)) {
        foreach ($stylesheets as $stylesheet) {?>
            <link href="<?=CSS.$stylesheet?>" rel="stylesheet">
        <?php }
    } ?>

    <<style type="text/css">
        
        img[alt="www.000webhost.com"]{
            display: none;
        }
    </style>
</head>
<body>
    <header class="fixed-top shadow" style="height: 60px; background-color: #999;">
        <div class="row">
            <div class="col-sm-2 text-center pt-2" style="height: 60px;">
                <span class="align-middle" style="font-size: 20px;"><strong>Portfólio</strong></span>
            </div>
            <div class="col-sm-10" style="height: 60px;">
                <div class="container">
                    <div class="flex-row mt-2">
                        <ul class="nav top-menu justify-content-between">
                            <li class="mt-2">
                                <span class="text-white">Nome</span>
                            </li>
                            <li><a class="btn btn-primary" href="<?=base_url('login/encerrar')?>">Encerrar Sessão</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <aside>
                <div id="sidebar" class="col-sm-2">
                    <ul class="menu">
                        <li>
                            <a class="active" href="<?=base_url('dashboard')?>"><i class="fa fa-chart-bar"></i>&nbsp;<span>Dashboard</span></a>
                        </li>
                        <li>
                            <a href="<?=base_url('conhecimentos')?>"><i class="fas fa-code"></i>&nbsp;<span>Conhecimentos</span></a>
                        </li>
                        <li>
                            <a href="<?=base_url('formacao')?>"><i class="fas fa-graduation-cap"></i>&nbsp;<span>Formação</span></a>
                        </li>
                        <li>
                            <a href="<?=base_url('cursos')?>"><i class="fas fa-laptop-code"></i></i>&nbsp;<span>Cursos</span></a>
                        </li>
                        <li>
                            <a href="<?=base_url('experiencia')?>"><i class="fas fa-user-tie"></i>&nbsp;<span>Experiência</span></a>
                        </li>
                        <li>
                            <a href="<?=base_url('portfolio')?>"><i class="fas fa-book-open"></i>&nbsp;<span>Portfólio</span></a>
                        </li>
                        <li>
                            <a href="<?=base_url('postagens')?>"><i class="fas fa-blog"></i>&nbsp;<span>Postagens</span></a>
                        </li>
                        <li>
                            <a href="<?=base_url('usuario')?>"><i class="fas fa-user"></i>&nbsp;<span>Usuário</span></a>
                        </li>
                    </ul>
                </div>
            </aside>
