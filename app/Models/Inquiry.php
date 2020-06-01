<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;

class Inquiry
{
    use Notifiable;

    private string $name;
    private string $email;
    private string $message;

    /**
     * コンストラクタ
     *
     * @param array $attributes
     */
    public function __construct(array $attributes)
    {
        foreach ($attributes as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Slackチャンネルに対する通知をルートする
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForSlack($notification): string
    {
        return config('services.slack.inquiry');
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function __get(string $name)
    {
        if (!property_exists($this, $name)) {
            throw new \Exception("Not found '${name}'.");
        }

        return $this->$name;
    }
}