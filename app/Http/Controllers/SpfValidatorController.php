<?php

namespace App\Http\Controllers;

class SpfValidatorController extends Controller
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

    public function spfValidation($domain)
    {
        $decoder = new \SPFLib\Decoder();
        $spf = $decoder->getRecordFromDomain($domain);
        $validator = new \SPFLib\OnlineSemanticValidator();
        // Check an online domain
        //$issues = $validator->validateDomain($domain);
        // Check a raw SPF record
        $issues = $validator->validateRawRecord($spf);
        // Check an SPFLib\Record instance ($record in this case)
        //$issues = $validator->validateRecord($spf);

        foreach ($issues as $issue) {
            echo "<pre>";
            //echo (string) $issue, "\n";
            echo wordwrap((string) $issue, 150, "<br>\n");
            echo "</pre>";
        }
    }
}
