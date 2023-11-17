<?php

namespace App\Rules;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TelegramHelper
{
    public static function sendNotification($message)
    {
        $telegramBotToken = env('TELEGRAM_BOT_TOKEN');

        $chatId = env('TELEGRAM_CHAT_ID');

        $ipAddress = $_SERVER['REMOTE_ADDR'];

        $authName = Auth::check() ? Auth::user()->name : "Guest";

        $message = "Có người truy cập web: $ipAddress | $authName";

        $telegramApiUrl = "https://api.telegram.org/bot$telegramBotToken/sendMessage";

        // Dữ liệu gửi đến API
        $data = [
            'chat_id' => $chatId,
            'text' => $message,
        ];

        // cURL để gửi request
        $ch = curl_init($telegramApiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
    }
}
