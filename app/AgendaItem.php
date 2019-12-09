<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property string $title
 * @property string $contents
 * @property Carbon $date
 */
class AgendaItem extends Model
{
    use SoftDeletes;

    protected $guarded = [ ];

    protected $casts = [ 'date' => 'date' ];
}
