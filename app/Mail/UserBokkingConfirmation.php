<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserBokkingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    private $user_name  = "";
    private $user_email = "";
    private $event_title = "";
    private $event_category = "";
    private $published_at = "";
    private $event_location = "";
    private $user_number = "";
    private $event_cost = "";
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_name,$user_email,$event_title,$event_category,$published_at,$event_location,$user_number,$event_cost)
    {

        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->event_title = $event_title;
        $this->event_category = $event_category;
        $this->published_at = $published_at;
        $this->event_location = $event_location;
        $this->user_number = $user_number;
        $this->event_cost = $event_cost;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('front_page.confirmation_email',[
            'user_name' => $this->user_name,
            'user_email' => $this->user_email,
            'event_title' => $this->event_title,
            'event_category' => $this->event_category,
            'published_at' => $this->published_at,
            'event_location' => $this->event_location,
            'user_number' => $this->user_number,
            'event_cost' => $this->event_cost
        ]);
    }
}
