@extends('template')

@section('title', 'Team page')


@section('content')
    <div class="container col-xxl-8 px-4 py-5 justify-content-center">
        <h2> Our Team </h2>
        <p>Facing growing problems in our environment, it is getting more and more important to be cautious about the impact
            it
            can have on our health.
            As we know that changes to the climat politics will take time to be visual, we will provide a tool to inform our
            users about the actual air pollution in terms of PM 10, PM 2.5, NO2 and Ozone, with the data provided by the
            luxembourgish government on the website data. Public. Lu </p>
    </div>
    @if (!empty($team))

        <div class="container-lg">
            <div class="row row-cols-1 row-cols-md-3 g-4 ">
                @foreach ($team as $member)
                    <div class="col d-flex justify-content-center align-items-center">
                        <div class="card h-100" style="max-width: 350px">
                            <img height="50%" src="{{ URL::asset($member->avatar) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title">{{ $member->first_name }}
                                    {{ $member->last_name }}</h3>
                                <h5 class="card-title">{{ $member->title }}
                                </h5>
                                <p class="card-text">{{ $member->about }}</p>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary btn-lg px-4 me-md-2" href="{{ $member->github_account }}">Github
                                    Account</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



    @else
        <p>No member in the Team DB.</p>
    @endif

@endsection
{{-- {{ $member->title }} --}}
