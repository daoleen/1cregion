<?php

/**
 * Category
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    1CRegion.ru
 * @subpackage model
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Category extends BaseCategory
{
    public function getUserPortfolioWorks($user_id) {
        //$works = $this->getPortfolioWorks();
        /*
        $works = $this->getTable()->createQuery('c')
                ->where('c.PortfolioWorks.category_id = ?', $this->getId())
                ->andWhere('c.PortfolioWorks.user_id = ?', $user_id);
        return $works->fetchOne();
         */
        
        $q = PortfolioWorkTable::getInstance()->createQuery('p')
                ->where('p.category_id = ?', $this->getId())
                ->andWhere('p.user_id = ?', $user_id);
        return $q->execute();
    }
    
    
    /**
     * Получение топ {$limit}-фрилансеров для текущей категории
     * @param int $limit
     * @return Doctrine_Collection<Account>
     */
    public function getTopUsersByCategory($limit)
    {
        $q = AccountTable::getInstance()->createQuery('a')
                ->where('a.Categories.id=?',$this->getId())
                ->limit($limit)
                ->orderBy('a.rating desc');
        // TODO: ADD a migration RATING to Account!!!
        return $q->execute();
    }
}
