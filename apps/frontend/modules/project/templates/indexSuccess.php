<?php use_helper('Text'); ?>
<h1>Проекты</h1>

<table width="70%">
    <?php foreach($projects as $project): ?>
        <tr>
            <td width="70%" colspan="2">
                <a href="<?php echo url_for('project_show', $project); ?>">
                    <?php echo $project->getName(); ?>
                </a>
            </td>
            <td width="10%" align="right"><?php echo $project->getBudget(); ?>&nbsp;<?php echo $project->BudgetCurrency; ?></td>
            <td width="20%" align="right"><?php echo $project->getTerm(); ?>&nbsp;<?php echo $project->getTermOptions(); ?></td>
        </tr>
        <tr>
            <td colspan="4"><?php echo simple_format_text($project->getSmallDescription()); ?></td>
        </tr>
        <tr>
            <td width="30%">Категория:</td>
            <td width="70%" colspan="3"><?php echo $project->Category; ?></td>
        </tr>
        <tr>
            <td width="30%">Тип проекта:</td>
            <td width="70%" colspan="3"><?php echo $project->getWorkType(); ?></td>
        </tr>
        <tr>
            <td width="30%">Файл:</td>
            <td width="70%" colspan="3"><?php echo $project->getFileSrc(); ?></td>
        </tr>
        <tr>
            <td width="30%">Добавлен:</td>
            <td width="70%" colspan="3"><?php echo $project->getCreatedAt(); ?></td>
        </tr>
        <tr>
            <td width="30%">Действителен до:</td>
            <td width="70%" colspan="3"><?php echo $project->getExpiresAt(); ?></td>
        </tr>
        <tr height="20"><td colspan="4" width="100%"><hr /></td></tr>
    <?php endforeach; ?>
</table>

  <a href="<?php echo url_for('project/new') ?>">New</a>