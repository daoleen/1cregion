<?php use_helper('Text'); ?>
<h3><?php echo $project->getName(); ?></h3>
<?php echo simple_format_text($project->getDescription()); ?>

<p>
    Автор: <a href="#"><?php echo $project->User; ?></a><br />
    Вложения: <a href="<?php echo '/uploads/ProjectFiles/'. $project->getFileSrc(); ?>">a</a><br />
    Тип работы: <?php echo $project->getWorkType(); ?><br />
    Категория: <?php echo $project->Category; ?><br />
    Офис: <?php echo $project->OfficeCountry; ?><br />
    Офис горад: <?php echo $project->OfficeCity; ?><br />
    Бюджет по договоренности: <?php echo $project->getIsBudgetByAgreement(); ?><br />
    Бюджет: <?php echo $project->getBudget(); ?><br />
    Валюта: <?php echo $project->BudgetCurrency; ?><br />
    Срок: <?php echo $project->getTerm();?> <?php echo $project->getTermOptions(); ?><br />
    Бюджет тип: <?php echo $project->getBudgetType(); ?><br />
    Использую безопасную сделку:<?php echo $project->getIsSecurityDeal(); ?><br />
    Годен до: <?php echo $project->getExpiresAt(); ?>
</p>

<?php if($sf_user->isAuthenticated()): ?>
    <?php include_component('comment', 'showcomments', array('projectId' => $project->getId())); ?>
<?php endif; ?>

<hr />

<a href="<?php echo url_for('project/edit?id='.$project->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('project/index') ?>">List</a>
