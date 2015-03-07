<?php namespace ThreeAccents\Projects\Mailers;

use ThreeAccents\Tools\Mailer\AbstractMailer;

class ProjectMailer extends AbstractMailer
{
    public function sendProposeeProjectProposal($project)
    {
        $this->sendTo($project->proposee->email, 'New Project Proposal Offer!', 'emails.projects.new-project-proposal', [
            'project_name' => $project->name,
            'project_description' => $project->description,
            'proposee' => $project->proposee->username,
            'proposer' => $project->proposer->username,
        ]);
    }

    public function sendProposerProjectDeclined($project)
    {
        $this->sendTo($project->proposer->email, 'New Project Proposal Offer!', 'emails.projects.project-proposal-declined', [
            'project_name' => $project->name,
            'project_description' => $project->description,
            'proposee' => $project->proposee->username,
            'proposer' => $project->proposer->username,
        ]);
    }

    public function sendProposerProjectAccepted($project)
    {
        $this->sendTo($project->proposer->email, 'New Project Proposal Offer!', 'emails.projects.project-proposal-accepted', [
            'project_name' => $project->name,
            'project_description' => $project->description,
            'proposee' => $project->proposee->username,
            'proposer' => $project->proposer->username,
        ]);
    }
}