<!DOCTYPE html>
<html lang="en">

<head>
    <title>Spf validator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="https://img.icons8.com/fluent/2x/fingerprint-accepted.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<div class="container">
    <h3>Result for {{ app('request')->domain }}</h3>
    <hr>
    @isset($spf)
    @foreach($spf as $key => $data)
    <p style="color:red">{{$data}}</p>
    @endforeach
    @endisset
    @if(!isset($spf))
    <span class="label label-success" style="font-size: 15px;">Looks ok</span>
    @endif
</div>


<body>