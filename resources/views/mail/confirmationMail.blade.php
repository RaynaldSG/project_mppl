<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Confirmation Email</title>
</head>

<body>
    <h1>Payment Notification</h1>
    <p>Hi, your payment for event "{{ $data['event'] }}", on behalf of {{ $data['name'] }}</p>
    <p>Purchase ID: {{ $data['id'] }}</p>
    <br>
    <p style="font-weight: 700">HAS BEEN CONFIRMED</p>
    <p>Show this email to receptionist when event start</p>
    <br>
    <p>Thank You</p>
</body>

</html>
