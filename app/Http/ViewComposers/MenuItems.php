<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class MenuItems
{

    private static $active = '';

    public function compose(View $view)
    {
        $view->with('menuItems', $this->menuItems());
    }

    private function menuItems()
    {
        return collect([
            [
                'icon' => 'fas fa-calendar-day fa-fw',
                'text' => 'Agenda items',
                'link' => route('agenda-items.index'),
            ], [
                'icon' => 'fas fa-bullhorn fa-fw',
                'text' => 'Mededelingen',
                'link' => route('announcements.index'),
            ], [
                'icon' => 'fas fa-images fa-fw',
                'text' => 'Foto\'s',
                'link' => route('images.index'),
            ], [
                'icon' => 'fas fa-tools fa-fw',
                'text' => 'Maintenance',
                'link' => route('maintenance'),
            ],
        ])->map(function (array $menuItem) {
            $menuItem['active'] = static::$active === $menuItem['text'];

            return (object) $menuItem;
        });
    }

    public static function activeItem(string $itemText)
    {
        static::$active = $itemText;
    }
}
