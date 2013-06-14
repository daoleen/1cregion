<?php

/**
 * sfGuardUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    1CRegion.ru
 * @subpackage model
 * @author     Alex Kozlov <alexssource@gmail.com>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class sfGuardUser extends PluginsfGuardUser
{
    public static function getByUsername($username) {
        $query = sfGuardUserTable::getInstance()->createQuery('u')
                ->where('u.username = ?', $username);
        return $query->fetchOne();
    }
    
    
    public function getUnreadMessagesCount() {
        return Messages::getUnreadMessagesCount($this->getId());
    }
}
