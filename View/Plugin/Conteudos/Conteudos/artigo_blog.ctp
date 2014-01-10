<div class="col-xs-8 conteudo_bloco">
    <?php
    if (count($conteudos) > 0) {
        $_categorias = array();
        foreach ($conteudos as $key => $value) {
            echo'<div class="col-xs-12">';
            echo '<span class="conteudo_data">' . $this->Formatacao->dataCompleta($value['ConteudosArtigo']['created'], array('hora' => false)) . '</span>';
            echo '<h1 class="conteudo_h1">' . $value['ConteudosArtigo']['titulo'] . '</h1>';
            echo '<p class="lead conteudo_texto">' . $value['ConteudosArtigo']['conteudo'] . '</p>';
            $__categorias = array();
            foreach ($value['ConteudosHasCategoria'] as $k => $v) {
                $_categorias[$v['ConteudosCategoria']['id']] = $v['ConteudosCategoria']['categoria'];
                $__categorias[$v['ConteudosCategoria']['id']] = $v['ConteudosCategoria']['categoria'];
            }
            if (count($__categorias) > 0) {
                echo '<p>Categorias: ';
                $__i = 0;
                foreach ($__categorias as $keyc => $valuec) {
                    if ($__i > 0) {
                        echo ', ';
                    }
                    echo $this->Html->link($valuec, '/categoria/' . $keyc . '/' . $pagina['ConteudosPagina']['id'] . '/' . $this->Link->url_title($valuec), array('class' => 'btn btn-link'));
                    $__i++;
                }
                echo '</p>';
            }
            $link_social_imagem = $this->ConteudosHtml->get_imagens($value['ConteudosArtigo']['conteudo']);
            $link_social = $this->ConteudosHtml->link($value['Conteudo']['id'], '', array('not-link' => true, 'pagina' => $pagina['ConteudosPagina']['id']));
            $this->Html->meta(array('property' => 'og:title', 'content' => $value['ConteudosArtigo']['titulo']), NULL, array('block' => 'meta_tag'));
            $this->Html->meta(array('property' => 'og:description', 'content' => strip_tags($value['ConteudosArtigo']['conteudo'])), NULL, array('block' => 'meta_tag'));
            $this->Html->meta(array('property' => 'og:type', 'content' => 'Artigo'), NULL, array('block' => 'meta_tag'));
            foreach ($link_social_imagem as $k_i => $v_i) {
                $this->Html->meta(array('property' => 'og:image', 'content' => $v_i), NULL, array('block' => 'meta_tag'));
            }
            $this->Html->meta(array('property' => 'og:url', 'content' => $link_social), NULL, array('block' => 'meta_tag'));
            $this->Html->meta(array('property' => 'og:site_name', 'content' => Configure::read('Config.Titulo')), NULL, array('block' => 'meta_tag'));
            $link_social .= '" addthis:title="' . $this->Link->url_title($value['ConteudosArtigo']['titulo']);
            echo '<!-- AddThis Button BEGIN -->
                    <div class="addthis_toolbox addthis_default_style">
                        <a class="addthis_button_facebook_share" fb:share:layout="horizontal" fb:like:send="true" addthis:url="' . $link_social . '"></a>
                        <a class="addthis_button_tweet" addthis:url="' . $link_social . '"></a>
                        <a class="addthis_button_google_plusone" g:plusone:size="medium" addthis:url="' . $link_social . '"></a>
                        <a class="addthis_button_linkedin_counter" addthis:url="' . $link_social . '"></a>
                    </div>
                    <!-- AddThis Button END -->';
            echo '</div>';
            foreach ($conteudos as $key => $value) {
                ?>
                <?php if (count($value['ConteudosMidia']) > 0) { ?>
                    <div class="row">
                        <?php
                        foreach ($value['ConteudosMidia'] as $k => $v) {
                            echo '<div class="col-xs-4" style="padding: 20px 15px;">' . $this->MidiaView->get($v["midia_id"]['Midia']['id'], array('class' => 'col-xs-12 img-responsive', 'link' => $v['link'])) . '</div>';
                        }
                        ?>
                    </div><!-- /.row -->
                    <?php
                }
            }
            echo '<div class="col-xs-12">' . $this->element('Depoimentos.modal_form', array('nome_botao' => 'Novo comentário')) . '</div>';
            echo '<div class="col-xs-12">' . $this->element('Depoimentos.lista') . '</div>';
            echo '</div>';
        }
    }

    foreach ($metas as $key => $value) {
        $this->Html->meta($key, $value, array('block' => 'meta_tag'));
    }
    ?>
</div>
<div class="col-xs-4 conteudo_sidebar">
    <h1 class="myriadprobc">Busca</h1>
    <?php
    echo $this->Form->create('Conteudos.Buscar', array('url' => '/conteudos/conteudos/buscar', 'div' => false));
    echo $this->Form->input('id', array('type' => 'hidden', 'value' => $pagina['ConteudosPagina']['id']));
    echo $this->Form->input('buscar', array('type' => 'search'));
    echo $this->Form->end(array('label' => 'Buscar'));
    ?>
    <h1 class="myriadprobc">Categorias</h1>
    <?php
    if (count($_categorias) > 0) {
        foreach ($_categorias as $key => $value) {
            echo '<p class="lead">' . $this->Html->link($value, '/categoria/' . $key . '/' . $pagina['ConteudosPagina']['id'] . '/' . $this->Link->url_title($value), array('class' => 'btn btn-link')) . '</p>';
        }
    }
    ?>
    <h1 class="myriadprobc">Assine nossos Posts</h1>
    <?php
    echo $this->Form->create('Boletins.Boletim', array('url' => '/boletins/boletins/enviar', 'class' => 'form-inline'));
    echo $this->Form->input('Boletim.nome', array('label' => false, 'placeholder' => 'Nome', 'style' => 'font-family: arial; font-size: 12px;'));
    echo $this->Form->input('Boletim.email', array('label' => false, 'placeholder' => 'E-mail', 'style' => 'font-family: arial; font-size: 12px;'));
    echo $this->Form->end('enviar', array('label' => 'Enviar'));
    ?>
    <div style="margin-top: 15px;">
        <?php if (Configure::read('Social.LinkFacebook') != '') { ?>
            <iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo urlencode(Configure::read('Social.LinkFacebook')); ?>&amp;width&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=328384887257485" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:290px;" allowTransparency="true"></iframe>
        <?php } ?>
    </div>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js"></script>
