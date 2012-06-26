<?php use_helper('I18N') ?>
<?php use_stylesheets_for_form($form); ?>

<form action="<?php echo url_for('@sf_guard_register') ?>" method="post">
  <table>
    <?php foreach ($form as $widget): ?>
      <tr>
          <td>
            <?php if(!$widget->isHidden()): ?>
                <?php echo $widget->renderLabel(); ?>
            <?php endif; ?>
          </td>
          <td <?php if($widget->getName() == 'group') echo 'colspan="2"'; ?>><?php echo $widget->render(); ?></td>
          <?php if($widget->getName() != 'group'): ?>
            <td class="label"><?php echo ($widget->hasError()) ? '<span class="error">'.$widget->renderError().'</span>' : $widget->renderHelp(); ?></td>
          <?php endif; ?>
      </tr>
    <?php endforeach; ?>
    <tfoot>
        <tr>
            <td class="reg_info" colspan="2">
                Нажимая на кнопку "Зарегистрироваться", вы принимаете условия пользовательского соглашения
            </td>
        </tr>
      <tr>
        <td colspan="2">
          <input type="submit" name="register" value="<?php echo __('Register', null, 'sf_guard') ?>" id="btn_submit" />
        </td>
      </tr>
    </tfoot>
  </table>
</form>