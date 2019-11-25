<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class MenuItems
{
    public function compose(View $view)
    {
        $view->with('menuItems', $this->menuItems());
    }

    private function menuItems()
    {
        return collect([
            [
                'icon' => 'fas fa-calendar-day',
                'text' => 'Agenda items',
                'link' => route('agenda-items.index'),
            ], [
                'icon' => 'fas fa-bullhorn',
                'text' => 'Mededelingen',
                'link' => route('agenda-items.index'),
            ], [
                'icon' => 'fas fa-images',
                'text' => 'Foto\'s',
                'link' => route('agenda-items.index'),
            ],
        ])->map(function (array $menuItem) {
            return (object) $menuItem;
        });
    }
}
