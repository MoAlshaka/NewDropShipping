<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CreateTransaction extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $amount;
    public $status;
    public $payment_method;
    public $account_number;

    public function __construct($amount, $status, $payment_method, $account_number)
    {
        $this->amount = $amount;
        $this->status = $status;
        $this->payment_method = $payment_method;
        $this->account_number = $account_number;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'amount' => $this->amount,
            'status' => $this->status,
            'payment_method' => $this->payment_method,
            'account_number' => $this->account_number,

        ];
    }
}
