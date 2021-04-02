<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserAddedToTeam extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // $data =  json_encode($data);
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $members = $this->data['members'];
        $projects = $this->data['projects'];
        $teamName = $this->data['teamName'];
        $teamDesc = $this->data['teamDesc'];
        $owner = $this->data['user']['name'];
        $owner_isVerified = $this->data['user']['isVerified'];
        $user = $this->data['member']['name'];
        $user_isVerified = $this->data['member']['isVerified'];
        return $this
            ->subject('Invitation to Join Team')
            ->with([
                'members' => $members,
                'projects' => $projects,
                'teamName' => $teamName,
                'teamDesc' => $teamDesc,
                'owner' => $owner,
                'owner_isVerified' => $owner_isVerified,
                'user' => $user,
                'user_isVerified' => $user_isVerified,
            ])
            ->markdown('emails.teams.useradded');
    }
}
