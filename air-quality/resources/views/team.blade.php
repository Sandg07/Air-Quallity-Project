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


        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="mt-4 mb-4">Team Members</h2>
                </div>
                @foreach ($team as $member)
                    <div class="col-md-6 col-lg-4">

                        <div class="bg-cyan card-box">
                            <div class="card-thumbnail">
                                <img src="{{ URL::asset($member->avatar) }}" class=" img-fluid" alt="">
                            </div>
                            <h3><a href="#" class="mt-2 text-danger">{{ $member->first_name }}
                                    {{ $member->last_name }}</a></h3>
                            <h3 class="mt-2 ">{{ $member->title }}</h3>
                            <p class="text-info">{{ $member->about }}</p>
                            <a href="#" class="btn btn-sm btn-primary float-right">Read more >></a>
                            <hr>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- <div class="card">
                <img class="card-img-top" src="{{ URL::asset($member->avatar) }}" alt="...">
                <div class="card-body">
                    <h3 class="text-center"> </h3>
                    <p class="text-center"><i>  </i></p>
                    <p class="d-block ">  </p>
                    <a href="{{ $member->github_account }}"> Github Account </a>
                </div>
            </div> --}}

    @else
        <p>No member in the Team DB.</p>
    @endif

@endsection
