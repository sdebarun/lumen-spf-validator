<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SpfController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //

    public function validateSpf(Request $request){
        $domain = $request->domain;
        $decoder = new \SPFLib\Decoder();
        $spf = $decoder->getRecordFromDomain($domain);
        return $spf;//first spf of the original domain under the test.
    }
}
