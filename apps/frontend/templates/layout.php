<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas(); ?>
    <?php include_metas() ?>
      <title><?php include_slot('title', '1CRegion.ru - биржа фриланса для 1С'); ?></title>
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="container">
    	<div id="header">
            <div id="upperLine"></div>
            
            <div id="headerContent">
            	<div id="logo">
                    <a href="<?php echo url_for('@homepage'); ?>">
                    	<img src="/images/logo.png" />
                    </a>
                </div>
                <div id="introduction">
                	<h1>1CRegion.Ru - это биржа фриланса</h1>
                    <span>Основное направление нашей биржи - это проекты, связанные с системой 1C, сайты, дизайн, а также специалисты по бухгалтерскому учету и юрисприденции.</span>
                    <h3>Проект находится в стадии разработки.</h3>
                </div>
                <div id="user_params_block">
                    <?php if(!$sf_user->isAuthenticated()): ?>
                        <?php include_component('sfGuardAuth', 'authorization'); ?>
                    <?php else: ?>
                        <span class="central">
                            <a href="<?php echo url_for('account', $sf_user->getGuardUser()); ?>">
                                <?php echo $sf_user; ?>
                            </a>
                            <br />
                            <a href="<?php echo url_for('@sf_guard_signout'); ?>">Выйти</a>
                        </span>
                    <?php endif; ?>
                </div>
                <div id="clear"></div>
            </div><!-- #headerContent -->
            
            <div id="menu">
            	<div id="menu_block"><a href="<?php echo url_for('@homepage'); ?>">Главная</a></div>
                
                <?php if($sf_user->isAuthenticated()): ?>
                    <div id="menu_block"><a href="<?php echo url_for('account', $sf_user->getGuardUser()); ?>">Профиль</a></div>
                <?php else: ?>
                    <div id="menu_block"><a href="<?php echo url_for('@sf_guard_signin'); ?>">Вход</a></div>
                    <div id="menu_block"><a href="<?php echo url_for('@sf_guard_register'); ?>">Регистрация</a></div>
                <?php endif; ?>
                    
                <div id="menu_block"><a href="<?php echo url_for('@project'); ?>">Проекты</a></div>
                <!--
                <div id="menu_block"><a href="#">Магазин</a></div>
                <div id="menu_block"><a href="#">Статистика</a></div>
                <div id="menu_block"><a href="#">Работа</a></div>
                <div id="menu_block"><a href="#">Форум</a></div>
                <div id="menu_block"><a href="#">Публикации</a></div>
                -->
                
                <!-- --search_block
                <div id="search_block">
                	<form action="#" method="post">
                    	<input type="search" name="search" value="Введите текст" class="search_field" />
                    </form>
                </div>
                -->
                <div id="clear"></div>
            </div><!-- #menu -->
        </div><!-- #header -->
    	
        <div id="content">
            <div id="left">
            	<h4>Каталог фрилансеров</h4>
                <h5>По специализациям</h5>
                
                <ul class="ul_catalog_list_specs">
                	<li>1C специалист</li>
                	<li>
                    	Дизайн сайта<br />
						<ul class="ul_catalog_list_items">
                        	<li>
                            	<table width="100%" border="0">
                                	<tr>
                                    	<td width="50">
                                        	<a href="#"><img src="/images/avatar.jpg" class="img_catalog_logo" /></a>
                                        </td>
                                        <td>
                                        	<table width="100%" border="0">
                                            	<tr><td class="ul_catalog_list_items_table_nick">Максим Максимыч [maximich]</td></tr>
                                                <tr><td class="ul_catalog_list_items_table_spec">дизайн сайтов</td></tr>
                                                <tr><td><a href="#" class="ul_catalog_list_items_table_spec">Подробнее -></a></td></tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </li>
                            
                            
                            <!-- repeats -->
                        	<li>
                            	<table width="100%" border="0">
                                	<tr>
                                    	<td width="50">
                                        	<a href="#"><img src="/images/avatar.jpg" class="img_catalog_logo" /></a>
                                        </td>
                                        <td>
                                        	<table width="100%" border="0">
                                            	<tr><td class="ul_catalog_list_items_table_nick">Максим Максимыч [maximich]</td></tr>
                                                <tr><td class="ul_catalog_list_items_table_spec">дизайн сайтов</td></tr>
                                                <tr><td><a href="#" class="ul_catalog_list_items_table_spec">Подробнее -></a></td></tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </li>
                            
                        	<li>
                            	<table width="100%" border="0">
                                	<tr>
                                    	<td width="50">
                                        	<a href="#"><img src="/images/avatar.jpg" class="img_catalog_logo" /></a>
                                        </td>
                                        <td>
                                        	<table width="100%" border="0">
                                            	<tr><td class="ul_catalog_list_items_table_nick">Максим Максимыч [maximich]</td></tr>
                                                <tr><td class="ul_catalog_list_items_table_spec">дизайн сайтов</td></tr>
                                                <tr><td><a href="#" class="ul_catalog_list_items_table_spec">Подробнее -></a></td></tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </li>
                            
                        	<li>
                            	<table width="100%" border="0">
                                	<tr>
                                    	<td width="50">
                                        	<a href="#"><img src="/images/avatar.jpg" class="img_catalog_logo" /></a>
                                        </td>
                                        <td>
                                        	<table width="100%" border="0">
                                            	<tr><td class="ul_catalog_list_items_table_nick">Максим Максимыч [maximich]</td></tr>
                                                <tr><td class="ul_catalog_list_items_table_spec">дизайн сайтов</td></tr>
                                                <tr><td><a href="#" class="ul_catalog_list_items_table_spec">Подробнее -></a></td></tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </li>
                            
                            
                            <!-- end repeats -->
                            
                            
                        </ul>
					</li>
                    <li>
                    	Бухгалтер<br />
                        <ul class="ul_catalog_list_items">
                        	<li>
                            	<table width="100%" border="0">
                                	<tr>
                                    	<td width="50">
                                        	<a href="#"><img src="/images/avatar.jpg" class="img_catalog_logo" /></a>
                                        </td>
                                        <td>
                                        	<table width="100%" border="0">
                                            	<tr><td class="ul_catalog_list_items_table_nick">Максим Максимыч [maximich]</td></tr>
                                                <tr><td class="ul_catalog_list_items_table_spec">дизайн сайтов</td></tr>
                                                <tr><td><a href="#" class="ul_catalog_list_items_table_spec">Подробнее -></a></td></tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </li>
                       </ul>
					</li>
                    <li>Юрист</li>
                </ul>
            </div><!-- #left -->
            
            <!-- Центральная часть сайта -->
            <div id="center">
                
                <!-- Ошибки -->
                <?php if($sf_user->hasFlash('notice')): ?>
                    <div id="notice" class="error">
                        <?php echo $sf_user->getFlash('notice'); ?>
                    </div>
                <?php endif; ?>

                <?php if($sf_user->hasFlash('notice_notification')): ?>
                    <div id="notice" class="notification">
                        <?php echo $sf_user->getFlash('notice_notification'); ?>
                    </div>
                <?php endif; ?>
                
                <div id="sf_content_block">
                    <?php echo $sf_content; ?>
                </div>
                
            </div><!-- #center -->
            
            <div id="clear"></div>
        </div><!-- #content -->
        
        <div id="footer">
            <div id="footer_links">
                <table width="90%" border="0">
                    <tr>
                        <td>Услуги</td>
                        <td>О проекте</td>
                        <td>Помощь</td>
                    </tr>
                    <tr>
                    	<td>
                        	<a href="#">Главная</a><br />
							<a href="#">Профессиональный аккаунт</a><br />
                            <a href="#">Платное место на главной странице</a><br />
                            <a href="#">Платное место в каталоге фрилансеров</a><br />
                            <a href="#">Магазин</a><br />
                            <a href="#">Безопасная сделка</a>
                        </td>
                    	<td>
                        	<a href="#">Реклама</a><br />
							<a href="#">Контакты</a><br />
                            <a href="#">Правила сайта</a><br />
                            <a href="#">Пользовательское соглашение</a><br />
                            <a href="<?php echo url_for('@about'); ?>">Описание проекта</a><br />
                            <a href="#">Положение по обеспечению</a>
                        </td>
                    	<td valign="top">
                        	<a href="#">Служба поддержки</a><br />
							<a href="#">Консультант</a><br />
                            <a href="#">Безопасность персональных данных</a>
                        </td>
                    </tr>
                </table>
            </div><!-- #footer_links -->
            
            <div id="footer_copyrights">
            	Copyright&copy; 1CRegion.ru, 2012
            </div>
            
            <div id="clear"></div>
        </div>
	</div><!-- #container -->
    

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
(function (d, w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter14044600 = new Ya.Metrika({id:14044600,
                    clickmap:true,
                    trackLinks:true});
        } catch(e) {}
    });
    
    var n = d.getElementsByTagName("script")[0],
        s = d.createElement("script"),
        f = function () { n.parentNode.insertBefore(s, n); };
    s.type = "text/javascript";
    s.async = true;
    s.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//mc.yandex.ru/metrika/watch.js";

    if (w.opera == "[object Opera]") {
        d.addEventListener("DOMContentLoaded", f);
    } else { f(); }
})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="//mc.yandex.ru/watch/14044600" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

  </body>
</html>