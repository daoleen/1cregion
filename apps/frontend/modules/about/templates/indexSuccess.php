<?php use_helper('I18N') ?>
<?php use_stylesheet('about.css'); ?>
<div id="about_content">
<h1>О проекте</h1>
<p>Данный проект реализуется силами фрилансеров. Наша цель создать оптимальный портал для работы 
с привлечением максимального числа участников в лице как заказчиков так и исполнителей.</p>

<p><span class="action">АКЦИЯ!!!</span> За регистрацию каждому участнику начисляется <strong>+50</strong> баллов в качестве бонуса, 
за каждый день посешения <strong>+1</strong> бонусный балл.</p>
<p>Бонусы можно будет использовать после официального открытия биржи.</p>
<p class="action">Проект находится в стадии разработки.</p>
<p>Зарегистрируйтесь на сайте и мы бюдем Вас информировать о последних событиях развитии нашего ресурса:</p>
<br />

<div id="central_block" class="central">
    <strong><?php echo __('Register', null, 'sf_guard') ?></strong>
    <?php include_component('sfGuardRegister', 'form'); ?>
</div>
</div>
<div id="authorization_block">
    <?php if(!$sf_user->isAuthenticated()): ?>
        <?php include_component('sfGuardAuth', 'authorization'); ?>
    <?php else: ?>
        <span class="central"><?php echo $sf_user; ?></span>
    <?php endif; ?>
</div>

<div id="clear"></div>