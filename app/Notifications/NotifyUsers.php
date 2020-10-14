<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifyUsers extends Notification implements ShouldQueue
{
    use Queueable;

    public $ID_Survey;
    public $Title;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id,$title)
    {
    
        $this->ID_Survey = $id;
        
        $this->Title = $title;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Hello form Kadri Zeka University!')
                    ->subject("New Survey")
                    ->line('Ukz-platform created a new survey called: '. $this->Title)
                    ->action('Take Survey', url('/Question/'.$this->ID_Survey))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
