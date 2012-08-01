<?php use_stylesheet('feedback.css'); ?>
<?php use_helper('Text'); ?>
<h3>Отзывы</h3>

<?php if($feedbacks->count()): ?>
<table class="table_feedback">
  <thead>
    <tr>
      <th align="left" width="50%">Пользователь</th>
      <th width="15%">Сумма</th>
      <th width="15%">Оценка</th>
      <th width="20%">Дата публикации</th>
    </tr>
  </thead>
  
  <tbody>
      <?php foreach($feedbacks as $feedback): ?>
        <tr>
            <th colspan="4" width="100%">
                <div id="feedback_block">
                    <table width="100%">
                        <tr>
                            <th align="left" width="50%">
                                <table width="100%" border="0">
                                    <tr>
                                        <td><img src="/images/avatar.gif" class="avatar" /></td>
                                        <td class="user_info">
                                            <a class="user_name" href="<?php echo url_for('account', $feedback->Owner); ?>"><?php echo $feedback->Owner; ?></a><br />
                                            В сервисе с <?php echo $feedback->Owner->getCreatedAt(); ?> | Отзывы: <?php echo $feedback->Owner->Feedbacks->count(); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="project_name"><a href="<?php echo url_for('project_show', $feedback->Project); ?>"><?php echo $feedback->Project->getName(); ?></a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="category_name"><?php echo $feedback->Project->Category; ?></td>
                                    </tr>
                                </table>
                            </th>
                            <th width="15%" class="feedback_info">
                                <?php echo $feedback->getCost(); ?> руб
                            </th>
                            <th width="15%" class="feedback_info">
                                <?php echo $feedback->getBall(); ?> баллов
                            </th>
                            <th width="20%" class="feedback_info">
                                <?php echo $feedback->getCreatedAt(); ?>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="4" align="left" width="100%" class="feedback_comment <?php echo ($feedback->getFeedbackType()); ?>">
                                <img src="/images/<?php echo $feedback->getFeedbackType(); ?>_feedback.gif" class="img_feedback_type" align="left" />
                                <?php echo simple_format_text($feedback->getComment()); ?>
                            </th>
                        </tr>
                    </table>
                </div>
            </th>
        </tr>
      <?php endforeach; ?>
    </tbody>
</table>
<?php else: ?>
    У пользователя нет ни одного отзыва
<?php endif; ?>
