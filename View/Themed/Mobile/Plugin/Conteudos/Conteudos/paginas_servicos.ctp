<?php

if (count($conteudos) > 0) {
    foreach ($conteudos as $key => $value) {
        echo '<div class="col-xs-12 conteudo_caixa">';
        echo '<h1 class="conteudo_h1">' . $value['ConteudosArtigo']['titulo'] . '</h1>';
        echo '<p class="conteudo_texto">' . $this->ConteudosHtml->truncate($value['ConteudosArtigo']['conteudo'], 1000) . '</p>';
        echo '<div class="clearfix"></div>';
        echo '<div>' . $this->ConteudosHtml->link($value['Conteudo']['id'], 'Veja mais...', array('class' => 'btn btn-link conteudo_link')) . '</div>';
        echo '</div>';
    }
}

foreach ($metas as $key => $value) {
    $this->Html->meta($key, $value, array('block' => 'meta_tag'));
}
?>