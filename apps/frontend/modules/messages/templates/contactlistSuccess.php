<h3>Мои контакты</h3>

<?php foreach($contacts as $contact): ?>
    <a href="<?php echo url_for('messages_show', $contact->From); ?>"><?php echo $contact->From; ?></a>&nbsp;
        <?php if ($contact->hasUnread()): ?>
            Непрочитанные сообщения
        <?php endif; ?><br />
<?php endforeach; ?>
