<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->get('check-spf[/{val}]',function($val){
    $decoder = new \SPFLib\Decoder();
    echo $spf = $decoder->getRecordFromDomain($val); // getting the spf string form the domain name
    echo "<br/> <hr/>";
    // $spf = 'v=spf1 a mx include:d1.com include:d2.com include:d3.com include:d4.com include:d5.com include:d6.com include:d7.com include:d8.com redirect=foo.bar';
    $record = (new \SPFLib\Decoder())->getRecordFromTXT($spf); // returing spf string
    // getting the includes
    $exploded = explode(' ',$record);
    echo "<pre>";
    print_r($exploded);
    echo "</pre>";
    // looking for the included domain names
    foreach($exploded as $key => $stringPart){
        $includeddomains = strstr($stringPart,"include:");
        echo "<pre>";
        //echo "next - ";
        print_r($includeddomains);
        foreach (explode(":",$includeddomains) as  $domainName){
            echo "<br/>domain - ";
            echo $nextLevelSpfTxt =  $domainName != "include" ? $domainName : '';
            // $nextLevelText = $decoder->getRecordFromDomain($nextLevelSpfTxt);
            // echo $nextLevelIssues = (new \SPFLib\SemanticValidator())->validate($nextLevelText);
            // foreach ($nextLevelIssues as $issue) {
            //     echo "<pre>";
            //     echo (string) $issue, "\n";
            //     echo "</pre>";
            // }

        }
        echo "</pre>";
    }
    
    $issues = (new \SPFLib\SemanticValidator())->validate($record);
    foreach ($issues as $issue) {
        echo "<pre>";
        echo (string) $issue, "\n";
        echo "</pre>";
    }
});
$router->get('validate-spf[/{domain}]', 'SpfController@validateSpf');