<!DOCTYPE html>
<html>
<head>
    <title>Plan Status Update</title>
</head>
<body>
    <h2>{{ config('app.name') }}</h2> <!-- Company Name -->

    <p>Dear Student,</p> <!-- Fixed greeting -->

    <p>Your plan status has been updated to: <strong>{{ $status }}</strong>.</p>

    <p>Thank you for choosing {{ config('app.name') }}!</p>
</body>
</html>
