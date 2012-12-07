<?php use_stylesheet('portfolio.css'); ?>
<h1 class="portfolio_title">Редактирование работы в портфолио</h1>

<?php include_partial('form', array('form' => $form)) ?>

<div id="portfolio_navigation">
    <a class="link_portfolio_nav" href="<?php echo url_for('portfolio', $sf_user->getGuardUser()) ?>">Back to list</a>
</div>