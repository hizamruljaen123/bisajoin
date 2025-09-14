<?php

namespace App\Libraries;

class TelegramBot
{
    private $botToken;
    private $chatId;
    private $apiUrl = 'https://api.telegram.org/bot';

    public function __construct()
    {
        $this->botToken = getenv('telegram.bot_token');
        $this->chatId = getenv('telegram.chat_id');
        
        if (empty($this->botToken) || empty($this->chatId)) {
            throw new \Exception('Telegram bot token or chat ID not configured');
        }
    }

    /**
     * Send message to Telegram
     */
    public function sendMessage($message, $parseMode = 'HTML')
    {
        $url = $this->apiUrl . $this->botToken . '/sendMessage';
        
        $data = [
            'chat_id' => $this->chatId,
            'text' => $message,
            'parse_mode' => $parseMode
        ];

        $response = $this->sendRequest($url, $data);
        
        return json_decode($response, true);
    }

    /**
     * Send order notification
     */
    public function sendOrderNotification($orderData, $orderType)
    {
        $message = $this->formatOrderMessage($orderData, $orderType);
        
        return $this->sendMessage($message);
    }

    /**
     * Send payment notification
     */
    public function sendPaymentNotification($paymentData, $orderData, $orderType)
    {
        $message = $this->formatPaymentMessage($paymentData, $orderData, $orderType);
        
        return $this->sendMessage($message);
    }

    /**
     * Format order message
     */
    private function formatOrderMessage($orderData, $orderType)
    {
        $orderCode = $orderData['code'];
        $contact = $orderData['contact'];
        $status = $orderData['status'];
        
        $message = "<b>🎉 New Order Received!</b>\n\n";
        $message .= "<b>Order Code:</b> {$orderCode}\n";
        $message .= "<b>Type:</b> " . ucfirst($orderType) . "\n";
        $message .= "<b>Status:</b> " . ucfirst($status) . "\n";
        $message .= "<b>Contact:</b> {$contact}\n\n";
        
        // Add specific details based on order type
        switch ($orderType) {
            case 'wedding':
                $message .= "<b>Details:</b>\n";
                $message .= "• Groom: {$orderData['groom_name']}\n";
                $message .= "• Bride: {$orderData['bride_name']}\n";
                $message .= "• Date: " . date('d F Y', strtotime($orderData['wedding_date'])) . "\n";
                $message .= "• Time: {$orderData['wedding_time']}\n";
                $message .= "• Location: {$orderData['location']}\n";
                break;
                
            case 'engagement':
                $message .= "<b>Details:</b>\n";
                $message .= "• Man: {$orderData['man_name']}\n";
                $message .= "• Woman: {$orderData['woman_name']}\n";
                $message .= "• Date: " . date('d F Y', strtotime($orderData['engagement_date'])) . "\n";
                $message .= "• Time: {$orderData['engagement_time']}\n";
                $message .= "• Location: {$orderData['location']}\n";
                break;
                
            case 'birthday':
                $message .= "<b>Details:</b>\n";
                $message .= "• Person: {$orderData['birthday_person_name']}\n";
                if (!empty($orderData['age'])) {
                    $message .= "• Age: {$orderData['age']} years\n";
                }
                $message .= "• Date: " . date('d F Y', strtotime($orderData['birthday_date'])) . "\n";
                $message .= "• Time: {$orderData['birthday_time']}\n";
                $message .= "• Location: {$orderData['location']}\n";
                break;
                
            case 'graduation':
                $message .= "<b>Details:</b>\n";
                $message .= "• Graduate: {$orderData['graduate_name']}\n";
                if (!empty($orderData['faculty'])) {
                    $message .= "• Faculty: {$orderData['faculty']}\n";
                }
                $message .= "• Date: " . date('d F Y', strtotime($orderData['graduation_date'])) . "\n";
                $message .= "• Time: {$orderData['graduation_time']}\n";
                $message .= "• Location: {$orderData['location']}\n";
                break;
        }
        
        $message .= "\n<b>Invoice:</b> " . site_url("invoice/{$orderCode}");
        
        return $message;
    }

    /**
     * Format payment message
     */
    private function formatPaymentMessage($paymentData, $orderData, $orderType)
    {
        $orderCode = $orderData['code'];
        $amount = $paymentData['amount'];
        $method = $paymentData['method'];
        $status = $paymentData['status'];
        
        $message = "<b>💰 Payment Update!</b>\n\n";
        $message .= "<b>Order Code:</b> {$orderCode}\n";
        $message .= "<b>Amount:</b> Rp " . number_format($amount, 0, ',', '.') . "\n";
        $message .= "<b>Method:</b> " . ucfirst($method) . "\n";
        $message .= "<b>Status:</b> " . ucfirst($status) . "\n\n";
        
        if ($status === 'paid') {
            $message .= "<b>⚠️ Action Required:</b>\n";
            $message .= "Please verify the payment and activate the invitation.\n\n";
        } elseif ($status === 'verified') {
            $message .= "<b>✅ Payment Verified!</b>\n";
            $message .= "The invitation has been activated successfully.\n\n";
        }
        
        $message .= "<b>View Invoice:</b> " . site_url("invoice/{$orderCode}");
        
        return $message;
    }

    /**
     * Send HTTP request to Telegram API
     */
    private function sendRequest($url, $data)
    {
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($ch);
        
        if (curl_errno($ch)) {
            throw new \Exception('cURL error: ' . curl_error($ch));
        }
        
        curl_close($ch);
        
        return $response;
    }

    /**
     * Log message to database
     */
    public function logMessage($orderCode, $message)
    {
        $logModel = new \App\Models\TelegramLogModel();
        
        return $logModel->insert([
            'order_code' => $orderCode,
            'message' => $message,
            'sent_at' => date('Y-m-d H:i:s')
        ]);
    }

    /**
     * Send test message
     */
    public function sendTestMessage()
    {
        $message = "<b>🤖 Telegram Bot Test</b>\n\n";
        $message .= "The Telegram bot is working correctly!\n";
        $message .= "Timestamp: " . date('d F Y H:i:s');
        
        return $this->sendMessage($message);
    }
}