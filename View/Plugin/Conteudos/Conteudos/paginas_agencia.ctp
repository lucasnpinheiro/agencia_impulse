<div class="col-xs-12 conteudo_bloco">
    <?php
    if (count($conteudos) > 0) {
        echo '<div class="row">';
        foreach ($conteudos as $key => $value) {
            echo '<div class="col-xs-12 conteudo_caixa" style="border:none;">';
            echo '<h1 class="conteudo_h1">' . $value['ConteudosArtigo']['titulo'] . '</h1>';
            echo '<p class="lead conteudo_texto">' . $value['ConteudosArtigo']['conteudo'] . '</p>';
            //echo '<p class="text-right">' . $this->ConteudosHtml->link($value['Conteudo']['id'], 'Veja mais...', array('class' => 'btn btn-link  conteudo_link')) . '</p>';
            echo '</div>';
        }
        echo '</div>';

        foreach ($conteudos as $key => $value) {
            ?>
            <div class="row">
                <?php
                if (count($value['ConteudosMidia']) > 0) {
                    foreach ($value['ConteudosMidia'] as $k => $v) {
                        echo '<div class="col-xs-4" style="padding: 20px 15px;">' . $this->MidiaView->get($v["midia_id"]['Midia']['id'], array('class' => 'col-xs-12 img-responsive', 'link' => $v['link'])) . '</div>';
                    }
                }
                ?>
            </div><!-- /.row -->
            <?php
        }
    }

    foreach ($metas as $key => $value) {
        $this->Html->meta($key, $value, array('block' => 'meta_tag'));
    }
    ?>
</div>