<?php use_stylesheet('portfolio.css'); ?>
<h1 class="portfolio_title">Портфолио пользователя <?php echo $user; ?></h1>

<?php foreach($categories as $category): ?>
    <?php $works = $category->getUserPortfolioWorks($user->getId()); ?>
    <?php if($works->count() != 0): ?>
       
<div id="category_works">
            <h3>Категория: <?php echo $category; ?></h3>
            <?php for($i = 0; $i < $works->count(); $i+=3): ?>
    <div id="works_line">
        <div id="work">
            <?php if($works[$i]->getLink()): ?>
                <a class="work_name" href="<?php echo $works[$i]->getLink(); ?>"><?php echo $works[$i]->getName(); ?></a><br />
            <?php else: ?>
                <a class="work_name" href="<?php echo url_for('portfolio_show', $works[$i]); ?>"><?php echo $works[$i]->getName(); ?></a><br />
            <?php endif; ?>
                
            <?php if($works[$i]->getCost()): ?>
                <span class="work_cost">Стоимость: <?php echo $works[$i]->getCost(); ?>&nbsp;<?php echo $works[$i]->CostCurrency; ?></span><br />
            <?php endif; ?>
            
            <?php if($works[$i]->getImage()): ?>
                <img class="img_work" src="<?php echo sfConfig::get('app_userfiles_path').$works[$i]->getImage(); ?>" alt="<?php echo $works[$i]->getName(); ?>" />
            <?php else: ?>
                <img class="img_work" src="<?php echo sfConfig::get('app_default_workimage_path'); ?>" alt="<?php echo $works[$i]->getName(); ?>" />
            <?php endif; ?>
                
            <p class="work_description"><?php echo $works[$i]->getDescription(); ?></p>
            <a class="details_link" href="<?php echo url_for('portfolio_show', $works[$i]); ?>">Подробнее...</a>
        </div>
        
        <?php if(isset($works[$i+1])): ?>
            <div id="work">
                <?php if($works[$i+1]->getLink()): ?>
                    <a class="work_name" href="<?php echo $works[$i+1]->getLink(); ?>"><?php echo $works[$i+1]->getName(); ?></a><br />
                <?php else: ?>
                    <a class="work_name" href="<?php echo url_for('portfolio_show', $works[$i+1]); ?>"><?php echo $works[$i+1]->getName(); ?></a><br />
                <?php endif; ?>
                
                <?php if($works[$i+1]->getCost()): ?>
                    <span class="work_cost">Стоимость: <?php echo $works[$i+1]->getCost(); ?>&nbsp;<?php echo $works[$i+1]->CostCurrency; ?></span><br />
                <?php endif; ?>

                <?php if($works[$i+1]->getImage()): ?>
                    <img class="img_work" src="<?php echo '/uploads/UserFiles/'.$works[$i+1]->getImage(); ?>" alt="<?php echo $works[$i+1]->getName(); ?>" />
                <?php else: ?>
                    <img class="img_work" src="<?php echo sfConfig::get('app_default_workimage_path'); ?>" alt="<?php echo $works[$i+1]->getName(); ?>" />
                <?php endif; ?>
                
                <p class="work_description"><?php echo $works[$i+1]->getDescription(); ?></p>
                <a class="details_link" href="<?php echo url_for('portfolio_show', $works[$i+1]); ?>">Подробнее...</a>
            </div>
        <?php endif; ?>
        
        <?php if(isset($works[$i+2])): ?>
            <div id="work">
                <?php if($works[$i+2]->getLink()): ?>
                    <a class="work_name" href="<?php echo $works[$i+2]->getLink(); ?>"><?php echo $works[$i+2]->getName(); ?></a><br />
                <?php else: ?>
                    <a class="work_name" href="<?php echo url_for('portfolio_show', $works[$i+2]); ?>"><?php echo $works[$i+2]->getName(); ?></a><br />
                <?php endif; ?>
                
                <?php if($works[$i+2]->getCost()): ?>
                    <span class="work_cost">Стоимость: <?php echo $works[$i+2]->getCost(); ?>&nbsp;<?php echo $works[$i+2]->CostCurrency; ?></span><br />
                <?php endif; ?>

                <?php if($works[$i+2]->getImage()): ?>
                    <img class="img_work" src="<?php echo '/uploads/UserFiles/'.$works[$i+2]->getImage(); ?>" alt="<?php echo $works[$i+2]->getName(); ?>" />
                <?php else: ?>
                    <img class="img_work" src="<?php echo sfConfig::get('app_default_workimage_path'); ?>" alt="<?php echo $works[$i+2]->getName(); ?>" />
                <?php endif; ?>
                
                <p class="work_description"><?php echo $works[$i+2]->getDescription(); ?></p>
                <a class="details_link" href="<?php echo url_for('portfolio_show', $works[$i+2]); ?>">Подробнее...</a>
            </div>
        <?php endif; ?>
        
        <div id="clear"></div>
    </div>
    <?php endfor; ?>
</div>       
        <?php endif; ?>

<?php endforeach; ?>


<?php if($sf_user->getGuardUser() == $user): ?>
  <div id="portfolio_navigation">
    <a class="link_portfolio_nav" href="<?php echo url_for('portfolio_new', $sf_user->getGuardUser()); ?>">Добавить работу</a>
  </div>
<?php endif; ?>
