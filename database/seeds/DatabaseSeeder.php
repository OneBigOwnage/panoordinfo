<?php

use App\AgendaItem;
use App\Announcement;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->createAgendaItems();
    }

    private function createAgendaItems()
    {
        factory(AgendaItem::class, 8)->create();
        factory(Announcement::class, 8)->create();
    }
}
