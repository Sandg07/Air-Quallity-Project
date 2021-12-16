<!DOCTYPE html>
<html>

<head>
    <title> Example of Bootstrap Datepicker in Laravel </title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <form method="post">
        @csrf
        <div class="container">
            <input name="date" class="date form-control" type="text">
            <input type="submit" id='submitBtn' value="Submit">
        </div>
    </form>
    <div>
        <table border="1">
            <tr>
                <th width='30px'></th>
                @foreach ($stations as $key => $station)
                    <th>{{ $key }}</th>
                @endforeach
            </tr>
            <tr>
                <th>PM10</th>
                @foreach ($stations as $station)

                    <td>{{ $station['polLabel']['PM10'] }}</td>

                @endforeach
            </tr>
            <tr>
                <th>NO2</th>
                @foreach ($stations as $station)

                    <td>{{ $station['polLabel']['NO2'] }}</td>

                @endforeach
            </tr>
            <tr>
                <th>Ozone</th>
                @foreach ($stations as $station)

                    <td>{{ $station['polLabel']['Ozone'] }}</td>

                @endforeach
            </tr>
        </table>
    </div>



</body>
<script src="/js/datepicker.js"></script>

</html>
