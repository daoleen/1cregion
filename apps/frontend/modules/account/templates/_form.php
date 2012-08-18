<?php use_stylesheets_for_form($form); ?>
<form action="<?php echo url_for('@account_update'); ?>" method="post">
    <table border="0" class="table_form_account">
        <tfoot>
        <tr>
            <td>
                <input type="submit" value="Сохранить" />
            </td>
        </tr>
        </tfoot>
            <tbody>
                <!-- Основные данные -->
                <tr>
                    <td colspan="3" class="section_label">Основные данные</td>
                </tr>
                <tr>
                    <td class="td_title"><?php echo $form['birthday']->renderLabel(); ?></td>
                    <td class="td_input"><?php echo $form['birthday']->render(); ?></td>
                    <td class="td_help"><?php echo ($form['birthday']->hasError()) ? $form['birthday']->renderError() : $form['birthday']->renderHelp(); ?></td>
                </tr>
                <tr>
                    <td class="td_title">Местоположение</td>
                    <td class="td_input" colspan="2"><?php echo $form['country_id']; ?>&nbsp;<?php echo $form['region_id']; ?>&nbsp;<?php echo $form['city_id']; ?></td>
                </tr>
                
                <!-- Специализации -->
                <tr>
                    <td colspan="3" class="section_label new_category">Направление работы</td>
                </tr>
                <tr>
                    <td class="td_title">Специализации</td>
                    <td colspan="2" class="td_input"><?php echo $form['categories_list']; ?></td>
                </tr>
                
                <!-- Контактные данные -->
                <tr>
                    <td colspan="3" class="section_label new_category">Контактные данные</td>
                </tr>
                <tr>
                    <td class="td_title"><?php echo $form['email']->renderLabel(); ?></td>
                    <td class="td_input"><?php echo $form['email']->render(); ?></td>
                    <td class="td_help"><?php echo ($form['email']->hasError()) ? $form['email']->renderError() : $form['email']->renderHelp(); ?></td>
                </tr>
                <tr>
                    <td class="td_title"><?php echo $form['icq']->renderLabel(); ?></td>
                    <td class="td_input"><?php echo $form['icq']->render(); ?></td>
                    <td class="td_help"><?php echo ($form['icq']->hasError()) ? $form['icq']->renderError() : $form['icq']->renderHelp(); ?></td>
                </tr>
                <tr>
                    <td class="td_title"><?php echo $form['skype']->renderLabel(); ?></td>
                    <td class="td_input"><?php echo $form['skype']->render(); ?></td>
                    <td class="td_help"><?php echo ($form['skype']->hasError()) ? $form['skype']->renderError() : $form['skype']->renderHelp(); ?></td>
                </tr>
                <tr>
                    <td class="td_title"><?php echo $form['other_contacts']->renderLabel(); ?></td>
                    <td class="td_input"><?php echo $form['other_contacts']->render(); ?></td>
                    <td class="td_help"><?php echo ($form['other_contacts']->hasError()) ? $form['other_contacts']->renderError() : $form['other_contacts']->renderHelp(); ?></td>
                </tr>
                
                <!-- Дополнительная информация -->
                <tr>
                    <td colspan="3" class="section_label new_category">Дополнительная ифнормация</td>
                </tr>
                <tr>
                    <td class="td_input" colspan="2">
                        <?php echo $form['other_info']->render(); ?>
                    </td>
                    <td class="td_help"><?php echo ($form['other_info']->hasError()) ? $form['other_info']->renderError() : $form['other_info']->renderHelp(); ?></td>
                </tr>
                <?php echo $form['id']->render(); ?>
                <?php echo $form['_csrf_token']->render(); ?>
            </tbody>
    </table>
</form>
