<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>My Page</title>
    </head>
    <body>
        <h1>Welcome to my page!</h1>
        <h2>Customers List</h2>
    @foreach($customers as $customer)
        <p>{{ $customer->name }}</p>
    @endforeach
    </body>
</html>
