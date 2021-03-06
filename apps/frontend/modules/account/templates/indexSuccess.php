<?php use_stylesheet('account.css'); ?>
<?php if($user == $sf_user->getGuardUser()): ?>
    <?php use_javascript('ajaxupload.js'); ?>
    <?php use_javascript('account.js'); ?>
<?php endif; ?>
<?php use_helper('Text'); ?>

<img src="/images/title_profile.jpg" class="title_profile" />
<div id="navigation">
    <ul>
        <li><strong><?php echo $user->getUsername(); ?></strong></li>
        <?php if($user == $sf_user->getGuardUser()): ?>
            <?php $new_messages = $user->getUnreadMessagesCount(); ?>
            <li><a href="<?php echo url_for('messages_contact_list', $user); ?>"><?php echo ($new_messages == 0) ? "Нет уведомлений" : "Уведомления: {$new_messages}"; ?></a></li>
            <li><a href="#">Баланс: 0 руб.</a></li>
            <li><a href="#">Бонусы: <?php echo $user->Bonus->getBonus(); ?></a></li>
            <li>Отзывы: <a href="<?php echo url_for('feedback', $user); ?>"><span class="a_feedback"><?php echo $user->Feedbacks->count(); ?></span></a></li>
            <!--<li><a href="#">Рейтинг: 0.8</a></li>-->
            <li><a href="<?php echo url_for('@sf_guard_signout'); ?>" class="logout">Выход</a></li>
        <?php else: ?>
            <li><a href="<?php echo url_for('messages_show', $user); ?>">Написать сообщение</a></li>
            <li>Отзывы: <a href="<?php echo url_for('feedback', $user); ?>"><span class="a_feedback"><?php echo $user->Feedbacks->count(); ?></span></a></li>
        <?php endif; ?>
    </ul>
</div>

<div id="left_info">
    <div id="logo_info">
        <h3><?php echo $user; ?></h3>
        <div id="avatar">
            <img id="img_avatar" src="<?php echo ($avatar = $user->Account->getAvatar()) ? sfConfig::get('app_avatar_dir').$avatar : sfConfig::get('app_default_avatar_path'); ?>" class="avatar" alt="avatar" align="left" />
        </div>
        <span class="years_old"><?php echo  intval((time() - strtotime($user->Account->getBirthday()))/31536000); ?> года</span><br />
        <span class="city"><?php echo $user->Account->Country; ?>, <?php echo $user->Account->Region; ?></span><br />
        <span class="city"><?php echo $user->Account->City; ?></span><br />
        <a class="private_message" href="<?php echo url_for('messages_show', $user); ?>">Приватное сообщение</a>
    </div>
    <div id="main_info">
        <h3>Основная информация</h3>
        <table width="70%" align="left" border="0">
<!--            <tr>
                <td>Заказчик:</td>
                <td>(11.4) TODO</td>
            </tr>
            <tr>
                <td>Фрилансер</td>
                <td>(519) TODO</td>
            </tr>-->
            <tr>
                <td>Проекты</td>
                <td>38 TODO</td>
            </tr>
            <tr>
                <td>Вакансии</td>
                <td>2 TODO</td>
            </tr>
            <tr>
                <td>Портфолио</td>
                <td><a href="<?php echo url_for('portfolio', $user); ?>"><?php echo $user->PortfolioWorks->count(); ?></a></td>
            </tr>
            <tr>
                <td>Отзывы</td>
                <td><?php echo $user->Feedbacks->count(); ?></td>
            </tr>
            <tr>
                <td>Просмотры</td>
                <td><?php echo $user->Account->getVisitors(); ?></td>
            </tr>
            <tr>
                <td>В сервисе c</td>
                <td><?php echo $user->getCreatedAt(); ?></td>
            </tr>
            <tr>
                <td>Последний визит</td>
                <td><?php echo $user->getLastLogin(); ?></td>
            </tr>
        </table>
    </div>
</div>

<div id="right_info">
    <div id="categories">
        <?php foreach($user->Account->Categories as $category): ?>
            <h3><?php echo $category; ?></h3>
        <?php endforeach; ?>
    </div>
    
    <div id="contacts">
        <h3>Контактные данные</h3>
        <?php if($user->Account->getEmail()): ?>
            <?php echo $user->Account->getEmail(); ?><br />
        <?php endif; ?>
        ICQ: <?php echo ($icq=$user->Account->getIcq()) ? $icq : '<span class="info_not_avaliable">
            Информация недоступна
        </span>'; ?><br />
        
        skype: <?php echo ($skype = $user->Account->getSkype()) ? $skype : '<span class="info_not_avaliable">
            Информация недоступна
        </span>'; ?>
    </div>
    
    <div id="other_info">
        <h3>Дополнительная информация</h3>
        
        
<!--        <span class="info_not_avaliable">
            Информация недоступна
        </span>-->
        
        <?php echo ($info = $user->Account->getOtherInfo()) ? simple_format_text($info) : '<span class="info_not_avaliable">Информация недоступна
        </span>'; ?>
        
    </div>
    
    <?php if($sf_user->getGuardUser() == $user): ?>
        <br />
        <a href="<?php echo url_for('account_edit', $user); ?>">Редактировать данные</a>&nbsp;
        <!--<a href="<?php echo url_for('avatar_edit', $user); ?>">Изменить аватар</a>-->
    <?php endif; ?>
</div>

<div id="clear"></div>