@foreach ($data as $array)
    <p><strong>Coordinates: </strong>{{ $array->gc_id }}</p>
    <p><strong>value: </strong>{{ $array->value }}</p>
    <p><strong>index: </strong>{{ $array->index }}</p>
@endforeach
