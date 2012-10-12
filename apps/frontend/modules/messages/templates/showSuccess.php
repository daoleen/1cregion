<h3>Сообщения</h3>

<?php foreach($messages as $message): ?>
    <?php echo $message->getCreatedAt(); ?>&nbsp;
    <a href="<?php echo url_for('account', $message->From); ?>"><?php echo $message->From; ?></a>:<br />
    <?php echo $message->getMessage(); ?><br /><br />
<?php endforeach; ?>

<?php include_component('messages', 'sendmessage', array('listener' => $sender)); ?>