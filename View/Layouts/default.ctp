<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title><?php echo Configure::read('Config.Titulo'); ?></title>

        <!-- Bootstrap core CSS -->
        <?php
        echo $this->fetch('meta_tag');
        echo $this->Html->meta('/css/bootstrap.min.css');
        echo $this->Html->css('/css/bootstrap.min.css');
        echo $this->Html->css('/css/bootstrap-theme.min.css');
        echo $this->Html->css('/css/modern-business.css');
        echo $this->Html->css('/font-awesome/css/font-awesome.min.css');
        echo $this->fetch('css');
        $_idiomas = $this->requestAction('conteudos/conteudos_idiomas/get');
        ?>
    </head>

    <body>

        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <?php echo $this->Session->flash(); ?>
            <div class="container" style="max-width: 980px; margin: 0 auto; position: relative;">

                <div class="navbar-header" style="height: 116px;">
                    <?php echo $this->Html->image('/img/' . Configure::read('Config.LogoSite'), array('url' => '/', 'alt' => Configure::read('Config.Titulo'), 'style' => 'max-height: 100px; padding-top: 33px;')); ?>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav navbar-right topo-navbar">
                        <li><?php echo $this->Html->link('Home', '/', array('class' => 'links_impulse_home')); ?></li>
                        <li><?php echo $this->Html->link('Agência', '/agencia', array('class' => 'links_impulse_agencia')); ?></li>
                        <li><?php echo $this->Html->link('Serviços', '/servicos', array('class' => 'links_impulse_servicos')); ?></li>
                        <li><?php echo $this->Html->link('Blog', '/blog', array('class' => 'links_impulse_blog')); ?></li>
                        <li><?php echo $this->Html->link('Contato', '/contato', array('class' => 'links_impulse_contato')); ?></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
                <div class="social">
                    <?php echo $this->Html->link('', Configure::read('Social.LinkFacebook'), array('class' => 'social_hover facebook', 'escape' => false, 'target' => '_blank', 'title' => 'Facebook')); ?>
                    <?php echo $this->Html->link('', Configure::read('Social.LinkTwitter'), array('class' => 'social_hover twitter', 'escape' => false, 'target' => '_blank', 'title' => 'Twitter')); ?>
                    <?php echo $this->Html->link('', Configure::read('Social.LinkLinkedin'), array('class' => 'social_hover flickr', 'escape' => false, 'target' => '_blank', 'title' => 'Linkedin')); ?>
                    <?php echo $this->Html->link('', Configure::read('Social.LinkGooglePlus'), array('rel' => "publisher", 'class' => 'social_hover digg', 'escape' => false, 'target' => '_blank', 'title' => 'Google Plus')); ?>
                    <?php echo $this->Html->link('', '/rss.xml', array('class' => 'social_hover rss', 'escape' => false, 'target' => '_blank', 'title' => 'RSS')); ?>
                </div>
            </div><!-- /.container -->

        </nav>
        <?php
        if ($this->request->url == false) {
            ?>
            <div id="myCarousel" class="carousel slide" style="border-bottom: 1px dotted #fff;">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1"></li>
                    <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active" style="margin:auto; text-align: center; background: url('<?php echo $this->Html->url('/files/banners/banner_1.png', true); ?>') no-repeat center center #EFEFEF;">

                    </div>
                    <div class="item" style="margin:auto; text-align: center; background: url('<?php echo $this->Html->url('/files/banners/banner_2.png', true); ?>') no-repeat center center #EFEFEF;">

                    </div>
                    <div class="item" style="margin:auto; text-align: center; background: url('<?php echo $this->Html->url('/files/banners/banner_3.png', true); ?>') no-repeat center center #EFEFEF;">

                    </div>

                </div>


                <!-- Controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="icon-prev"></span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="icon-next"></span>
                </a>
            </div>

            <?php
        }
        ?>
        <div class="container" style="max-width: 1000px; margin: 0 auto; padding: 0px;">
            <div class="col-xs-12">
                <?php echo $this->fetch('content'); ?>
            </div>
        </div><!-- /.section -->

        <div class="container footer myriadprobc" style="font-size: 1.2em; line-height: 20px; color: #8f8f8f; margin-top: 20px; min-height: 230px; width: 100%;">
            <footer>
                <div class="row">
                    <div class="col-xs-12" style="max-width: 1000px; margin: 0 auto;">
                        <div class="col-xs-4">
                            <div style="float: left; margin-top: 58px;">
                                <?php echo $this->Html->image('/img/icone_endereco.png', array('style' => 'margin-top: -100px;', 'url' => '/contato')); ?>
                            </div>
                            <div style="float: left; font-size: 0.9em;">
                                Rua Otto Benz, 795 sala 24<br />
                                Nova Riberânia, Ribeirão Preto - SP<br />
                                CEP 14096-580 <br />
                                Fone (16) 3877-1069<br />
                            </div>
                        </div>

                        <div class="col-xs-2" style="text-align: center; margin: auto;">
                            <?php echo $this->Html->image('/img/abradiisqp.png', array('style' => 'width: 100%;', 'url' => 'http://acopadi.com.br/')); ?>
                        </div>

                        <div class="col-xs-6" style="text-align: right; margin-top: -30px;">
                            <h3 class="myriadprobc" style="color: #3d96d8; font-size: 1.6em; margin-bottom: -2px;padding-right: 50px;">Cadastre-se e Receba Novidades</h3>
                            <?php
                            echo $this->Form->create('Boletins.Boletim', array('url' => '/boletins/boletins/enviar', 'class' => 'form-inline'));
                            echo $this->Form->input('Boletim.nome', array('label' => false, 'placeholder' => 'Nome', 'style' => 'font-family: arial; font-size: 12px;'));
                            echo $this->Form->input('Boletim.email', array('label' => false, 'placeholder' => 'E-mail', 'style' => 'font-family: arial; font-size: 12px;'));
                            echo $this->Form->end('enviar', array('label' => 'Enviar'));
                            ?>
                        </div>

                        <div class="clearfix" style="padding-top: 100px;"></div>

                        <div class="col-xs-6">
                            <ul class="nav navbar-nav navbar-right rodape-navbar">
                                <li><?php echo $this->Html->link('HOME', '/', array('class' => ' myriadprobc')); ?></li>
                                <li><?php echo $this->Html->link('AGÊNCIA', '/agencia', array('class' => ' myriadprobc')); ?></li>
                                <li><?php echo $this->Html->link('SERVIÇOS', '/servicos', array('class' => ' myriadprobc')); ?></li>
                                <li><?php echo $this->Html->link('BLOG', '/blog', array('class' => ' myriadprobc')); ?></li>
                                <li><?php echo $this->Html->link('CONTATO', '/contato', array('class' => ' myriadprobc')); ?></li>
                            </ul>
                        </div>

                        <div class="col-xs-6" style="text-align: right; font-size: 0.9em;">
                            <?php echo Configure::read('Config.Titulo'); ?> - 2013 - TODOS OS DIREITOS RESERVADOS.
                        </div>
                        <div class="clearfix"></div>

                        <div class="col-xs-6"><?php
                            if (count($_idiomas['idiomas']) > 1) {
                                foreach ($_idiomas['idiomas'] as $key => $value) {
                                    if ($value['ConteudosIdioma']['id'] == 1) {
                                        $ico = 'br.png';
                                    } else if ($value['ConteudosIdioma']['id'] == 2) {
                                        $ico = 'gb.png';
                                    } else if ($value['ConteudosIdioma']['id'] == 3) {
                                        $ico = 'es.png';
                                    }
                                    echo $this->Html->image('/conteudos/img/bandeiras/' . $ico, array('style' => 'padding: 3px; border: none;', 'alt' => $value['ConteudosIdioma']['idioma'], 'title' => $value['ConteudosIdioma']['idioma'], 'url' => '/conteudos/conteudos_idiomas/alterar/' . $value['ConteudosIdioma']['id']));
                                }
                            }
                            ?>
                        </div>
                        <div class="col-xs-6" style="text-align: right; font-size: 0.7em;">
                            <?php echo $this->Html->link(Configure::read('Config.NomeDesenvolvedor'), Configure::read('Config.UrlDesenvolvedor'), array('title' => Configure::read('Config.NomeDesenvolvedor'), 'class' => ' myriadprobc', 'style' => 'color:#8f8f8f;', 'target' => '_blank')); ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </footer>
        </div><!-- /.container -->
        <!-- Bootstrap core JavaScript -->
        <!-- Placed at the end of the document so the pages load faster -->
        <?php
        echo $this->Html->script('/js/jquery-1.10.2.min.js');
        echo $this->Html->script('/js/bootstrap.min.js');
        echo $this->Html->script('/js/modern-business.js');
        echo $this->Html->script('/js/jquery.hcaptions.js');
        echo $this->Html->script('/js/scripts.js');
        echo $this->fetch('script');
        echo $this->element('sql_dump');

        echo Configure::read('Social.GoogleAnalytics');
        ?>

    </body>
</html>
