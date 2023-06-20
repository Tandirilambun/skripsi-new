@extends('main.index')

@section('index')
    <div class="container py-3">
        @if (session('status_general'))
            {{ session()->flush() }}
            @include('Renstra.general-objective.strategi-general')

        @elseif (session('status_ultimate'))
            {{ session()->flush() }}
            @include('Renstra.ultimate-objective.strategi-ultimate')

        @elseif (session('status_intermediate'))
            {{ session()->flush() }}
            @include('Renstra.intermediate-objective.strategi-intermediate')

        @elseif (session('status_outcome'))
            {{ session()->flush() }}
            @include('Renstra.outcome.strategi-outcome')

        @elseif (session('status_useofoutput'))
            {{ session()->flush() }}
            @include('Renstra.use-of-output.strategi-useofoutput')

        @elseif (session('status_output'))
            {{ session()->flush() }}
            @include('Renstra.output.strategi-output')
        @endif
    </div>
@endsection
