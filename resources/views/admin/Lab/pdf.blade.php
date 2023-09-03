<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .centered-table {
            width: 60%;
            margin: 0 auto;
            border-collapse: collapse;
            text-align: left;
        }

        .centered-table th,
        .centered-table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        .centered-table th {
            background-color: #f2f2f2;
        }

        h1, h3 {
            text-align: center;
        }
        footer {
            text-align: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>



<h1 class="text-center">Lab Test Details</h1>
<table class="centered-table">
    <tr>
        <th>Name</th>
        <td>{{$data->name}}</td>
    </tr>
    <tr>
        <th>Email</th>
        <td>{{$data->email}}</td>
    </tr>
    <tr>
        <th>Phone</th>
        <td>{{$data->phone}}</td>
    </tr>
    <tr>
        <th>Test Name</th>
        <td>{{$data->test_name}}</td>
    </tr>
    <tr>
        <th>Test Price</th>
        <td>{{$data->price}}</td>
    </tr>
    <tr>
        <th>Payment Status</th>
        <td>{{$data->payment_status}}</td>
    </tr>
</table>


<footer>Preapered by MediCare</footer>
</body>
</html>
