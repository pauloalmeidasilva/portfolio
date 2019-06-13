<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Portifólio de projetos.">
    <meta name="author" content="Paulo Ricardo Almeida da Silva">

    <title><?=$pessoa->nome?></title>

    <!-- STYLES -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="<?=CSS.'plugins.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?=CSS.'style.css'?>">
    <!-- /STYLES -->
</head>
<body>

    <div class="preloader">
        <div class="anim pulse"><i class="fas fa-bolt"></i></div>
    </div>
    <div class="preloader-left"></div>
    <div class="inline-menu-container">
        <span class="status"><?=$pessoa->notas_interesse?></span>
        <ul class="inline-menu">
            <li class="about menu-item">Currículo</li>
            <li class="portfolio menu-item">Portfolio</li>
            <li class="blog menu-item">Blog</li>
            <li class="contact menu-item">Contato</li>
            <li id="close" class="menu-item"><i class="fas fa-times fa-sm"></i></li>
        </ul>
    </div>
    <section class="home img-bg" style="background: url(<?=IMG.'01.jpg'?>) 0 0; background-size: cover;">
        <div class="overlay opacity5"></div>
        <div class="container">
            <div class="name-block">
                <div class="name-block-container">
                    <h2><span>Olá, Eu sou</span> <?=$pessoa->nome?></h2>
                    <h2><?=$pessoa->profissao?></h2>
                    <a target="_blank" href="" class="btn btn-download">Baixe meu currículo</a>
                    <ul class="social">
                        <li><a target="_blank" href="https://www.facebook.com/<?=$pessoa->facebook?>"><i class="fab fa-facebook"></i></a></li>
                        <li><a target="_blank" href="https://www.linkedin.com/in/<?=$pessoa->linkedin?>"><i class="fab fa-linkedin"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/<?=$pessoa->instagram?>"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="menu-blocks">
                <div class="about-block menu-block">
                    <div class="about-block-container">
                        <h2 class="about menu-item">Currículo</h2>
                    </div>
                </div>
                <div class="portfolio-block  menu-block">
                    <div class="portfolio-block-container">
                        <h2 class="portfolio menu-item">Portfolio</h2>
                    </div>
                </div>
                <div class="blog-block  menu-block">
                    <div class="blog-block-container">
                        <h2 class="blog menu-item">Blog</h2>
                    </div>
                </div>
                <div class="contact-block  menu-block">
                    <div class="contact-block-container">
                        <h2 class="contact menu-item">Contato</h2>
                    </div>
                </div>
            </div>
            <div class="content-blocks about">
                <section class="content" id="about">
                    <div class="block-content">
                        <h3 class="block-title">Perfil</h3>
                        <h3 class="subheading"><?=$pessoa->perfil?></h3>
                        <div class="info-list row">
                            <div class="col-sm-6"><span>Nome: </span> <?=$pessoa->nome?></div>
                            <div class="col-sm-6"><span>Data de Nascimento: </span> <?=$pessoa->nascimento?> </div>
                            <div class="col-sm-6"><span>E-mail: </span> <?=$pessoa->email?></div>
                            <div class="col-sm-6"><span>Telefone: </span> <?=$pessoa->telefone?></div>
                            <div class="col-sm-6"><span>Interesse: </span> <?=$pessoa->interesse?></div>
                        </div>
                        <img class="sign" src="images/signature.png" alt="" />
                    </div>
                    <div class="block-content">
                        <h3 class="block-title">Conhecimentos</h3>
                        <?php foreach ($conhecimentos as $conhecimento) { ?>
                            <label class="progress-bar-label"><?=$conhecimento->nome_linguagem?> - <span><?=$conhecimento->tempo_experiencia?> de experincia</span></label>
                            <div class="progress">
                                <div style="width: <?=$conhecimento->porcentagem_experiencia?>%;" class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                    <span><?=$conhecimento->porcentagem_experiencia?>%</span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="block-content">
                        <h3 class="block-title">Experiência Profissional</h3>
                        <div class="timeline experience">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="exp-holder">
                                        <div class="exp">
                                            <div class="hgroup">
                                                <h4><span>Programador</span> @ TechCampos</h4>
                                                <h5>Nov 2018 - <span class="current">Atual</span></h5>
                                            </div>
                                            <p>Desenvolvimento de softwares na área de hotelaria e gastronomia</p>
                                        </div>
                                        <div class="exp">
                                            <div class="hgroup">
                                                <h4><span>Oficial de Escola</span> @ Prefeitura de Campos do Jordão </h4>
                                                <h5>Mar 2009 - <span class="current">Atual</span></h5>
                                            </div>
                                            <p>Gestão Escolar: matrículas </p>
                                        </div>
                                        <div class="exp">
                                            <div class="hgroup">
                                                <h4><span>Intern</span> @ Google </h4>
                                                <h5>May 2017 - Sept 2017</h5>
                                            </div>
                                            <p>Ut enim ad minim veniam, quis nostrud exerc. Irure dolor in reprehend incididunt labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <h3 class="block-title">Formação Acadêmica</h3>
                        <div class="timeline">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="exp-holder">
                                        <?php foreach ($formacoes as $formacao) {?>
                                        <div class="exp">
                                            <div class="hgroup">
                                                <h4><?=$formacao->nome_curso?> | <span><?=$formacao->local?></span></h4>
                                                <h5><?=$formacao->ano_inicio?> - <?=$formacao->ano_fim?></h5>
                                            </div>
                                            <p><?=$formacao->descricao?></p>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <h3 class="block-title">Services</h3>
                        <div class="row">
                            <div class="col-md-4 col-sm-6 service">
                                <div class="service-icon">
                                    <i class="ion-laptop"></i>
                                </div>
                                <h4>Web Design</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                            </div>
                            <div class="col-md-4 col-sm-6 service">
                                <div class="service-icon">
                                    <i class="ion-pie-graph"></i>
                                </div>
                                <h4>App Development</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                            </div>
                            <div class="col-md-4 col-sm-6 service">
                                <div class="service-icon">
                                    <i class="ion-paintbucket"></i>
                                </div>
                                <h4>Graphic Design</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                            </div>
                            <div class="col-md-4 col-sm-6 service">
                                <div class="service-icon">
                                    <i class="ion-printer"></i>
                                </div>
                                <h4>Print Design</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                            </div>
                            <div class="col-md-4 col-sm-6 service">
                                <div class="service-icon">
                                    <i class="ion-qr-scanner"></i>
                                </div>
                                <h4>Graphic Design</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                            </div>
                            <div class="col-md-4 col-sm-6 service">
                                <div class="service-icon">
                                    <i class="ion-social-buffer"></i>
                                </div>
                                <h4>Print Design</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <h3 class="block-title">Awards</h3>
                        <div class="row">
                            <div class="col-md-3 col-sm-6 awards">
                                <img src="images/awards/1.jpg" alt="" />
                            </div>
                            <div class="col-md-3 col-sm-6 awards">
                                <img src="images/awards/2.jpg" alt="" />
                            </div>
                            <div class="col-md-3 col-sm-6 awards">
                                <img src="images/awards/3.jpg" alt="" />
                            </div>
                            <div class="col-md-3 col-sm-6 awards">
                                <img src="images/awards/4.jpg" alt="" />
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <h3 class="block-title">Testimonials</h3>
                        <div class="row">
                            <div id="liontestimonial" class="owl-carousel owl-theme">
                                <div class="item testimonials">
                                    <img src="images/testimonials/1.jpg" alt="">
                                    <blockquote>This template is exactly what we were looking for!
                                        <p class="quote"><span>Brendon Rodgers</span> - CEO of xyz.com</p>
                                    </blockquote>
                                </div>
                                <div class="item testimonials">
                                    <img src="images/testimonials/2.jpg" alt="">
                                    <blockquote>This template is very nice! Great work
                                        <p class="quote"><span>Becky Allwood</span> - CEO of abc.com</p>
                                    </blockquote>
                                </div>
                                <div class="item testimonials">
                                    <img src="images/testimonials/3.jpg" alt="">
                                    <blockquote>My work has been significantly simplified.
                                        <p class="quote"><span>Elly Page</span> - CEO of nfl.com</p>
                                    </blockquote>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12 btn-email">
                            <a class="btn lowercase">shout@james.com</a>
                        </div>
                    </div>
                </section>
            </div>
            <div class="content-blocks portfolio">
                <section class="content">
                    <div class="block-content">
                        <h3 class="block-title">Portfolio</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="filters">
                                    <span>Filters :</span>
                                    <ul id="filters">
                                        <li class="active" data-filter="*">All</li>
                                        <li data-filter=".artwork">Art Work</li>
                                        <li data-filter=".webdesign">Web Design</li>
                                        <li data-filter=".design">Design</li>
                                    </ul>
                                </div>
                                <div class="portfolio-container row isotope" id="portfolio-container">
                                    <!-- WORK 1 START -->
                                    <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item artwork">
                                        <a class="open-project" href="project-1.html">
                                            <div class="portfolio-column">
                                                <div class="portfolio-hover">
                                                    <div class="portfolio-content">
                                                        <h2>CEREAL</h2>
                                                        <hr>
                                                        <p>View details.</p>
                                                    </div>
                                                    <div class="portfolio-overlay"></div>
                                                </div>
                                                <img src="images/portfolio/masonry/001.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <!-- WORK 1 END -->
                                    <!-- WORK 2 START -->
                                    <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item webdesign">
                                        <a class="open-project" href="project-2.html">
                                            <div class="portfolio-column">
                                                <div class="portfolio-hover">
                                                    <div class="portfolio-content">
                                                        <h2>NOTES</h2>
                                                        <hr>
                                                        <p>View details.</p>
                                                    </div>
                                                    <div class="portfolio-overlay"></div>
                                                </div>
                                                <img src="images/portfolio/masonry/002.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <!-- WORK 2 END -->
                                    <!-- WORK 3 START -->
                                    <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item webdesign">
                                        <a class="open-project" href="project-3.html">
                                            <div class="portfolio-column">
                                                <div class="portfolio-hover">
                                                    <div class="portfolio-content">
                                                        <h2>TIMES</h2>
                                                        <hr>
                                                        <p>View details.</p>
                                                    </div>
                                                    <div class="portfolio-overlay"></div>
                                                </div>
                                                <img src="images/portfolio/masonry/003.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <!-- WORK 3 END -->
                                    <!-- WORK 4 START -->
                                    <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item artwork">
                                        <a class="open-project" href="project-4.html">
                                            <div class="portfolio-column">
                                                <div class="portfolio-hover">
                                                    <div class="portfolio-content">
                                                        <h2>STATIONARY</h2>
                                                        <hr>
                                                        <p>View details.</p>
                                                    </div>
                                                    <div class="portfolio-overlay"></div>
                                                </div>
                                                <img src="images/portfolio/masonry/004.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <!-- WORK 4 END -->
                                    <!-- WORK 5 START -->
                                    <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item design">
                                        <a class="open-project" href="project-5.html">
                                            <div class="portfolio-column">
                                                <div class="portfolio-hover">
                                                    <div class="portfolio-content">
                                                        <h2>PH.D</h2>
                                                        <hr>
                                                        <p>View details.</p>
                                                    </div>
                                                    <div class="portfolio-overlay"></div>
                                                </div>
                                                <img src="images/portfolio/masonry/005.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <!-- WORK 5 END -->
                                    <!-- WORK 6 START -->
                                    <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item design">
                                        <a class="open-project" href="project-6.html">
                                            <div class="portfolio-column">
                                                <div class="portfolio-hover">
                                                    <div class="portfolio-content">
                                                        <h2>WAG MAGAZINE</h2>
                                                        <hr>
                                                        <p>View details.</p>
                                                    </div>
                                                    <div class="portfolio-overlay"></div>
                                                </div>
                                                <img src="images/portfolio/masonry/006.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <!-- WORK 6 END -->
                                    <!-- WORK 7 START -->
                                    <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item webdesign">
                                        <a class="open-project" href="project-1.html">
                                            <div class="portfolio-column">
                                                <div class="portfolio-hover">
                                                    <div class="portfolio-content">
                                                        <h2>LOOK</h2>
                                                        <hr>
                                                        <p>View details.</p>
                                                    </div>
                                                    <div class="portfolio-overlay"></div>
                                                </div>
                                                <img src="images/portfolio/masonry/007.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <!-- WORK 7 END -->
                                    <!-- WORK 8 START -->
                                    <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item artwork">
                                        <a class="open-project" href="project-2.html">
                                            <div class="portfolio-column">
                                                <div class="portfolio-hover">
                                                    <div class="portfolio-content">
                                                        <h2>IPAD</h2>
                                                        <hr>
                                                        <p>View details.</p>
                                                    </div>
                                                    <div class="portfolio-overlay"></div>
                                                </div>
                                                <img src="images/portfolio/masonry/008.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <!-- WORK 8 END -->
                                    <!-- WORK 9 START -->
                                    <div class="col-md-4 col-sm-6 col-xs-12 portfolio-item design">
                                        <a class="open-project" href="project-1.html">
                                            <div class="portfolio-column">
                                                <div class="portfolio-hover">
                                                    <div class="portfolio-content">
                                                        <h2>PAPER MOCKUP</h2>
                                                        <hr>
                                                        <p>View details.</p>
                                                    </div>
                                                    <div class="portfolio-overlay"></div>
                                                </div>
                                                <img src="images/portfolio/masonry/009.jpg" alt="">
                                            </div>
                                        </a>
                                    </div>
                                    <!-- WORK 9 END -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md-12 btn-email">
                            <a class="btn lowercase">shout@james.com</a>
                        </div>
                    </div>
                </section>
            </div>
            <div class="content-blocks blog">
                <section class="content">
                    <div class="block-content">
                        <h3 class="block-title">My Blog</h3>
                        <div class="row">
                            <div class="col-md-10 mx-auto">
                                <div class="post">
                                    <div class="post-thumbnail">
                                        <a class="open-post" href="post-single.html">
                                            <img src="images/blog/midium/4.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-title">
                                        <a class="open-post" href="post-single.html"><h2>Typography for web</h2></a>
                                        <p class="post-info">
                                            <span class="post-author">Posted by John Sparrow</span>
                                            <span class="slash"></span>
                                            <span class="post-date">Dec 08, 2017</span>
                                            <span class="slash"></span>
                                            <span class="post-catetory">Food</span>
                                        </p>
                                    </div>
                                    <div class="post-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non enim ut enim fringilla adipiscing id in lorem. Quisque aliquet neque vitae lectus tempus consectetur. Aliquam erat volutpat. Nunc eu nibh nulla, id cursus arcu. </p>
                                        <a class="btn open-post" href="post-single.html">Read More</a>
                                    </div>
                                </div>
                                <div class="post">
                                    <div class="post-thumbnail">
                                        <a class="open-post" href="post-single.html">
                                            <img src="images/blog/midium/3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-title">
                                        <a class="open-post" href="post-single.html"><h2>Typography for web</h2></a>
                                        <p class="post-info">
                                            <span class="post-author">Posted by John Sparrow</span>
                                            <span class="slash"></span>
                                            <span class="post-date">Dec 08, 2017</span>
                                            <span class="slash"></span>
                                            <span class="post-catetory">Food</span>
                                        </p>
                                    </div>
                                    <div class="post-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non enim ut enim fringilla adipiscing id in lorem. Quisque aliquet neque vitae lectus tempus consectetur. Aliquam erat volutpat. Nunc eu nibh nulla, id cursus arcu. </p>
                                        <a class="btn open-post" href="post-single.html">Read More</a>
                                    </div>
                                </div>
                                <div class="post">
                                    <div class="post-thumbnail">
                                        <a class="open-post" href="post-single.html">
                                            <img src="images/blog/midium/2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-title">
                                        <a class="open-post" href="post-single.html"><h2>Typography for web</h2></a>
                                        <p class="post-info">
                                            <span class="post-author">Posted by John Sparrow</span>
                                            <span class="slash"></span>
                                            <span class="post-date">Dec 08, 2017</span>
                                            <span class="slash"></span>
                                            <span class="post-catetory">Food</span>
                                        </p>
                                    </div>
                                    <div class="post-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non enim ut enim fringilla adipiscing id in lorem. Quisque aliquet neque vitae lectus tempus consectetur. Aliquam erat volutpat. Nunc eu nibh nulla, id cursus arcu. </p>
                                        <a class="btn open-post" href="post-single.html">Read More</a>
                                    </div>
                                </div>
                                <div class="post">
                                    <div class="post-thumbnail">
                                        <a class="open-post" href="post-single.html">
                                            <img src="images/blog/midium/1.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-title">
                                        <a class="open-post" href="post-single.html"><h2>Typography for web</h2></a>
                                        <p class="post-info">
                                            <span class="post-author">Posted by John Sparrow</span>
                                            <span class="slash"></span>
                                            <span class="post-date">Dec 08, 2017</span>
                                            <span class="slash"></span>
                                            <span class="post-catetory">Food</span>
                                        </p>
                                    </div>
                                    <div class="post-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean non enim ut enim fringilla adipiscing id in lorem. Quisque aliquet neque vitae lectus tempus consectetur. Aliquam erat volutpat. Nunc eu nibh nulla, id cursus arcu. </p>
                                        <a class="btn open-post" href="post-single.html">Read More</a>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="content-blocks contact">
                <section class="content">
                    <div class="block-content">
                        <h3 class="block-title">Get in touch</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <form id="contactForm" data-toggle="validator" class="contact-form shake">
                                    <div class="form-group">
                                        <input id="name" type="text" class="form-control" name="Name" autocomplete="off" required data-error="Please enter your name" placeholder="* Your Name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control" name="email" autocomplete="off" required data-error="Please enter your email" placeholder="* Your Email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <textarea id="message" class="form-control textarea" rows="10" name="Message" required data-error="Please enter your message subject" placeholder="* Your Message"></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <button id="submit" type="submit" class="btn selected">Send Message</button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-md-5 offset-md-1">
                                <div class="contact-content">
                                    <div class="contact-icon">
                                        <i class="ion-ios-location-outline"></i>
                                    </div>
                                    <div class="contact-details">
                                        <h5>Address</h5>
                                        <p>234 House, Baker Street, London, EL10 6 BG</p>
                                    </div>
                                </div>
                                <div class="contact-content">
                                    <div class="contact-icon">
                                        <i class="ion-ios-telephone-outline"></i>
                                    </div>
                                    <div class="contact-details">
                                        <h5>Call Us</h5>
                                        <p> <a href="tel:+4402920111222">+44 - 02920111222</a></p>
                                    </div>
                                </div>
                                <div class="contact-content">
                                    <div class="contact-icon">
                                        <i class="ion-ios-email-outline"></i>
                                    </div>
                                    <div class="contact-details">
                                        <h5>Enquiries</h5>
                                        <p>alpha@james.com</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!--Google Map-->
                                <div id="map"></div>
                                <!--Google Map End-->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="content-blocks pop">
                <div id="close-pop" class="close-pop">Close <i class="ion-ios-close-empty"></i></div>
                <section class="content"></section>
            </div>
        </div>
    </section>
<!-- SCRIPTS -->
<script src="<?=JS.'plugins.min.js'?>"></script>
<script src="<?=JS.'main.js'?>"></script>
<!-- /SCRIPTS -->
</body>
</html>
