<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Index function of Products Controller</h1>
    {{-- <h2>Title {{$title}}</h2>
    <h3>x = {{$x}}</h3>
    <h3>x = {{$y}}</h3>
    <h3>name = {{$name}}</h3> --}}
    {{-- <h3>myphone = {{$myphone['name']}}</h3>
    <h4>numberphone = {{ $myphone['phone']}}</h4> --}}

    @foreach ($myphone as $item)
    <h3>{{$item}} </h3>
    @endforeach

</body>
</html>
