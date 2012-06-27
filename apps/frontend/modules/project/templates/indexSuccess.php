<?php use_stylesheet('project.css'); ?>
<?php use_helper('Text'); ?>

<div id="project_block">
    
    <!--
    <div id="project_filter">
        Filter
    </div>
    -->
    
<?php foreach($projects as $project): ?>
    <div id="project_in_list_block">
        <table width="100%" border="0">
            <tr>
                <td colspan="3"><a href="<?php echo url_for('project_show', $project); ?>" class="title_font"><?php echo $project->getName(); ?></a></td>
                <td align="right" class="<?php echo ($project->getIsBudgetByAgreement()) ? 'price_by_agrrement' : 'price'; ?>">
                    <?php if($project->getIsBudgetByAgreement()): ?>
                        По договоренности
                    <?php else: ?>
                        <?php echo $project->getBudget(); ?>&nbsp;<?php echo $project->BudgetCurrency; ?>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td colspan="4" class="small_description">
                    <?php echo simple_format_text($project->getSmallDescription()); ?>
                </td>
            </tr>
            <tr>
                <td width="30%">
                    <img src="/images/icons/clock.gif" width="20" height="20" align="absmiddle" />
                    <span class="date"><?php echo $project->getCreatedAt(); ?></span>
                </td>
                <td width="25%">
                    <img src="/images/icons/hexagon_blue_small.gif" width="20" height="20" align="absmiddle" />
                    <span class="level"><?php echo $project->Category; ?></span>
                </td>
                <td width="22%">
                    <img src="/images/icons/flag.gif" width="24" height="29" align="absmiddle" />
                    <span class="answers_count">ответов (<?php echo $project->getAnswersCount(); ?>)</span>
                </td>
                <td width="23%" align="right">
                    <?php if($project->getIsSecurityDeal()): ?>
                        <img src="/images/icons/info.gif" width="21" height="20" align="absmiddle" />
                        <span class="more">Безопасная сделка</span>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </div>
<?php endforeach; ?>
</div>

<div id="project_action_block">
    <ul>
        <li>
            <img src="/images/icons/briefcase.gif" align="absmiddle" />
            <a href="<?php echo url_for('/project/new'); ?>">Добавить проект</a>
        </li>
        <li>
            <img src="/images/icons/hexagon_blue.gif" align="absmiddle" />
            <a href="#">Проекты высокого уровня</a>
        </li>
        <li>
            <img src="/images/icons/hexagon_yellow.gif" align="absmiddle" />
            <a href="#">Проекты среднего уровня</a>
        </li>
        <li>
            <img src="/images/icons/hexagon_red.gif" align="absmiddle" />
            <a href="#">Проекты низкого уровня</a>
        </li>
    </ul>
</div>