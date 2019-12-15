<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $title
 * @property string $contents
 */
class Announcement extends Model
{
    use SoftDeletes;

    protected $guarded = [ ];
}
