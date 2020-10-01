<?php

namespace App\Bot\Keyboard\Holiday;

use App\Bot\Keyboard\BaseButton;

class HolidayKeyboard extends BaseButton
{
    public function setHolidaysKeyboard(): array
    {
        $this->buttonAddHolidayDays();
        $this->buttonRemoveHolidayDays();
        $this->buttonBackToMainKeyboard();

        return $this->buttons;
    }

    public function buttonAddHolidayDays(): void
    {
        $this->buttons[] = (new \Viber\Api\Keyboard\Button())
            ->setColumns(2)
            ->setRows(2)
            ->setBgColor($this->firstColor)
            ->setActionType('reply')
            ->setActionBody('add_holiday_days')
            ->setText('Добавить выходные дни');
    }

    public function buttonRemoveHolidayDays(): void
    {
        $this->buttons[] = (new \Viber\Api\Keyboard\Button())
            ->setColumns(2)
            ->setRows(2)
            ->setBgColor($this->firstColor)
            ->setActionType('reply')
            ->setActionBody('delete_holiday_days')
            ->setText('Удалить выходные дни');
    }

    public function buttonBackToMainKeyboard(): void
    {
        $this->buttons[] = (new \Viber\Api\Keyboard\Button())
            ->setColumns(2)
            ->setRows(2)
            ->setBgColor($this->firstColor)
            ->setActionType('reply')
            ->setActionBody('back_to_main_keyboard')
            ->setText('Назад');
    }
}
