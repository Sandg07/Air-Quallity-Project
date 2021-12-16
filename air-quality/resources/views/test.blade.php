<script>
    var pollutant = {!! json_encode($array[1]) !!}
    console.log(pollutant.pollutant);
    var favorites = {!! json_encode($array[0]) !!}
    console.log(favorites[0])
</script>
