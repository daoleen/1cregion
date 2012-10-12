<form action="<?php echo url_for('messages_send'); ?>" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <?php echo $form['message']->render(); ?>
                </td>
            </tr>
            <?php echo $form['id']->render(); ?>
            <?php echo $form['to_id']->render(); ?>
            <?php echo $form['_csrf_token']->render(); ?>
        </tbody>
        <tfoot>
            <tr>
                <td>
                    <input type="submit" value="Send" />
                </td>
            </tr>
        </tfoot>
    </table>
</form>