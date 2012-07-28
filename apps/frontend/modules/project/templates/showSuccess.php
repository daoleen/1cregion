<?php use_helper('Text'); ?>
<?php use_stylesheet('project_show.css'); ?>

<div id="title_project"> <!-- Первая полоса -->	
        <img src="/images/title_project_description.gif" alt="Описание проекта"/>
</div>

<div id="design"> <!-- Вторая полоса -->
    <div class="left">
        <?php echo $project->getName(); ?><br />
        <font color="#0607FF"><?php echo $project->Category; ?></font>
    </div>
    <div class="right">
        <img src="/images/avatar.gif" alt="Аватар работодателя" />
            <?php echo $project->User; ?><br />
            Зарегистрирован: <?php echo date('d.m.Y', strtotime($project->User->getCreatedAt())); ?> | Отзывы: TODO
        </div>
</div> <!--#design-->

<div id="info"> <!--Третья полоса-->
        <div class="left">
        <table>
                                <tr> <td>Бюджет</td> </tr>
                                <tr> <td>Приём заявок</td> </tr>
                                <tr> <td>Статистика</td> </tr>
                                <tr> <td>Статус</td> </tr>
                        </table>
    </div>
    <div class="right">
    <table>
                                <tr> <td><?php echo ($project->getIsBudgetByAgreement()) ? 'По договоренности' : $project->getBudget().' '.$project->BudgetCurrency.' ('.$project->getBudgetType().')'; ?></td> </tr>
                                <tr> <td><?php echo date('d.m.Y', strtotime($project->getCreatedAt())); ?> - <?php echo date('d.m.Y', strtotime($project->getExpiresAt())); ?></td> </tr>
                                <tr> <td>Заявки: <?php echo $project->Comments->count(); ?></td> </tr>
                                <tr> <td><?php echo ($project->getIsActive()) ? 'Открыт' : 'Закрыт'; ?></td> </tr>
                        </table>
    </div>
</div> <!--#info-->
<div id="clear"></div>

<div id="promo"> <!--Четвертая полоса-->
    <?php echo simple_format_text($project->getDescription()); ?>
    <!-- TODO
    <div id="events">
        <a href="#">Добавить в закладки</a>&nbsp;|&nbsp;
        <a href="#">Сообщить о нарушении</a>
    </div> -->
</div> <!--#promo-->


<?php if($sf_user->isAuthenticated()): ?>
    <?php include_component('comment', 'showcomments', array('project' => $project)); ?>
<?php endif; ?>

<hr />

<?php if(($project->User == $sf_user->getGuardUser()) || $sf_user->hasCredential('admin') ): ?>
    <a href="<?php echo url_for('project/edit?id='.$project->getId()) ?>">Редактировать</a>&nbsp;
<?php endif; ?>
<a href="<?php echo url_for('project/index') ?>">К списку проектов</a>
