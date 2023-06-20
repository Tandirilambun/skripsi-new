{{-- @dd($departemens); --}}

@extends('main.index')
@section('index')
<div class="container py-5" style="max-width: 90rem;">
    <div class="card card-container py-3 shadow-sm" style="border-radius:20px; border-color: transparent;">
        <div class="container">
            <div class="row">
                <div class="wrapper col px-4">
                    <div class="card center-text" style="border-color: transparent;">
                        <div class="d-flex" style="align-items: center; gap:1%;">
                            <i class="bi bi-building" style="font-size: 8rem;"></i>
                            <div>
                                <h5 class="card-title" style="font-size: 32px; font-weight:bold;">
                                    {{$departemen -> nama_departemen}} 
                                </h5>
                                <hr size="3" width="100%" color="red" class="mt-1">
                                <h6 class="card-subtitle text-muted" style="font-size: 22px; font-weight:bold;"> {{$departemen -> kode_departemen}}</h6>
                                <a class="btn-unit" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    Related unit <i class="bi bi-arrow-down-short"></i>
                                </a>
                                
                                <div class="collapse mt-1" id="collapseExample">
                                    @if(count($departemen -> unit) != 0)
                                        <div class="card card-body px-0">
                                            @foreach($departemen -> unit as $unit)
                                                <a class="unit-list px-3 py-1" href="/unit/{{$unit -> id_unit}}"> <i class="bi bi-people-fill mx-1"></i> {{ $unit -> nama_unit}}</a>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class="card card-body alert alert-warning" role="alert">
                                            No unit related with this Departement
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col" style="display:flex; justify-content:center; align-items:center;">
                    <img src="{{ asset('img/Logo_SN_Text.png') }}" alt="My Image" style="max-width:500px; max-height:500px;">
                </div> 
            </div>
        </div>
    </div>
    <div class="card card-container mt-3 py-3 shadow-sm" style="border-radius:20px; border-color: transparent;">
        <div class="px-3">
            <h5 style="font-weight:bold; font-size:24px;">Rencana Kegiatan</h5>
            <p style="font-weight:light; font-size:11px; margin:0%;">Rencana kegiatan yang direncanakan oleh Departemen/Unit {{$departemen -> nama_departemen}}</p>
        </div>
        <hr size="3" width="100%" color="red" class="mt-1">
        <div class="px-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Ukuran Kegiatan</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>
                        <th scope="col">PIC</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>sndiawndiondfopasnids</td>
                        <td>asjdboiasbiabsidbasub</td>
                        <td>jkasndiansod</td>
                        <td>sndiawndiondfopasnids</td>
                        <td>asjdboiasbiabsidbasub</td>
                        <td>jkasndiansod</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card card-container mt-3 py-3 shadow-sm" style="border-radius:20px; border-color: transparent;">
        <div class="px-3">
            <h5 style="font-weight:bold; font-size:24px;">Evaluasi Kegiatan</h5>
            <p style="font-weight:light; font-size:11px; margin:0%;">Evaluasi kegiatan yang telah dilaksanakan oleh Departemen/Unit {{$departemen -> nama_departemen}}</p>
        </div>
        <hr size="3" width="100%" color="red" class="mt-1">
        <div class="px-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Hasil</th>
                        <th scope="col">Hasil Ukuran Kegiatan</th>
                        <th scope="col">Deviasi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>sndiawndiondfopasnids</td>
                        <td>asjdboiasbiabsidbasub</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection