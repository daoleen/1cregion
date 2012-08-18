<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('project/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table class="table_form_new_project">
    <tfoot>
        <tr>
            <td colspan="3" class="form_tfoot">
                Нажимая на кнопку "Добавить проект", Вы принимаете условия Правил публикации предложений работы.
            </td>
        </tr>
      <tr>
          <td colspan="2" align="right">
            <?php if (!$form->getObject()->isNew()): ?>
                <?php echo link_to('Удалить проект', 'project/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Вы уверены?')) ?>
            <?php endif; ?>
          </td>
        <td align="right">
          <input type="submit" value="Добавить проект" />
        </td>
      </tr>
    </tfoot>
    <tbody>
        
        <!-- Основные данные -->
        <tr>
            <td colspan="3" class="section_label">Основные данные</td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['name']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['name']->render(); ?></td>
            <td class="td_help"><?php echo ($form['name']->hasError()) ? $form['name']->renderError() : $form['name']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['category_id']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['category_id']->render(); ?></td>
            <td class="td_help"><?php echo ($form['category_id']->hasError()) ? $form['category_id']->renderError() : $form['category_id']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['small_description']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['small_description']->render(); ?></td>
            <td class="td_help"><?php echo ($form['small_description']->hasError()) ? $form['small_description']->renderError() : $form['small_description']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['description']->renderLabel(); ?></td>
            <td class="td_input" colspan="2">
                <?php if($form['description']->hasError()) echo $form['description']->renderError(); ?>
                <?php echo $form['description']->render(); ?>
            </td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['file_src']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['file_src']->render(); ?></td>
            <td class="td_help"><?php echo ($form['file_src']->hasError()) ? $form['file_src']->renderError() : $form['file_src']->renderHelp(); ?></td>
        </tr>
        
        
        <!-- Финансовые данные -->
        <tr>
            <td colspan="3" class="section_label section_margin">Финансовые данные</td>
        </tr>
        <tr>
            <td class="td_title">&nbsp;</td>
            <td class="td_input"><?php echo $form['is_budget_by_agreement']->render(); ?>&nbsp;<?php echo $form['is_budget_by_agreement']->renderLabel(); ?></td>
            <td class="td_help"><?php echo ($form['is_budget_by_agreement']->hasError()) ? $form['is_budget_by_agreement']->renderError() : $form['is_budget_by_agreement']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title">&nbsp;</td>
            <td class="td_input"><?php echo $form['is_security_deal']->render(); ?>&nbsp;<?php echo $form['is_security_deal']->renderLabel(); ?></td>
            <td class="td_help"><?php echo ($form['is_security_deal']->hasError()) ? $form['is_security_deal']->renderError() : $form['is_security_deal']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['budget']->renderLabel(); ?>:&nbsp;<?php echo $form['budget']->render(); ?></td>
            <td class="td_input">
                <?php echo $form['budget_currency_id']->render(); ?>&nbsp;
                <?php echo $form['budget_type']->render(); ?>
            </td>
            <td class="td_help"><?php echo ($form['budget']->hasError()) ? $form['budget']->renderError() : $form['budget']->renderHelp(); ?></td>
        </tr>

        
        <!-- Прием заявок от фрилансеров -->
        <tr>
            <td colspan="3" class="section_label section_margin">Прием заявок от фрилансеров</td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['term']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['term']->render(); ?>&nbsp;<?php echo $form['term_options']->render(); ?></td>
            <td class="td_help"><?php echo ($form['term']->hasError()) ? $form['term']->renderError() : $form['term']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['expires_at']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['expires_at']->render(); ?></td>
            <td class="td_help"><?php echo ($form['expires_at']->hasError()) ? $form['expires_at']->renderError() : $form['expires_at']->renderHelp(); ?></td>
        </tr>
        
        <!-- Тип работы -->
        <tr>
            <td colspan="3" class="section_label section_margin">Тип работы</td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['work_type']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['work_type']->render(); ?></td>
            <td class="td_help"><?php echo ($form['work_type']->hasError()) ? $form['work_type']->renderError() : $form['work_type']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['office_country_id']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['office_country_id']->render(); ?></td>
            <td class="td_help"><?php echo ($form['office_country_id']->hasError()) ? $form['office_country_id']->renderError() : $form['office_country_id']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['office_region_id']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['office_region_id']->render(); ?></td>
            <td class="td_help"><?php echo ($form['office_region_id']->hasError()) ? $form['office_region_id']->renderError() : $form['office_region_id']->renderHelp(); ?></td>
        </tr>
        <tr>
            <td class="td_title"><?php echo $form['office_city_id']->renderLabel(); ?></td>
            <td class="td_input"><?php echo $form['office_city_id']->render(); ?></td>
            <td class="td_help"><?php echo ($form['office_city_id']->hasError()) ? $form['office_city_id']->renderError() : $form['office_city_id']->renderHelp(); ?></td>
        </tr>
        <?php echo $form['id']->render(); ?>
        <?php echo $form['_csrf_token']->render(); ?>
    </tbody>
  </table>
</form>
