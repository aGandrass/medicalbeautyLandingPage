<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trackings extends Model
{
    protected $fillable = [
      'trackingIP',
      'trackingBrowser',
      'trackingReferer',
      'trackingCount'
    ];
}
