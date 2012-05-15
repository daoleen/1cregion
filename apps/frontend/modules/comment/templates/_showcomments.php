<?php use_helper('Text'); $isSecondComment = false; ?>
<hr />
    <h4>Комментарии к проекту:</h4>
    <?php foreach ($comments as $comment): ?>
        <p>
        <?php if($comment->User == $sf_user->getGuardUser()) $isSecondComment = true; ?>
        Фрилансер: <?php echo $comment->User; ?><br />
        Стоимость: <?php echo $comment->getCost(); ?>&nbsp;<?php echo $comment->Currency; ?>/<?php echo $comment->getCostType(); ?><br />
        Срок: <?php echo $comment->getTerm(); ?> <?php echo $comment->getTermOptions(); ?><br />
        Через безопасную сделку; <?php echo $comment->getIsSecurityDeal(); ?><br />
        Кандидат: <?php echo $comment->getIsCandidate(); ?><br />
        Исполнитель: <?php echo $comment->getIsPerformer(); ?><br />
        Комментарий: <?php echo simple_format_text($comment->getComment()); ?><br />
        </p>
    <?php endforeach; ?>

<?php if($sf_user->hasCredential('freelancer') && !$isSecondComment): ?>
    <br />
    <h4>Новый комментарий:</h4>
    <table>
        <thead><?php echo form_tag_for($form, '@comment'); ?></thead>
        <tbody><?php echo $form; ?><input type="submit" value="Добавить" /></tbody>
        <tfoot>

            </form>
        </tfoot>
    </table>
<?php endif; ?>