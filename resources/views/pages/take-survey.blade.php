@extends('layouts.app')

@section('content')

    <section class="hero">
        <div class="hero-body" style="flex-direction: column;">
            <div class="container">
                <div class="columns">
                    <div class="column is-fullwidth">
                        <span class="title is-2">{{ $survey->name }}</span>
                        <span class="title is-3 has-text-muted">&nbsp;|&nbsp;</span>
                        <span class="title is-4 has-text-muted">Created {{ $survey->created_at }}</span>
                        <a href="{{ $survey->results() }}" class="pull-right button c-btn--primary">View Results</a>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-fullwidth">
                        <survey results-path="{{ $survey->results() }}"></survey>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
