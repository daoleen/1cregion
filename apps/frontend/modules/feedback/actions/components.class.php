<?php
class FeedbackComponents extends sfComponents {    
    public function executeFeedback() {
        $this->form = new FeedbackForm();
        // $this->project
        $this->form->setDefaults(array(
            'project_id' => $this->project->getId(),
            'owner_id'  => sfContext::getInstance()->getUser()->getGuardUser()->getId(),
            'user_id'    => $this->to->getId()
        ));
    }
}
?>