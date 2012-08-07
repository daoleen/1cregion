<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('feedback/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table_form_feedback">
    <tfoot>
      <tr>
        <td colspan="2">
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'feedback/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Добавить отзыв" />
        </td>
      </tr>
    </tfoot>
    <tbody>
        <tr>
            <td class="td_title"><?php echo $form['feedback_type']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['feedback_type']->render(); ?></td>
            <td class="td_help"><?php echo $form['feedback_type']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['ball']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['ball']->render(); ?></td>
            <td class="td_help"><?php echo $form['ball']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['cost']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['cost']->render(); ?></td>
            <td class="td_help"><?php echo ($form['cost']->hasError()) ? $form['cost']->renderError() : $form['cost']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td colspan="2"><?php echo $form['comment']->render(); ?></td>
            <td class="td_help"><?php echo ($form['comment']->hasError()) ? $form['comment']->renderError() : $form['comment']->renderHelp(); ?></td>
        </tr>
        <?php echo $form['id']->render(); ?>
        <?php echo $form['user_id']->render(); ?>
        <?php echo $form['owner_id']->render(); ?>
        <?php echo $form['project_id']->render(); ?>
        <?php echo $form['_csrf_token']->render(); ?>
    </tbody>
  </table>
</form>
