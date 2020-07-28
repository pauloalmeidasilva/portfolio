<body>
  <header class="fixed-top shadow">
    <div class="container-fluid">
      <div class="flex-row mt-2">
        <ul class="nav top-menu justify-content-between">
          <li class="mt-2">
            <span class="align-middle" style="font-size: 20px;"><strong>Site Portfólio</strong></span>
          </li>
          <li><a class="btn btn-primary mr-2" href="<?=base_url('home/sair')?>">Encerrar Sessão</a></li>
        </ul>
      </div>
    </div>
  </header>
  <aside id="lateral">
    <div id="menu">
      <ul class="menu">
        <li class="<?php if($menu == 'principal'){echo 'active';} ?>">
          <a class="active" href="<?=base_url('painel')?>"><i class="fa fa-chart-bar"></i>&nbsp;<span>Painel Principal</span></a>
        </li>
        <li class="<?php if($menu == 'conhecimento'){echo 'active';} ?>">
          <a href="<?=base_url('conhecimentos')?>"><i class="fas fa-code"></i>&nbsp;<span>Conhecimentos</span></a>
        </li>
        <li class="<?php if($menu == 'formacao'){echo 'active';} ?>">
          <a href="<?=base_url('formacao')?>"><i class="fas fa-graduation-cap"></i>&nbsp;<span>Formações Acadêmicas</span></a>
        </li>
        <li class="<?php if($menu == 'curso'){echo 'active';} ?>">
          <a href="<?=base_url('cursos')?>"><i class="fas fa-laptop-code"></i></i>&nbsp;<span>Cursos Extracurriculares</span></a>
        </li>
        <li class="<?php if($menu == 'experiencia'){echo 'active';} ?>">
          <a href="<?=base_url('experiencias')?>"><i class="fas fa-user-tie"></i>&nbsp;<span>Experiência Profissional</span></a>
        </li>
        <li class="<?php if($menu == 'portfolio'){echo 'active';} ?>">
          <a href="<?=base_url('portfolio')?>"><i class="fas fa-book-open"></i>&nbsp;<span>Portfólio</span></a>
        </li>
        <li class="<?php if($menu == 'postagem'){echo 'active';} ?>">
          <a href="<?=base_url('postagens')?>"><i class="fas fa-blog"></i>&nbsp;<span>Postagens</span></a>
        </li>
        <!-- <li class="<?php if($menu == 'configuracoes'){echo 'active';} ?>">
          <a href="<?=base_url('')?>"><i class="fas fa-cog"></i>&nbsp;<span>Configurações</span></a>
        </li> -->
        <li class="<?php if($menu == 'usuario'){echo 'active';} ?>">
          <a href="<?=base_url('usuario')?>"><i class="fas fa-user"></i>&nbsp;<span>Usuário</span></a>
        </li>
      </ul>
    </div>
  </aside>
