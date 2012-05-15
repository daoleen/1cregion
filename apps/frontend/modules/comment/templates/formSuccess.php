<?php

/**
 *  Created by Alex Kozlov <alexssource@gmail.com>
 *  All rights reserved&copy;
 *  Minsk, 2012
 */
?>

<?php if($sf_user->isAuthenticated()): ?>
    <?php include_component('comment', 'showcomments', array('projectId' => $form->getValue('project_id'))); ?>
<?php endif; ?>

<!--
<h4>Новый комментарий:</h4>
<table>
    <thead><?php echo form_tag_for($form, '@comment'); ?></thead>
    <tbody><?php echo $form; ?><input type="submit" value="Добавить" /></tbody>
    <tfoot>
        
        </form>
    </tfoot>
</table>
-->