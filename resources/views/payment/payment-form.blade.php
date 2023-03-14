<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
</head>
<body>
<form action="{{ url('/payments') }}" method="post">
    @csrf
    <input type="number" name="amount">
    <button type="submit">Pay</button>
</form>
</body>
</html>
