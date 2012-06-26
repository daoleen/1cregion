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
        
        $this->validatorSchema['username'] = new sfValidatorAnd(
                array(
                    $this->validatorSchema['username'], 
                    new sfValidatorString(
                            array('min_length' => 5, 'max_length' => 15), 
                            array('min_length' => 'Минимальная длина поля - 5 символов',
                                'max_length' => 'Максимальная длина поля - 15 символов')
        )));
        
        $this->validatorSchema['first_name'] = new sfValidatorAnd(
                array(
                    $this->validatorSchema['first_name'], 
                    new sfValidatorString(
                            array('min_length' => 3, 'max_length' => 20), 
                            array('min_length' => 'Минимальная длина поля - 3 символов',
                                'max_length' => 'Максимальная длина поля - 20 символов')
        )));
        
        $this->validatorSchema['last_name'] = new sfValidatorAnd(
                array(
                    $this->validatorSchema['last_name'], 
                    new sfValidatorString(
                            array('min_length' => 3, 'max_length' => 20), 
                            array('min_length' => 'Минимальная длина поля - 3 символов',
                                'max_length' => 'Максимальная длина поля - 20 символов')
        )));
        
        $this->validatorSchema['password'] = new sfValidatorAnd(
                array(
                    $this->validatorSchema['password'], 
                    new sfValidatorString(
                            array('min_length' => 6, 'max_length' => 20), 
                            array('min_length' => 'Минимальная длина поля - 6 символов',
                                'max_length' => 'Максимальная длина поля - 20 символов')
        )));
        
        $this->widgetSchema->setHelp('username', 'От 5 до 15 символов. Может содержать латинские буквы, цифры, подчеркивание');
        $this->widgetSchema->setHelp('first_name', 'Не более 20 символов');
        $this->widgetSchema->setHelp('last_name', 'Не более 20 символов');
        $this->widgetSchema->setHelp('email_address', 'Вводите верный адрес почты, она нужна для подтверждения регистрации');
        $this->widgetSchema->setHelp('password', 'От 6 до 20 символов. Может содержать латинские буквы, цифры, подчеркивание');
        $this->widgetSchema->setHelp('password_again', 'Повторите введенный выше пароль');
        
        $choices = array();
        $groups = sfGuardGroup::getGroupsNotAdminArray();
        foreach ($groups as $group) {
            $choices[$group->getId()] = $group->getName();
        }
        
        //$this->setWidget('group',  new sfWidgetFormChoice(array('choices' => $choices)));     
        $this->setWidget('group', new sfWidgetFormSelectRadio(array('choices' => $choices)));
        $this->widgetSchema['group']->setLabel("Тип аккаунта");
        $this->widgetSchema['group']->setDefault($groups[0]->getId());
        
        $this->validatorSchema['group'] = new sfValidatorChoice(array('choices' => array_keys($choices)));
    }
    
    public function getStylesheets() {
        return array('registration.css' => null);
    }
}
?>