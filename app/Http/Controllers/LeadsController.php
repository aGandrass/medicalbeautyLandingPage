<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leads;
use App\Trackings;

class LeadsController extends Controller
{
    public function index()
    {
      $locale = \App::getLocale();
      \App::setLocale($locale);

      $trackingIP      = $_SERVER['REMOTE_ADDR'];
      $trackingBrowser = $_SERVER['HTTP_USER_AGENT'];
      if(isset($_SERVER['HTTP_REFERER']))
      {
        $trackingReferer = $_SERVER['HTTP_REFERER'];
      } else {
        $trackingReferer = "";
      }

      $result = \DB::table('trackings')->where('trackingIP', $trackingIP)->first();
      if ($result === null)
      {
        $track = Trackings::create([
          'trackingIP'      => $trackingIP,
          'trackingBrowser' => $trackingBrowser,
          'trackingReferer' => $trackingReferer,
          'trackingCount'   => 1
        ]);
        return view('lp');
      } else {
        $access = $result->trackingCount;
        $access += 1;
        \DB::table('trackings')
          ->where('trackingIP', $trackingIP)
          ->update([
            'trackingCount' => $access
          ]);
        return view('lp');
      }
    }

    public function store(Request $request)
    {
      $leadIP      = $_SERVER['REMOTE_ADDR'];
      $leadBrowser = $_SERVER['HTTP_USER_AGENT'];
      $leadreferer = $_SERVER['HTTP_REFERER'];

      $request = Leads::create([
        'leadName'    => request('leadName'),
        'leadMail'    => request('leadMail'),
        'leadIP'      => $leadIP,
        'leadBrowser' => $leadBrowser,
        'leadReferer' => $leadreferer
      ]);

      return redirect('/')->with('success', __('content.formAlert'));
    }
}
