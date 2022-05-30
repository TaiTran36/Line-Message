<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MessageServiceProvider extends ServiceProvider
{
    const CONTENT_ADD_NEW_FRIEND = "Thanks, let's create remote office account from this URL: ";

    public function __construct($app)
    {
        parent::__construct($app);
    }

    public static function prepareMessageSendUserId($lineUserId, $content){

        return MessageServiceProvider::createData($lineUserId, MessageServiceProvider::createText($content));
    }

    public static function prepareMessageActiveAccount($userId, $content){

        return MessageServiceProvider::createData($userId, MessageServiceProvider::createTextActive($content));
    }

    public static function prepareMessageReservation($userId, $content, $storeAddress){

        return MessageServiceProvider::createData($userId, MessageServiceProvider::createTextActive($content. 'https://www.google.com/maps/place/' . preg_replace("/\s/", "%20", $storeAddress) . '/'));
    }

    public static function createText($contentURL){
        $imageURL = env('WP_HOST') . 'wp-content/themes/remote-office/assets/images/line_mess.jpg';
        return [
            [ 'type' => 'text', 'text' => $contentURL],
            ['type' => 'image', 'originalContentUrl'=>  $imageURL, 'previewImageUrl' => $imageURL]
        ];
    }

    public static function createTextActive($content){
        return [ [ 'type' => 'text', 'text' => $content ]];
    }

    public static function createData($userId, $text){
        return [ "to" =>  $userId, "messages" => $text];
    }


}
