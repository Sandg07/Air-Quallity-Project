@extends('template')

@section('title', 'Team page')


@section('content')

    <h2> Our Team </h2>
    <p>Write some text</p>

    @if (!empty($team))
        @foreach ($team as $member)
            <div>
                <h3>{{ $member->first_name }} {{ $member->last_name }} </h3>
                {{-- <img>{{ $member->avatar }} </> --}}
                <p><i> {{ $member->title }} </i></p>
                <p> {{ $member->about }} </p>
                <p> {{ $member->github_account }} </p>
            </div>
        @endforeach

    @else
        <p>No member in the Team DB.</p>
    @endif

@endsection
