<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leads extends Model
{
    protected $fillable = [
      'leadName',
      'leadMail',
      'leadIP',
      'leadBrowser',
      'leadReferer'
    ];
}
