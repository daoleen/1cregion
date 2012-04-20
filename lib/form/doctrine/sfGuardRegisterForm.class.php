<?php
class sfGuardRegisterForm extends BasesfGuardRegisterForm
{
    public function configure()
    {
        parent::configure();
        
        $this->widgetSchema['username']->setLabel('Логин');
        $this->widgetSchema['first_name']->setLabel('Имя');
        $this->widgetSchema['last_name']->setLabel('Фамилия');
        $this->widgetSchema['email_address']->setLabel('Email');
        $this->widgetSchema['password']->setLabel('Пароль');
        $this->widgetSchema['password_again']->setLabel('Повтор пароля');
        
        $choices = array();
        $groups = sfGuardGroup::getGroupsNotAdminArray();
        foreach ($groups as $group) {
            $choices[$group->getId()] = $group->getName();
        }
        
        $this->setWidget('group',  new sfWidgetFormChoice(array('choices' => $choices)));
        $this->widgetSchema['group']->setLabel("Тип аккаунта");
        
        $this->validatorSchema['group'] = new sfValidatorChoice(array('choices' => array_keys($choices)));
    }
}
?>
