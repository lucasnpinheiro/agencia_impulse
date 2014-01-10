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
        <div class="layout_tudo row">
            <div class="layout_logo col-xs-12">
                <?php echo $this->Html->image('/img/' . Configure::read('Config.LogoSite'), array('url' => '/', 'alt' => Configure::read('Config.Titulo'), 'style' => 'max-height: 90%; height: 90%;')); ?>
            </div>
            <nav class="navbar navbar-default myriadprobc" role="navigation" style="margin-top: -70px;">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="z-index: 99999; background: #e6e6e6; margin-top:20px;">
                    <ul class="nav navbar-nav">
                        <li><?php echo $this->Html->link('Home', '/', array('class' => 'links_impulse_home')); ?></li>
                        <li><?php echo $this->Html->link('Agência', '/agencia', array('class' => 'links_impulse_agencia')); ?></li>
                        <li><?php echo $this->Html->link('Serviços', '/servicos', array('class' => 'links_impulse_servicos')); ?></li>
                        <li><?php echo $this->Html->link('Blog', '/blog', array('class' => 'links_impulse_blog')); ?></li>
                        <li><?php echo $this->Html->link('Contato', '/contato', array('class' => 'links_impulse_contato')); ?></li>
                    </ul>
                    <?php
                    if (stripos($this->request->url, 'contato') === FALSE) {
                        echo $this->Form->create('Conteudos.Buscar', array('url' => '/conteudos/conteudos/buscar', 'div' => false));
                        echo $this->Form->input('id', array('type' => 'hidden', 'value' => $pagina['ConteudosPagina']['id'], 'div' => false));
                        echo $this->Form->input('buscar', array('type' => 'search', 'placeholder' => 'Busca', 'div' => false));
                        echo $this->Form->end(array('label' => 'Buscar', 'div' => false));
                    }
                    ?>
                    <br />
                </div><!-- /.navbar-collapse -->
            </nav>
            <?php
            if ($this->request->url == false) {
                ?>
                <div class="layout_banner col-xs-12">
                    <div id="myCarousel" class="carousel slide" style="border-bottom: 1px dotted #fff;">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active" style="margin:auto; text-align: center;">
                                <?php echo $this->Html->image('/files/banners/banner_1.png', array('fullBase' => true, 'style' => 'height:95%; text-align: center; margin: 0 auto;')); ?>
                            </div>
                            <div class="item" style="margin:auto; text-align: center;">
                                <?php echo $this->Html->image('/files/banners/banner_2.png', array('fullBase' => true, 'style' => 'height:95%; text-align: center; margin: 0 auto;')); ?>
                            </div>
                            <div class="item" style="margin:auto; text-align: center;">
                                <?php echo $this->Html->image('/files/banners/banner_3.png', array('fullBase' => true, 'style' => 'height:95%; text-align: center; margin: 0 auto;')); ?>
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
                </div>

                <?php
            }
            ?>
            <div class="layout_conteudo">
                <div class="col-xs-12 conteudo_bloco">
                    <?php echo $this->fetch('content'); ?>
                </div>
            </div>
            <div class="layout_rodape col-xs-12 myriadprobc">
                <div class="col-xs-12" style="margin-top: 15px;">
                    Rua Otto Benz, 795 sala 24 - Nova Riberânia<br />
                    Ribeirão Preto - SP - CEP 14096-580 - Fone (16) 3877-1069 <br />
                </div>
                <div class="col-xs-12">
                    <h3 class="myriadprobc" style="color: #3d96d8; font-size: 1.6em;">Cadastre-se e Receba Novidades</h3>
                    <?php
                    echo $this->Form->create('Boletins.Boletim', array('url' => '/boletins/boletins/enviar', 'class' => 'form-inline'));
                    echo $this->Form->input('Boletim.nome', array('label' => false, 'placeholder' => 'Nome', 'style' => 'font-family: arial; font-size: 12px;'));
                    echo $this->Form->input('Boletim.email', array('label' => false, 'placeholder' => 'E-mail', 'style' => 'font-family: arial; font-size: 12px;'));
                    echo $this->Form->end('enviar', array('label' => 'Enviar'));
                    ?>
                </div>
                <div class="col-xs-12" style="font-size: 0.9em; margin-top: 15px;">
                    <?php echo Configure::read('Config.Titulo'); ?> - 2013 - TODOS OS DIREITOS RESERVADOS.
                </div>
                <div class="clearfix" style="margin-top: 15px;"></div>
                <div class="col-xs-6">
                    <?php
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