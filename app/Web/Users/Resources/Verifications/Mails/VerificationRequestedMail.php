<?php

namespace App\Web\Users\Resources\Verifications\Mails;

use App\Models\User;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationRequestedMail extends Mailable
{
    use SerializesModels;

    /**
     * Needs to be public to be accessable in view
     */
    public $user;
    private $filePath;

    public function __construct(User $user, string $filePath)
    {
        $this->user = $user;
        $this->filePath = $filePath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject(sprintf('[%s] Verification requested', $this->user->username))
            ->view('web.users.resources.verifications.mails.verification-requested-mail')
            ->attach($this->filePath);
    }
}