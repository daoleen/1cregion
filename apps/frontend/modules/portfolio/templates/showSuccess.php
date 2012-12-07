<?php use_helper("Text"); ?>
<?php use_stylesheet('portfolio.css'); ?>

<h1 class="portfolio_title">Портфолио пользователя <?php echo $portfolio_work->User; ?></h1>
<h3 class="portfolio_work_name"><?php echo $portfolio_work->getName(); ?></h3>

<div id="portfolio_show">
    <?php if($portfolio_work->getImage()): ?>
        <img class="img_work" align="left" src="<?php echo '/uploads/UserFiles/'.$portfolio_work->getImage(); ?>" alt="<?php echo $portfolio_work->getName(); ?>" />
    <?php else: ?>
        <img class="img_work" align="left" src="<?php echo sfConfig::get('app_default_workimage_path'); ?>" alt="<?php echo $portfolio_work->getName(); ?>" />
    <?php endif; ?>
    <div id="portfolio_work_info">
        <table class="table_work_options">
            <tbody>
                <tr>
                    <td class="td_work_options">Категория:</td>
                    <td class="td_work_value"><?php echo $portfolio_work->Category; ?></td>
                </tr>
                <?php if($portfolio_work->getCost()): ?>
                    <tr>
                        <td class="td_work_options">Стоимость выполенения:</td>
                        <td class="td_work_value"><?php echo $portfolio_work->getCost(); ?>&nbsp;<?php echo $portfolio_work->CostCurrency; ?></td>
                    </tr>
                <?php endif; ?>
                <?php if($portfolio_work->getTerm()): ?>
                    <tr>
                        <td class="td_work_options">Срок выполенения:</td>
                        <td class="td_work_value"><?php echo $portfolio_work->getTerm(); ?>&nbsp;<?php echo $portfolio_work->getTermOptions(); ?></td>
                    </tr>
                <?php endif; ?>
                <?php if($portfolio_work->getLink()): ?>
                    <tr>
                        <td class="td_work_options">Ссылка:</td>
                        <td class="td_work_value"><a class="link_work" href="<?php echo $portfolio_work->getLink(); ?>"><?php echo $portfolio_work->getLink(); ?></a></td>
                    </tr>
                <?php endif; ?>
                <?php if($portfolio_work->getFileSrc()): ?>
                    <tr>
                        <td class="td_work_options">Вложения:</td>
                        <td class="td_work_value"><a class="link_work" href="<?php echo '/uploads/UserFiles/'.$portfolio_work->getFileSrc(); ?>"><?php echo $portfolio_work->getFileSrc(); ?></a></td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td class="td_work_options">Добавлено:</td>
                    <td class="td_work_value"><?php echo $portfolio_work->getCreatedAt(); ?></td>
                </tr>
                <tr>
                    <td class="td_work_options">Обновлено:</td>
                    <td class="td_work_value"><?php echo $portfolio_work->getUpdatedAt(); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <br clear="left" />
    
    <div id="portfolio_description">
        <?php echo simple_format_text($portfolio_work->getDescription()); ?>
    </div>
</div>

<div id="portfolio_navigation">
    <?php if($portfolio_work->User == $sf_user->getGuardUser()): ?>
        <a class="link_portfolio_nav" href="<?php echo url_for('portfolio_edit', $portfolio_work); ?>">Редактировать</a>&nbsp;
        <a class="link_portfolio_nav" href="<?php echo url_for('portfolio_delete', $portfolio_work); ?>">Удалить</a>
    <?php endif; ?>
    <a class="link_portfolio_nav" href="<?php echo url_for('portfolio', $portfolio_work->User); ?>">Назад к списку работ</a>
</div>