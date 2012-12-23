<?php

class CatalogComponents extends sfComponents
{
    public function executeCatalog()
    {
        $result = array();
        $countUsers = sfConfig::get('app_count_component_catalog_users', 3);
        $categories = CategoryTable::getInstance()->createQuery('c')->execute();
        
        foreach ($categories as $i => $category) {
            $result[$i][0] = $category;
            $result[$i][1] = $category->getTopUsersByCategory($countUsers);
            
//            if(sizeof($result[$i][1]) > 0) {
//                foreach ($result[$i][1] as $user) {
//                    echo $user->User."<br>";
//                }
//                exit;
//            }
        }
        
        $this->topUsers = $result;
    }
}

?>
