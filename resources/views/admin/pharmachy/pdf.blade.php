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



<h1 class="text-center">Medicine Details</h1>
<table class="centered-table">
    <tr>
        <th>Customer Name</th>
        <td>{{$data->u_name}}</td>
    </tr>
    <tr>
        <th>Date</th>
        <td>{{$data->date}}</td>
    </tr>
    <tr>
        <th>Invoice Id</th>
        <td>{{$data->m_id}}</td>
    </tr>
    <tr>
        <th>Medicine Name</th>
        <td>{{$data->m_name}}</td>
    </tr>
    <tr>
        <th>Medicine Price</th>
        <td>{{$data->price}}</td>
    </tr>
    <tr>
        <th>Vendor</th>
        <td>{{$data->vendor}}</td>
    </tr>
    <tr>
        <th>Payment Status</th>
        <td>{{$data->payment_status}}</td>
    </tr>
</table>


<footer>Preapered by MediCare</footer>
</body>
</html>
