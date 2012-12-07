<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('portfolio/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table_form_new_project">
    <tfoot>
      <tr>
        <td colspan="3">
          <input type="submit" value="Сохранить" />
        </td>
      </tr>
    </tfoot>
    <tbody>
        <tr>
            <td class="td_title"><?php echo $form['name']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['name']->render(); ?></td>
            <td class="td_help"><?php echo ($form['name']->hasError()) ? $form['name']->renderError() : $form['name']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['description']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['description']->render(); ?></td>
            <td class="td_help"><?php echo ($form['description']->hasError()) ? $form['description']->renderError() : $form['description']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['category_id']->renderLabel(); ?></td>
            <td class="td_input" colspan="2"><?php echo $form['category_id']->render(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['image']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['image']->render(); ?></td>
            <td class="td_help"><?php echo ($form['image']->hasError()) ? $form['image']->renderError() : $form['image']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['link']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['link']->render(); ?></td>
            <td class="td_help"><?php echo ($form['link']->hasError()) ? $form['link']->renderError() : $form['link']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['cost']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['cost']->render(); ?>&nbsp;<?php echo $form['cost_currency_id']->render(); ?></td>
            <td class="td_help"><?php echo ($form['cost']->hasError()) ? $form['cost']->renderError() : $form['cost']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['term']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['term']->render(); ?>&nbsp;<?php echo $form['term_options']->render(); ?></td>
            <td class="td_help"><?php echo ($form['term']->hasError()) ? $form['term']->renderError() : $form['term']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['file_src']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['file_src']->render(); ?></td>
            <td class="td_help"><?php echo ($form['file_src']->hasError()) ? $form['file_src']->renderError() : $form['file_src']->renderHelp(); ?></td>
        </tr>
        <?php echo $form['id']->render(); ?>
        <?php echo $form['_csrf_token']->render(); ?>
    </tbody>
  </table>
</form>
