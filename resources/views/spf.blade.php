<!DOCTYPE html>
<html lang="en">

<head>
    <title>Spf validator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<div class="container">
    <h3>Result for {{ app('request')->domain }}</h3>
    <hr>
    @foreach($spf as $key => $data)
    <p>{{$data}}</p>
    @endforeach
</div>


<body>