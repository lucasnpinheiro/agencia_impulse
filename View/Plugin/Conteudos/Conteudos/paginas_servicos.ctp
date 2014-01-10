<div class="col-xs-12 conteudo_bloco">
    <?php
    if (count($conteudos) > 0) {
        $_i = 0;
        echo '<div class="row conteudo_caixa">';
        foreach ($conteudos as $key => $value) {
            echo '<div class="col-xs-6">';
            echo '<h1 class="conteudo_h1">' . $value['ConteudosArtigo']['titulo'] . '</h1>';
            /*echo '<p class="lead conteudo_texto">' . $this->Text->truncate(strip_tags($value['ConteudosArtigo']['conteudo']), 450, array(
                'ellipsis' => '...',
                'exact' => TRUE,
                'html' => FALSE
                    )
            ) . '</p>';*/
            echo '<p class="lead conteudo_texto">' . $this->ConteudosHtml->truncate($value['ConteudosArtigo']['conteudo'], 350) . '</p>';
            echo '<div class="col-xs-8 text-right"></div>';
            echo '<div class="col-xs-4 text-right">' . $this->ConteudosHtml->link($value['Conteudo']['id'], 'Veja mais...', array('class' => 'btn btn-link conteudo_link')) . '</div>';
            echo '</div>';
            $_i++;
            if ($_i % 2 == 0) {
                echo '</div>';
                echo '<div class="row conteudo_caixa">';
            }
        }
        echo '</div>';
    }

    foreach ($metas as $key => $value) {
        $this->Html->meta($key, $value, array('block' => 'meta_tag'));
    }
    ?>
</div>