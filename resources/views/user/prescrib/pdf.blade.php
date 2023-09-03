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
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            text-align: left;
            margin-bottom: 30px; /* Add some margin at the bottom of the table */
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



<h1 class="text-center">Prescription</h1>


<table class="centered-table">
    <tr>
        <th colspan="3">Prescription</th>
    </tr>
    <tr>
        <td style="width: 60%">Date:{{$data->current_datetime}}</td>
        <td>{{$data->appointment_id}}</td>
        <td>Doctor ID: {{$data->appointment_id}}</td>
    </tr>
    <tr>
        <td style="width: 60%">Patient Name:{{$data->p_name}}</td>
        <td>Sex: {{$data->sex}}</td>
        <td>Age: {{$data->age}}</td>
    </tr>
    <tr>
        <td colspan="3">
            <table class="taable">
                <tr>
                    <td style="width: 60%">Doctor Name:{{$data->d_name}}</td>
                    <td width="40%">Fee: {{$data->fee}}</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="3">Medicine: {{$data->medicines }}</td>
    </tr>
    <tr>
        <td colspan="3">Tests: {{$data->tests }}</td>
    </tr>
    <tr>
        <td colspan="3">Advice: {{$data->advice }}</td>
    </tr>



<footer>Preapered by MediCare</footer>
</body>
</html>
