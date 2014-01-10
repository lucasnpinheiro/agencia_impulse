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
        echo '<div class="clearfix"></div>';
        echo '<div style="padding-bottom: 15px; font-size: 0.8em; color: #9A9A9A;">Total de comentários: ' . $this->element('Depoimentos.total_referencia', array('url' => $this->ConteudosHtml->link($value['Conteudo']['id'], '', array('not-link' => true, 'not-link-fullBase' => FALSE)))) . '</div>';
        echo '<div class="clearfix"></div>';
        echo '<div class="col-xs-12 text-right" style="padding: 0px;">';
        $link_social_imagem = $this->ConteudosHtml->get_imagens($value['ConteudosArtigo']['conteudo']);
            $link_social = $this->ConteudosHtml->link($value['Conteudo']['id'], '', array('not-link' => true, 'pagina' => $pagina['ConteudosPagina']['id'])) . '" addthis:title="' . $this->Link->url_title($value['ConteudosArtigo']['titulo']);
            echo '<!-- AddThis Button BEGIN -->
                    <meta property="og:title" content="' . $value['ConteudosArtigo']['titulo'] . '" />
                    <meta property="og:type" content="blog" />
                    <meta property="og:image" content="' . $link_social_imagem . '" />
                    <meta property="og:url" content="' . $link_social . '" />
                    <meta property="og:site_name" content="' . Configure::read('Config.Titulo') . '" />
                    <div class="addthis_toolbox addthis_default_style">
                        <a class="addthis_button_facebook_share" fb:share:layout="horizontal" fb:like:send="true" addthis:url="' . $link_social . '"></a>
                        <a class="addthis_button_tweet" addthis:url="' . $link_social . '"></a>
                        <a class="addthis_button_google_plusone" g:plusone:size="medium" addthis:url="' . $link_social . '"></a>
                        <a class="addthis_button_linkedin_counter" addthis:url="' . $link_social . '"></a>
                    </div>
                    <!-- AddThis Button END -->';
        echo '</div>';
        echo '<div class="clearfix"></div>';
        echo '<div class="col-xs-12 text-right" style="padding: 0; margin-top: 15px;">' . $this->ConteudosHtml->link($value['Conteudo']['id'], 'Veja mais...', array('class' => 'btn btn-link conteudo_link', 'pagina' => $pagina['ConteudosPagina']['id'])) . '</div>';
        echo '<div class="clearfix"></div>';
        echo '</div>';
        foreach ($conteudos as $key => $value) {
            ?>
            <?php if (count($value['ConteudosMidia']) > 0) { ?>
                <div class="row">
                    <?php
                    foreach ($value['ConteudosMidia'] as $k => $v) {
                        echo '<div class="col-xs-12" style="padding: 20px 15px;">' . $this->MidiaView->get($v["midia_id"]['Midia']['id'], array('class' => 'col-xs-12 img-responsive', 'link' => $v['link'])) . '</div>';
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
<?php if (Configure::read('Social.LinkFacebook') != '') { ?>
    <iframe src="//www.facebook.com/plugins/likebox.php?href=<?php echo urlencode(Configure::read('Social.LinkFacebook')); ?>&amp;width=500&amp;height=220&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=328384887257485" scrolling="no" frameborder="0" style="margin-top: 25px; border: none; overflow: hidden; height: 235px; width: 100%;" allowTransparency="true"></iframe>
<?php } ?>
<div>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js"></script>
