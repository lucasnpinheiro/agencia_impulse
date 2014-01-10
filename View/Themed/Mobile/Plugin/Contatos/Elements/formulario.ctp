<h3 class="myriadprobc" style="color: #3d96d8; font-size: 2.1em; margin-bottom: -2px; margin-left: 15px;">Contato</h3>
<div style="margin-left: 15px; font-size: 0.9em; margin-bottom: 20px;">Campos com (*) são de preenchimento obrigatório.</div>
<div class="col-xs-12">
    <?php
    echo $this->Form->create('Contatos.Contato', array('url' => '/contatos/contatos/enviar', 'type' => 'file'));

    echo $this->Form->input('redirect', array('type' => 'hidden', 'value' => ''));
    echo $this->Form->input('exibir', array('type' => 'hidden', 'value' => ''));
    echo $this->Form->input('status', array('type' => 'hidden', 'value' => 1));

    echo $this->Form->input('nome', array('label' => false, 'placeholder' => '* Nome', 'style' => 'font-family: arial; font-size: 12px;', 'required' => true));
    echo $this->Form->input('email', array('label' => false, 'placeholder' => '* E-mail', 'style' => 'font-family: arial; font-size: 12px;', 'required' => true));
    echo $this->Form->input('telefone', array('label' => false, 'placeholder' => '* Telefone', 'style' => 'font-family: arial; font-size: 12px;', 'required' => true));
    echo $this->Form->input('tipo', array('label' => false, 'placeholder' => '* Assunto', 'style' => 'font-family: arial; font-size: 12px;', 'required' => true));
    echo $this->Form->input('mensagem', array('label' => false, 'placeholder' => '* Descricao', 'style' => 'font-family: arial; font-size: 12px;', 'required' => true));
    echo $this->Form->input('receber_novidades', array('label' => 'Quero receber novidades', 'type' => 'checkbox', 'style' => 'float: none; margin: 0px 8px 0px -39px;', 'hiddenField' => false));
    echo $this->Form->input('file', array('label' => 'Anexar arquivo', 'type' => 'file'));
    $this->Captcha->render($captchaSettings);
    echo $this->Form->end(array('name' => 'Enviar', 'label' => 'Enviar'));
    ?>
</div>
<div class="col-xs-12">
    <div style="margin-top: 12px;">
        <iframe height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/?ie=UTF8&amp;ll=-21.199057,-47.772224&amp;spn=0.011903,0.021136&amp;t=m&amp;z=16&amp;output=embed" style="width: 100%;"></iframe>
    </div>
</div>