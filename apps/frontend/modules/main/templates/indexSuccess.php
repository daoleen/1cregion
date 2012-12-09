<?php use_stylesheet('main_page.css'); ?>

<div id="beautiful_top">&nbsp;</div>
<div id="beautiful_about_freelance">
        <img src="/images/freelance_working.jpg" width="343" />
    <div id="freelance_working_content">
        Фриланс (freelance), т.е. удаленная работа с помощью сети Интернет, становится все более и более популярной. У такого метода работы есть свои преимущества и недостатки, но на данный момент фриланс как форма трудоустройства, особенно в небольших и удаленных от столицы городах, часто является для специалиста единственной возможностью найти работу, позволяющую полностью реализовать свой профессиональный потенциал и получить за это достойную оплату.
    </div>
</div><!-- #beautiful_about_freelance -->
<div id="clear"></div>


<!-- TODO after some times
<div id="articles_block">
        <div id="title_section">
        <img src="/images/articles_section.gif" width="168" height="38" />
    </div>

    <div id="articles_block_article">
        <table width="100%" border="0">
                <tr>
                <td colspan="2">
                        <a href="#">Подсистема оповещения о событиях создания или изменения объектов</a>
                </td>
            </tr>
                <tr>
                <td colspan="2" class="text_bold">
                        24.04.2012
                </td>
            </tr>
                <tr>
                <td colspan="2">
                <img src="/images/article_cont.jpg" width="93" height="94" align="left" />
                Подсистема оповещения на почту пользователей о создании новых элементов справочников, проведении документов, установке и снятии пометок на удаление на объекты, настраиваемое по отбору изменение ре...</td>
            </tr>
            <tr>
                <td align="left">
                        &copy; fuxic 25 [+]
                </td>
                <td align="right">
                        Комментарии: 7
                </td>
            </tr>
        </table>
    </div>


    <div id="articles_block_article">
        <table width="100%" border="0">
                <tr>
                <td colspan="2">
                        <a href="#">Подсистема оповещения о событиях создания или изменения объектов</a>
                </td>
            </tr>
                <tr>
                <td colspan="2" class="text_bold">
                        24.04.2012
                </td>
            </tr>
                <tr>
                <td colspan="2">
                <img src="/images/article_cont.jpg" width="93" height="94" align="left" />
                Подсистема оповещения на почту пользователей о создании новых элементов справочников, проведении документов, установке и снятии пометок на удаление на объекты, настраиваемое по отбору изменение ре...</td>
            </tr>
            <tr>
                <td align="left">
                        &copy; fuxic 25 [+]
                </td>
                <td align="right">
                        Комментарии: 7
                </td>
            </tr>
        </table>
    </div>



                        <div id="articles_block_article">
        <table width="100%" border="0">
                <tr>
                <td colspan="2">
                        <a href="#">Подсистема оповещения о событиях создания или изменения объектов</a>
                </td>
            </tr>
                <tr>
                <td colspan="2" class="text_bold">
                        24.04.2012
                </td>
            </tr>
                <tr>
                <td colspan="2">
                <img src="/images/article_cont.jpg" width="93" height="94" align="left" />
                Подсистема оповещения на почту пользователей о создании новых элементов справочников, проведении документов, установке и снятии пометок на удаление на объекты, настраиваемое по отбору изменение ре...</td>
            </tr>
            <tr>
                <td align="left">
                        &copy; fuxic 25 [+]
                </td>
                <td align="right">
                        Комментарии: 7
                </td>
            </tr>
        </table>
    </div>


    <div id="clear"></div>
</div>
--><!-- articles_block -->


<div id="topworking_block">
        <div id="title_section">
        <img src="/images/topworking.gif" width="168" height="38" />
    </div>

    <table width="100%" border="0">
        <!--
        <tr>
                <td width="28" valign="middle"><img src="/images/working_left.gif" width="28" height="77" /></td>
                <td width="175" align="center"><img src="/images/userwork.gif" width="165" height="198" /></td>
                <td width="175" align="center"><img src="/images/userwork.gif" width="165" height="198" /></td>
                <td width="175" align="center"><img src="/images/userwork.gif" width="165" height="198" /></td>
                <td width="26" valign="middle"><img src="/images/working_right.jpg" width="26" height="76" /></td>
        </tr>
        -->

        <?php foreach($topWorks as $i => $work): ?>
            <?php if( ($i) % 3 == 0): ?>
                <tr>
                    <td width="28" valign="middle"><img src="/images/working_left.gif" width="28" height="77" /></td>
            <?php endif; ?>
                <td width="175" align="center">
                    <a href="<?php echo url_for('portfolio_show', $work); ?>">
                        <?php if($work->getImage()): ?>
                            <img class="img_work" src="<?php echo sfConfig::get('app_userfiles_path').$work->getImage(); ?>" alt="<?php echo $work->getName(); ?>" />
                        <?php else: ?>
                            <img class="img_work" src="<?php echo sfConfig::get('app_default_workimage_path'); ?>" alt="<?php echo $work->getName(); ?>" />
                        <?php endif; ?>
                    </a>
                </td>
            <?php if( ($i+1) % 3 == 0): ?>
                    <td width="26" valign="middle"><img src="/images/working_right.jpg" width="26" height="76" /></td>
                </tr>
            <?php endif; ?>
        <?php endforeach; ?>
        
    </table>                    
</div><!-- #topworking_block -->