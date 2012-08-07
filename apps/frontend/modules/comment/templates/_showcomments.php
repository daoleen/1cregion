<?php
use_stylesheet('comment.css');
use_helper('Text');
$isSecondComment = false;
?>

<?php if($project->Comments->count() > 0): ?>
<div id="request"> <!--Пятая полоса-->
        <div id="top">
            <p class="left"> Заявки фрилансеров </p>
            <!--<p class="right"> Добавить заявку </p>-->
        </div>

    </table>
    <table>
        <tr>
            <th>Пользователь</th>
            <th>Сумма</th>
            <th>Сроки</th>
            <th align="right">Дата</th>
        </tr>
        <?php foreach($project->Comments as $comment): ?>
            <?php if($comment->User == $sf_user->getGuardUser()) $isSecondComment = true; ?>
            <tr>
                <td class="left_align user_description">
                    <img src="/images/avatar.gif" alt="Аватар исполнителя" align="left" /> 
                        <a href="<?php echo url_for('account', $comment->User); ?>" class="a_username"><?php echo $comment->User; ?></a>
                        <?php echo simple_format_text($comment->getComment()); ?>
                    
                        <?php if($comment->getIsSecurityDeal()): ?>
                            <strong>Желаю использовать сервис безопасных сделок</strong><br />
                        <?php endif; ?>
                            
                        <?php if($comment->getIsCandidate()): ?>
                            <strong>Кандидат к выполнению проекта</strong><br />
                        <?php endif; ?>
                            
                        <?php if($comment->getIsPerformer()): ?>
                            <strong>Исполнитель проекта</strong><br />
                        <?php endif; ?>
                </td>
                <td class="center_align"><span class="cost"><?php echo $comment->getCost(); ?>&nbsp;<?php echo $comment->Currency; ?></span><br /><span class="cost_type"><?php echo $comment->getCostType(); ?></span></td>
                <td class="center_align cost"><?php echo $comment->getTerm(); ?>&nbsp;<?php echo $comment->getTermOptions(); ?></td>
                <td class="center_align cost"><?php echo $comment->getCreatedAt(); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

</div> <!--#request-->
<div id="clear"></div>
<?php endif; ?>

<?php if($sf_user->hasCredential('freelancer') && !$isSecondComment && ($project->User != $sf_user->getGuardUser())): ?>
    <?php use_stylesheets_for_form($form); ?>
    <div id="answer"> <!--Шестая полоса-->
        <div class="left"><span class="answer_on_project">Ответить на проект</span><br /><br />
            Бюджет: 
        </div>
        <?php echo form_tag_for($form, '@comment'); ?>
        <div id="form">
            <table width="150" border="0">
                <tr>
                    <td><?php echo $form['is_security_deal']->render(); ?></td>
                    <td colspan="3"><?php echo $form['is_security_deal']->renderLabel(); ?></td>               
                </tr>
                <tr>
                    <td><?php echo $form['cost']->renderLabel(); ?></td>
                    <td><?php echo $form['cost']->render(); ?></td>
                    <td><?php echo $form['currency_id']->render(); ?></td>
                    <td><?php echo $form['cost_type']->render(); ?></td>                    
                </tr>
                <tr>
                    <td><?php echo $form['term']->renderLabel(); ?></td>
                    <td><?php echo $form['term']->render(); ?></td>
                    <td colspan="2"><?php echo $form['term_options']->render(); ?></td>
                </tr>
            </table>
        </div>
        <div id="comments">
            <table width="150" border="0">
                <tr>
                    <td width="100">Комментарий</td>
                </tr>
                <tr>
                    <td>
                        <?php echo $form['comment']->render(); ?>
                    </td>
                </tr>
            </table>
            <button type="submit"><img src="/images/btn_add_answer.jpg" /></button>
        </div> 
        <?php echo $form['project_id']->render(); ?>
        <?php echo $form['_csrf_token']->render(); ?>
        </form>
    </div> <!--#answer-->
<?php endif; ?>