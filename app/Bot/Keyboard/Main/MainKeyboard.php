<?php

namespace App\Bot\Keyboard\Main;

use App\Bot\Keyboard\BaseButton;

class MainKeyboard extends BaseButton
{
    public function mainKeyboard(string $countMyOrders, string $countOrdersAllDay, string $rating): array
    {
        $this->buttonMyOrders($countMyOrders);
        $this->buttonOrdersForDay($countOrdersAllDay);
        $this->buttonSetHolidayDays();
        $this->buttonTest();
        $this->buttonInstruction();
        $this->buttonMyRating($rating);

        return $this->buttons;
    }

    public function buttonMyOrders(string $countMyOrders): void
    {
        $this->buttons[] = (new \Viber\Api\Keyboard\Button())
            ->setColumns(2)
            ->setRows(2)
            ->setBgColor($this->firstColor)
            ->setActionType('reply')
            ->setActionBody('my_orders')
            ->setText('Мои заказы <b>(' . $countMyOrders . ')</b>');
    }

    public function buttonOrdersForDay(string $countOrdersAllDay): void
    {
        $this->buttons[] = (new \Viber\Api\Keyboard\Button())
            ->setColumns(2)
            ->setRows(2)
            ->setBgColor($this->firstColor)
            ->setActionType('reply')
            ->setActionBody('orders_for_day')
            ->setText('Заказы на день <b>(' . $countOrdersAllDay . ')</b>');
    }

    public function buttonSetHolidayDays(): void
    {
        $this->buttons[] = (new \Viber\Api\Keyboard\Button())
            ->setColumns(2)
            ->setRows(2)
            ->setBgColor($this->firstColor)
            ->setActionType('reply')
            ->setActionBody('set_holiday_days')
            ->setText('Проставить выходные дни');
    }

    public function buttonTest(): void
    {
        $this->buttons[] = (new \Viber\Api\Keyboard\Button())
            ->setColumns(2)
            ->setRows(2)
            ->setBgColor($this->secondColor)
            ->setActionType('reply')
            ->setActionBody('test')
            ->setText('Тестовая кнопка');
    }

    public function buttonInstruction(): void
    {
        $this->buttons[] = (new \Viber\Api\Keyboard\Button())
            ->setColumns(2)
            ->setRows(2)
            ->setBgColor($this->firstColor)
            ->setActionType('reply')
            ->setActionBody('instruction')
            ->setText('Инструкция');
    }

    public function buttonMyRating(string $rating): void
    {
        $this->buttons[] = (new \Viber\Api\Keyboard\Button())
            ->setColumns(2)
            ->setRows(2)
            ->setBgColor($this->firstColor)
            ->setActionType('reply')
            ->setActionBody('my_rating')
            ->setText('Рейтинг: <b>' . $rating . '</b>');
    }
}
