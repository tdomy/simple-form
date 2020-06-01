<?php

namespace App\Notifications;

use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class Inquired extends Notification
{
    use Queueable;

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

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * 通知のSlackプレゼンテーションを取得
     *
     * @param  Inquiry  $inquiry
     * @return SlackMessage
     */
    public function toSlack(Inquiry $inquiry)
    {
        return (new SlackMessage)
                ->success()
                ->content(sprintf("%s<%s>さんから問い合わせがありました。", $inquiry->name, $inquiry->email))
                ->attachment(function ($attachment) use ($inquiry) {
                    $attachment->content($inquiry->message);
                });
    }
}
