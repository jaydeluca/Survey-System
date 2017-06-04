@extends('layouts.app')

@section('content')
    <div class="section background-alternate">
        <div class="columns">
            <div class="column">
                <div class="card is-one-third">
                    <div class="card-header background-accent">
                        <p class="card-header-title">Your Surveys</p>
                    </div>
                    <div class="card-content">
                        <ul class="u-nice-list">
                            @foreach ($user_surveys as $survey)
                                <li>
                                    <a href="{{ $survey->path() }}">
                                        {{ $survey->name }}
                                    </a>
                                    <a href="">
                                        Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                    <a href="/results/{{ $survey->id }}">
                                        Results <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="column">
                <div class="card is-one-third">
                    <div class="card-header background-accent">
                        <p class="card-header-title">Latest Surveys</p>
                    </div>
                    <div class="card-content">
                        <ul class="u-nice-list">
                            @foreach ($latest_surveys as $survey)
                                <li>
                                    <a href="{{ $survey->path() }}">
                                        {{ $survey->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
