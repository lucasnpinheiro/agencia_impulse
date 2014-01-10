<div class="col-xs-12 conteudo_bloco">
    <?php
    if (count($conteudos) > 0) {
        $_categorias = array();
        foreach ($conteudos as $key => $value) {
            echo'<div class="col-xs-12">';
            echo '<h1 class="conteudo_h1">' . $value['ConteudosArtigo']['titulo'] . '</h1>';
            echo '<p class="lead conteudo_texto">' . $value['ConteudosArtigo']['conteudo'] . '</p>';
            $__categorias = array();
            foreach ($value['ConteudosHasCategoria'] as $k => $v) {
                $_categorias[$v['ConteudosCategoria']['id']] = $v['ConteudosCategoria']['categoria'];
                $__categorias[$v['ConteudosCategoria']['id']] = $v['ConteudosCategoria']['categoria'];
            }
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
                    </div><!-- /.section -->

                    <?php
                }
            }
            echo '</div>';
        }
    }

    foreach ($metas as $key => $value) {
        $this->Html->meta($key, $value, array('block' => 'meta_tag'));
    }
    ?>
</div>