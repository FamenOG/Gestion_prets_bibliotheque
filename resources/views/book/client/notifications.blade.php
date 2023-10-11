<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ URL::asset('bootstrap/bootstrap-5.0.2/css/bootstrap.min.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
</head>

<body>
    <style>
        .active {
            background-color: #343a40 !important;
            color: #fff !important;
        }
    </style>
    <div class="container rounded-3 my-5 d-flex flex-wrap shadow p-5">
        <div class="col-md-6 p-4">
            <h2>Notifications</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Book</th>
                        <th>Days  of late</th>
                        <th>Penalty Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                    <tr>
                        <td>{{ $data['book']->title }}</td>
                        <td>{{ $data['daysLate'] }} days</td>
                        <td>{{ $data['penaltyAmount'] }} Ar</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('bootstrap/bootstrap-5.0.2/js/bootstrap.min.js') }}"></script>
</body>

</html>