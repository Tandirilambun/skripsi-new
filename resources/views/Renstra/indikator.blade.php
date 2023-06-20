@extends('main.index')

@section('index')
    <div class="container py-5">
        @if (session('indikator general'))
            {{ session()->flush() }}
            @include('Renstra.general-objective.indikator-general')

        @elseif (session('indikator ultimate'))
            {{ session()->flush() }}
            @include('Renstra.ultimate-objective.indikator-ultimate')

        @elseif (session('indikator intermediate'))
            {{ session()->flush() }}
            @include('Renstra.intermediate-objective.indikator-intermediate')

        @elseif (session('indikator outcome'))
            {{ session()->flush() }}
            @include('Renstra.outcome.indikator-outcome')

        @elseif(session('indikator use of output'))
            {{ session()->flush() }}
            @include('Renstra.use-of-output.indikator-useofoutput')

        @elseif(session('indikator output'))
            {{ session()->flush() }}
            @include('Renstra.output.indikator-output')
            
        @endif
    </div>
@endsection
