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

    public function validateSpf($domain){
        $decoder = new \SPFLib\Decoder();
        $originalSpf = $decoder->getRecordFromDomain($domain);
        $record = (new \SPFLib\Decoder())->getRecordFromTXT($originalSpf);
        $issues = (new \SPFLib\SemanticValidator())->validate($record);
        $originalDomainSpfLookUpCount = isset($issues['totalCount']) ? $issues['totalCount'] : false ;
        // return $originalDomainSpfLookUpCount;
        //looking for how many included domains are there.

        $partsOfSpf = explode(' ', $originalSpf );
        $includeddomains = [];
        foreach($partsOfSpf as $key => $part){
            $includeddomains[] = str_replace('include:','',strstr($part,"include:"));
            $includeddomains = array_filter($includeddomains);
            // str_replace('inlcude:','');
        }
        //return $includeddomains;

        //running recurssion

    }

    public function validatedOutput(Request $request){
        return $this->validateSpf($request->domain);
    }
}
