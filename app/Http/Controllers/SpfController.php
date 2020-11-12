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
        $originalSpf = $decoder->getRecordFromDomain($domain);
        $record = (new \SPFLib\Decoder())->getRecordFromTXT($originalSpf);
        $issues = (new \SPFLib\SemanticValidator())->validate($record);
        $originalDomainSpfLookUpCount = isset($issues['totalCount']) ? $issues['totalCount'] : false ;

        //looking for how many included domains are there.

        return $includeddomains = strstr($originalSpf,"include:");
        

    }
}
