<?php use_stylesheet('project.css'); ?>
<?php use_helper('Text'); ?>

<div id="project_block">
    
    <div id="project_filter">
        <table width="100%" border="0">
            <tr>
                <td colspan="5" class="button_filter"><img src="/images/filter_title.jpg" class="image_filter" /></td>
                <td align="right" class="status_filter_on">Фильтр включен</td>
            </tr>
            <tr>
                <td class="td_filter"><img src="/images/icons/money.gif" class="image_icon" /></td>
                <td><input type="checkbox" /></td>
                <td>Бюджет:</td>
                <td>от <input type="text" size="10" /></td>
                <td colspan="2">до <input type="text" size="10" /></td>
            </tr>
            <tr>
                <td class="td_filter"><img src="/images/icons/star.gif" class="image_icon" /></td>
                <td><input type="checkbox" /></td>
                <td>Разделы:</td>
                <td colspan="3">
                    <input type="list" multipart="true" />
                </td>
            </tr>
            <tr>
                <td class="td_filter"><img src="/images/icons/home.gif" /></td>
                <td><input type="checkbox" /></td>
                <td>Местоположение:</td>
                <td>
                    <select multipart="true">
                        <option value="1">Страна</option>
                    </select>
                </td>
                <td colspan="2">
                    <select multipart="true">
                        <option value="1">Город</option>
                    </select>
                </td>
            </tr>
            <tr class="td_filter">
                <td class="td_filter"><img src="/images/icons/pencil.gif" class="image_icon" /></td>
                <td><input type="checkbox" /></td>
                <td>Тэги:</td>
                <td colspan="3">
                    <input type="text" />
                </td>
            </tr>
            <tr>
                <td colspan="5" align="right">
                    <img src="/images/icons/check.gif" class="image_icon" align="absmiddle" />
                    <span>Применить</span>
                </td>
                <td align="right">
                    <img src="/images/icons/cross.gif" class="image_icon" align="absmiddle" />
                    <span>Очистить форму</span>
                </td>
            </tr>
        </table>
    </div>
    
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