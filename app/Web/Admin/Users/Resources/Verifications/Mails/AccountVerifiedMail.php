<?php

namespace App\Web\Admin\Users\Resources\Verifications\Mails;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccountVerifiedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = sprintf('%s | %s',
            config('app.name'),
            __('web/admin/users/resources/verification.change_verification_status.mail_account_verified_subject')
        );
        return $this
            ->subject($subject)
            ->view('web.admin.users.resources.verifications.mails.account-verified');
    }
}
