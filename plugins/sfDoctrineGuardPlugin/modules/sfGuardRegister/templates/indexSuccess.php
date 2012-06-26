<?php use_helper('I18N') ?>
<h2><?php echo __('Register', null, 'sf_guard') ?></h2>
<span class="reg_info">Пожалуйста, заполните все поля</span><br /><br />


<?php echo get_partial('sfGuardRegister/form', array('form' => $form)) ?>