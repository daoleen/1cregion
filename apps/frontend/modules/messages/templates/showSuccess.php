<h3>Сообщения</h3>

<?php if($messages->count() == 0): ?>
    Сообщений  нет
<?php else: ?>
    <?php foreach($messages as $message): ?>
        <?php echo $message->getCreatedAt(); ?>&nbsp;
        <a href="<?php echo url_for('account', $message->From); ?>"><?php echo $message->From; ?></a>:<br />
        <?php echo $message->getMessage(); ?><br /><br />
    <?php endforeach; ?>
<?php endif; ?>

<?php include_component('messages', 'sendmessage', array('listener' => $sender)); ?>