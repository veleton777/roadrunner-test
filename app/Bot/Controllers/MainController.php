<?php

declare(strict_types=1);

namespace App\Bot\Controllers;

use App\Bot\Keyboard\Holiday\HolidayKeyboard;
use App\Bot\Keyboard\Main\MainKeyboard;
use Viber\Api\Event\Message;
use Viber\Bot;

class MainController extends Controller
{
    private $mainKeyboard;
    private $holidayKeyboard;

    public function __construct(
        Bot $bot,
        MainKeyboard $mainKeyboard,
        HolidayKeyboard $holidayKeyboard
    )
    {
        parent::__construct($bot);
        $this->mainKeyboard = $mainKeyboard;
        $this->holidayKeyboard = $holidayKeyboard;
    }

    public function getMain(Message $event): void
    {
        $viberId = $event->getSender()->getId();
        $responseText = 'click';

        $this->sendMessage(
            $responseText,
            $viberId,
            $this->holidayKeyboard->setHolidaysKeyboard()
        );
    }

    public function getClick(Message $event): void
    {
        $viberId = $event->getSender()->getId();
        $responseText = 'ok';

        $this->sendMessage($responseText, $viberId, [
            (new \Viber\Api\Keyboard\Button())
                ->setActionType('reply')
                ->setActionBody('btn-click')
                ->setText('get')
        ]);
    }

    public function getTest($event): void
    {
        $viberId = $event->getSender()->getId();
        $responseText = 'привет';

        $this->sendMessage($responseText, $viberId, [
            (new \Viber\Api\Keyboard\Button())
                ->setActionType('reply')
                ->setActionBody('btn-click')
                ->setText('Tap this button')
        ]);
    }

    public function getViberId($event)
    {
        $viberId = $event->getSender()->getId();

        $this->sendMessage($viberId, $viberId, [
            (new \Viber\Api\Keyboard\Button())
                ->setActionType('reply')
                ->setActionBody('btn-click')
                ->setText('Tap this button')
        ]);
    }
}
