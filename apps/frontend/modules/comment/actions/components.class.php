<?php

class commentComponents extends sfComponents
{
    public function executeShowcomments()
    {
        $query = CommentTable::getInstance()
                ->createQuery('c')
                ->where('c.project_id = ?', $this->project->getId());
        $this->comments = $query->execute();

        $this->form = new CommentForm();
        $this->form->setDefault('project_id', $this->project->getId());
    }
}

?>

