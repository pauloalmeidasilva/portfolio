<body>
    <header class="fixed-top shadow" style="height: 60px; background-color: #999;">
        <div class="row">
            <div class="col-sm-3 col-xl-2 text-center pt-2" style="height: 60px;">
                <span class="align-middle" style="font-size: 20px;"><strong>Site Portfólio</strong></span>
            </div>
            <div class="col-sm-9 col-xl-10" style="height: 60px;">
                <div class="container-fluid">
                    <div class="flex-row mt-2">
                        <ul class="nav top-menu justify-content-between">
                            <li class="mt-2">
                                <span class="text-white"><?=$this->session->userdata('Dados')['nome']?></span>
                            </li>
                            <li><a class="btn btn-primary mr-2" href="<?=base_url('login/encerrar')?>">Encerrar Sessão</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container-fluid">
        <div class="row">
            <aside>
                <div id="sidebar" class="col-sm-3 col-xl-2">
                    <ul class="menu">
                        <li>
                            <a class="active" href="<?=base_url('painel')?>"><i class="fa fa-chart-bar"></i>&nbsp;<span>Painel Principal</span></a>
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
