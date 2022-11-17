<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserAccountStatusMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
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
        $tempUser = User::where('id',$this->user->id)->first();


        if($tempUser){

            //active or deactive view for active , deactive status
            return $this->markdown('email.user_account_status');
        }
        else{
            //delete view for account  delect notification
            return $this->markdown('email.user_account_delete');
        }
    }
}
