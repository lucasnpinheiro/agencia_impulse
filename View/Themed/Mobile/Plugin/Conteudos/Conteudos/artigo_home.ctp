<?php
if (count($conteudos) > 0) {
    foreach ($conteudos as $key => $value) {
        echo '<h1>' . $value['ConteudosArtigo']['titulo'] . '</h1>';
        echo '<p class="lead">' . $value['ConteudosArtigo']['conteudo'] . '</p>';
    }

    foreach ($conteudos as $key => $value) {
        ?>
        <div class="row">
            <?php
            if (count($value['ConteudosMidia']) > 0) {
                foreach ($value['ConteudosMidia'] as $k => $v) {
                    echo '<div class="col-xs-12" style="padding: 20px 15px;">' . $this->MidiaView->get($v["midia_id"]['Midia']['id'], array('class' => 'col-xs-12 img-responsive', 'link' => $v['link'])) . '</div>';
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