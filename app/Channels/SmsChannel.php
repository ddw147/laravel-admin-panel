<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;

use Illuminate\Support\Facades\Log;
class SmsChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toSms($notifiable);

        // Send notification to the $notifiable instance...
              
         Log::info($message);
         Log::info($notifiable->mobile);


    }


}