<?php

namespace App\Http\Controllers;

use App\Image;
use App\AgendaItem;
use App\Announcement;
use App\Http\Resources\ImageResource;
use App\Http\Resources\AgendaItemResource;
use App\Http\Resources\AnnouncementResource;

class ScreenController extends Controller
{
    /**
     * Show the Panoord info screen page.
     *
     * @return \Illuminate\View\View The info screen view.
     */
    public function default()
    {
        return view('screen');
    }

    /**
     * Retrieve a listing of the agenda items.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection The resource collection of agenda items.
     */
    public function agendaItems()
    {
        return tap(AgendaItemResource::collection(AgendaItem::all()))->withoutWrapping();
    }

    /**
     * Retrieve a listing of the announcements.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection The resource collection of announcements.
     */
    public function announcements()
    {
        return tap(AnnouncementResource::collection(Announcement::all()))->withoutWrapping();
    }

    /**
     * Retrieve a listing of the images.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection The resource collection of images.
     */
    public function images()
    {
        return tap(ImageResource::collection(Image::all()))->withoutWrapping();
    }


}
