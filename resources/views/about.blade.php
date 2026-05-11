<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
</head>
<body>
    <h1>Hello , {{ $name }} </h1>

    <form action="/about" method="POST">
        @csrf
        <input type="text" name="name" id="name">


        <select name="Course" id="Course">

         @foreach ($Courses as $key => $Course)
            <option value="{{ $key }}">{{ $Course }}</option>
        @endforeach

        </select>

        <input type="submit" value="Send">

    </form>
</body>
</html>
