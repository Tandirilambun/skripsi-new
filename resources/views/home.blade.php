@extends('main.index')

@section('index')
    @if (session()->has('login_success'))
        <div class="modal fade" tabindex="-1" id="notifModal">
            <div class="modal-dialog modal-dialog-centered justify-content-center align-items-center">
                <div class="modal-content" style="max-width: 300px; flex:1;">
                    <div class="modal-header border-0">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-0">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="login-notif">
                                <p class="mb-1 mt-0">
                                    <i class="bi bi-check-circle-fill mb-1 mt-0" ></i>
                                </p>
                                <p class="mb-0" style="font-weight:bold"> You're Log In as </p>
                                <p style=" font-size:20px;font-weight:bold"> {{auth() -> user() -> name}} </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="landing-page">
        <h2 class="message">
            Welcome!
            <span class="slides">
                <span class="slide-1">
                    <span>Sistem Manajemen</span>
                    <span>Rencana Strategis</span>
                    <span>Yayasan SATUNAMA</span>
                    <span>Yogyakarta</span>
                </span>
            </span>
            <a type="button" href="#roadmap-section" class="btn homeBtn mt-3 p-0">Getting Started <i
                    class="bi bi-arrow-right ms-2"></i> </a>
        </h2>
        <div>
            <img src="{{ asset('img/illustration/Company-amico.png') }}" alt="logo satunama"
                style="width: 650px; heigth:650px;">
        </div>
    </div>

    <div class="roadmap-section" id="roadmap-section"
        style="height: 100vh; background:#ACB1D6; justify-content: center; align-items: center;">
        <div class="col m-2" style="max-width: 300px">
            <p style="font-size: 25px; font-weight:bold"> Rencana Strategis Yayasan SATUNAMA Yogyakarta</p>
        </div>
        <div class="col m-2 row row-cols-2 gap-3">
            @foreach ($periodes as $periode)
                <div class="card renstra-parent" style="width: 12rem; height:12rem; border:none; border-radius:1rem;">
                    <a href="/renstrapage/{{ $periode->id_periode }}" class="card-body card-renstra"
                        style="text-decoration: none;">
                        <div class="d-flex" style="justify-content: center;">
                            <i class="bi bi-pin-map" style="font-size: 70px"></i>
                        </div>
                        <div class="mt-2" style="text-align: center">
                            <h5 class="card-title rm-title"> {{ $periode->roadmap }} </h5>
                            <h6 class="card-subtitle mt-1 rm-title" style="font-size: 9px"> {{ $periode->tahun_awal }} -
                                {{ $periode->tahun_akhir }} </h6>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="card card-container py-3 shadow-sm" style="border-radius:20px; border-color: transparent;" id="roadmap-page">
            <div class="px-3">
                <h5 style="font-weight:bold; font-size:24px;">Strategic Planning</h5>
                <p style="font-weight:light; font-size:11px;">Rencana Strategis Yayasan SATUNAMA Yogyakarta</p>
            </div>
            <hr size="3" width="100%" color="black" class="mt-1">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-4 container">
                    @foreach ($periodes as $periode)
                        <div class="col">
                            <div class="card card-parent my-2 shadow-sm"
                                style="border:2px dashed #d2d2d2; border-radius:15px; width:18; height:13rem;">
                                <a href="/renstrapage/{{ $periode->id_goal }}" class="card-body card-self d-flex"
                                    style="border-radius:15px; width:auto; height:auto; text-decoration: none; align-items:center">
                                    <div>
                                        <h5 class="card-title" style="font-size: 24px; font-weight:bold;">
                                            {{ $periode->roadmap }}</h5>
                                        <h6 class="card-subtitle mb-2" style="font-size: 13px;">SP SATUNAMA</h6>
                                        <p class="card-text" style="font-size: 13px;">Periode {{ $periode->tahun_awal }} -
                                            {{ $periode->tahun_akhir }} </p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> --}}
    {{-- <!--Section untuk Departemen/Unit-->
        <div class="card card-container mt-3 py-3 shadow-sm" style="border-radius:20px; border-color: transparent;">
            <div class="container">
                <div id="carouselExampleControlsNoTouching" class="carousel carousel-dark slide" data-bs-touch="false" data-bs-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-center" style="align-items: center">
                                <i class="bi bi-building" style="font-size: 4rem;"></i>
                            </div>
                            <div class="d-flex justify-content-center" style="align-items: center">
                                <hr size="4" width="100%" color="black" class="mt-1">
                                <h3 class="dept-unit mx-4"> Departemen </h3>
                                <hr size="4" width="100%" color="black" class="mt-1">
                            </div>
                            <div class="row container row-cols-1 row-cols-md-4 px-3 m-0">
                                @foreach ($departemens as $departemen)
                                <div class="col p-0" style="display: flex; align-items:center; justify-content:center;">
                                    <div class="card card-parent my-2 shadow-sm" style=" border-radius: 15px; border:2px dashed #d2d2d2; width: 18rem; height: 9rem">
                                        <a class="card-body card-departemen d-flex" href="/departemen/{{ $departemen -> id_departemen }}" style="border-radius: 15px; text-decoration: none; width: auto; height: auto; align-items:center">
                                            <div>
                                                <p class="card-text paragraph my-3">{{ $departemen -> nama_departemen }} </p>
                                            </div>
                                        </a> 
                                    </div>                      
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-flex justify-content-center" style="align-items: center">
                                <i class="bi bi-people-fill" style="font-size: 4rem"></i>
                            </div>
                            <div class="d-flex justify-content-center" style="align-items: center">
                                <hr size="4" width="100%" color="black" class="mt-1">
                                <h3 class="dept-unit mx-4"> Unit </h3>
                                <hr size="4" width="100%" color="black" class="mt-1">
                            </div>
                            <div class="row container row-cols-1 row-cols-md-4 px-3 m-0">
                                @foreach ($units as $unit)
                                    <div class="col p-0" style="display: flex; align-items:center; justify-content:center;">
                                        <a class="card my-2 card-departemen shadow-sm" href="/unit/{{ $unit -> id_unit }}" style="border-radius: 15px; text-decoration: none; border: 2px dashed #d2d2d2; width: 18rem; height: 9rem">
                                            <div class="card-body" style="display: flex; align-items:center;">
                                                <p class="card-text paragraph my-3">{{ $unit -> nama_unit }} </p>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev" style="justify-content: start; justify-items:start; max-width:2rem;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next" style="justify-content: end; justify-items: end; max-width:2rem">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div> --}}
@endsection
