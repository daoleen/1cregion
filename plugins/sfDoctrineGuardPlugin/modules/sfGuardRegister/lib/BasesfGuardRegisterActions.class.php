<?php

class BasesfGuardRegisterActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    if ($this->getUser()->isAuthenticated())
    {
      $this->getUser()->setFlash('notice', 'You are already registered and signed in!');
      $this->redirect('@homepage');
    }

    $this->form = new sfGuardRegisterForm();

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter($this->form->getName()));
      if ($this->form->isValid())
      {
        $user = $this->form->save();

        $groupId = $this->form->getValue('group');
        if($this->form->isNew()) {
            $ug = new sfGuardUserGroup();
            $ug->setUserId($user->getId());
            $ug->setGroupId($groupId);
            $ug->save();
        }
        else {
            $ug = sfGuardUserGroupTable::getInstance()->createQuery('q')
                    ->where('q.user_id = ?', $user->getId())->execute();
            $ug->setGroupId($groupId);
            $us->save();
        }
        //$this->getUser()->signIn($user);

        $this->sendmail($user, $this->form->getValue('password'));
        $this->getUser()->setFlash('notice_notification', 'На ваш E-mail были высланы инструкции для активации аккаунта');
        $this->redirect('@homepage');
      }
    }
  }
  
  
public function sendmail($user, $password) {
      $token = Helper::getUserActivationToken($user->getUsername(), $user->getEmailAddress());
      $message = $this->getMailer()->compose(
              array("admin@1cregion.ru" => "1cregion.ru"),
              $user->getEmailAddress(),
              'Успешная регистрация',
<<<EOF
Вы успешно зарегистрировались на сайте http://{$_SERVER['HTTP_HOST']}/
Данные для входа в систему:
Логин: {$user->getUsername()}
Пароль: {$password}.

Обращаем ваше внимание, что на сайте требуется активация вашего профиля.
Для активации перейдите по ссылке: 
http://{$_SERVER['HTTP_HOST']}/activate/{$user->getUsername()}/token={$token}
EOF
      );

      $message->setCharset('utf-8');
      $this->getMailer()->send($message);
  }
}