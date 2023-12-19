<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment Email</title>
</head>

<body>
    <h1>Payment Notification</h1>
    <p>Hi, you have successfully buy ticket of event "{{ $data['event'] }}", on behalf of {{ $data['name'] }}</p>
    <p>Purchase ID: {{ $data['id'] }}</p>
    <p>Price: {{ $data['price'] }}</p>
    <p>Amount: {{ $data['amount'] }}</p>
    <p>Total: {{ $data['total'] }}</p>
    <br>
    <p>You can send the payment via transfer, gopay or dana and type "{{ $data['id'] }}" in messages column, you also can pay it onsite when the event start</p>
    <br>
    <p>Thank You</p>
</body>

</html>
