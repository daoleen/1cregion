<h4>Каталог фрилансеров</h4>
<h5>По специализациям</h5>

<ul class="ul_catalog_list_specs">
    <?php foreach ($topUsers as $topCategory): ?>
        <li>
            <?php echo $topCategory[0]; ?><br />
            <?php if (sizeof($topCategory[1]) > 0): ?>
                <ul class="ul_catalog_list_items">
                    <?php foreach ($topCategory[1] as $topUser): ?>
                        <li>
                            <table width="100%" border="0">
                                <tr>
                                    <td width="50">
                                        <a href="<?php echo url_for('account', $topUser->User); ?>"><img src="<?php echo ($avatar = $topUser->getAvatar()) ? sfConfig::get('app_avatar_dir').$avatar : sfConfig::get('app_default_avatar_path'); ?>" class="avatar" alt="avatar" align="left" /></a>
                                    </td>
                                    <td>
                                        <table width="100%" border="0">
                                            <tr><td class="ul_catalog_list_items_table_nick"><?php echo $topUser->User; ?></td></tr>
                                            <tr><td class="ul_catalog_list_items_table_spec"><?php echo $topCategory[0]; ?></td></tr>
                                            <tr><td><a href="<?php echo url_for('account', $topUser->User); ?>" class="ul_catalog_list_items_table_spec">Подробнее -></a></td></tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>