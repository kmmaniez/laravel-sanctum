<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- 3 --}}
    {{-- get array from json, access with object --}}
    {{-- @foreach ($data["data"] as $list)
    <ul>
        <li>{{ $list->name }}</li>
        <li>{{ $list->desc }}</li>
        <li>{{ $list->price }}</li>
    </ul>
    @endforeach --}}

    {{-- 2 --}}
    {{-- langsung akses array & loop --}}
    {{-- @foreach ($data["data"] as $list)
    <ul>
        <li>{{ $list["name"] }}</li>
        <li>{{ $list["desc"] }}</li>
        <li>{{ $list["price"] }}</li>
    </ul>
    @endforeach --}}
</body>

</html>