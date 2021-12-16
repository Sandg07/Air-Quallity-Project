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
    <div id="chartContainer1" style="height: 370px; width: 100%;"></div>
    <div id="chartContainer2" style="height: 370px; width: 100%;"></div>
    <div id="chartContainer3" style="height: 370px; width: 100%;"></div>



</body>
<script>
    let stations = {!! json_encode($stations) !!};
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="/js/datepicker.js"></script>
<script>

</script>

</html>
