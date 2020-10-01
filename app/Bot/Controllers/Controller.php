<?php

namespace App\Bot\Controllers;

use Viber\Api\Keyboard;
use Viber\Api\Sender;
use Viber\Bot;

class Controller
{
    protected $bot;
    protected $botSender;

    public function __construct(Bot $bot)
    {
        $this->bot = $bot;
    }

    public function getSender()
    {
        if ($this->botSender === null) {
            return $this->botSender = new Sender([
                'name' => 'Myguru',
                'avatar' => 'https://developers.viber.com/images/favicon.ico',
            ]);
        }

        return $this->botSender;
    }

    protected function sendMessage(string $responseText, string $viberId, array $keyboard)
    {
        $this->bot->getClient()->sendMessage(
            (new \Viber\Api\Message\Text())
                ->setSender($this->getSender())
                ->setReceiver($viberId)
                ->setText($responseText)
                ->setKeyboard((new Keyboard())
                    ->setButtons($keyboard))
        );
    }
}
