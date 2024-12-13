<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calculator</title>
</head>
<body>
@if ($errors->any())
    <div style="color: red;">
        @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if(isset($result))
    <p>Result of "{{ $expression }}": <strong>{{ $result }}</strong></p>
@endif
<form action="{{route('calculate')}}" method="post">
    @csrf
    <input type="text" name="expression">
    <input type="submit" value="Submit">
</form>
</body>
</html>
