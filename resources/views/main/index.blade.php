<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SATUNAMA | Rencana Strategis</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <!-- Web Icon -->
    <link rel="icon" type="png" href="{{ asset('img/logo/Logo_SN_noText.png') }}">

    <!-- Local CSS -->
    <link rel="stylesheet" href="/css/index.css">

    <!-- Bootstrap 5.3.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- Google Nunito Sans Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600&display=swap" rel="stylesheet">

    <!-- Google Poppins Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- Bootstrap Poopper JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
    </script>
    <!-- Bootstrap 5.3.0 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
    </script>

    <!-- Jquery for Ajax -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/1bb83af319.js" crossorigin="anonymous"></script>

    <!--Chart.js -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js"
        integrity="sha512-mlz/Fs1VtBou2TrUkGzX4VoGvybkD9nkeXWJm3rle0DPHssYYx4j+8kIS15T78ttGfmOjH0lLaBXGcShaVkdkg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <!-- Ajax jquery for searching -->
    {{-- <script>
            var availableTags = [];
            $.ajax({
                type: "GET",
                url: "/indikator-list",
                success: function (response) {
                    startAutoComplete(response)
                }
            });
            function startAutoComplete(availableTags) { 
                $("#search-item" ).autocomplete({
                    source: availableTags
                });
            }
        </script> --}}
</head>

<body style="background: #F8FAFB;">
    @include('Component.navbar')
    @if (session()->has('success') || session()->has('status'))
        <div id="body-html" data-value="true">
            @yield('index')
        </div>
    @else
        <div id="body-html" data-value="false">
            @yield('index')
        </div>
    @endif
</body>
<!--Toast for Notification-->
<div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <img src="{{ asset('img/logo/Logo_SN_noText.png') }}" class="rounded me-2" alt="logo sistem"
                style="width:18px; height:18px">
            <strong class="me-auto">Notification</strong>
            <small> {{ now()->diffForHumans() }} </small>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body px-0">
            <div class="body-time mb-3 mx-3" style="text-align:start">
                <small>{{ now()->format('l') }}, {{ now()->format('d F Y') }}
                    ({{ now()->format('H:i') }})</small>
            </div>
            <div class="body-message alert alert-info mb-0" role="alert" style="border-radius: 0; border:0;">
                <div style="display: inline; font-size: 12px">
                    @if (session()->has('success'))
                        <i class="bi bi-check2-circle" style="margin-right: 1rem"></i>{{ session('success') }}
                    @elseif(session()->has('status'))
                        <i class="bi bi-check2-circle" style="margin-right: 1rem"></i>{{ session('status') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body container">
                <div class="d-flex justify-content-center align-items-center" style="gap:2%;">
                    <div class="col">
                        <div class="card card-wrapper"
                            style="border: 2px dashed #d2d2d2; border-radius:15px; width:auto; height:auto;">
                            <a type="button" class="card-body card-self py-5" data-bs-toggle="modal"
                                data-bs-target="#modal-renstra"
                                style="border-radius:15px; width:auto; height:auto; text-decoration: none;">
                                <h5 class="card-title" style="font-size: 20px; font-weight:bold;">
                                    Rencana Strategis</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-wrapper"
                            style="border: 2px dashed #d2d2d2; border-radius:15px; width:auto; height:auto;">
                            <a href="/crudrenstra" class="card-body card-self py-5"
                                style="border-radius:15px; width:auto; height:auto; text-decoration: none;">
                                <h5 class="card-title" style="font-size: 20px; font-weight:bold;">
                                    Kegiatan</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Renstra -->
<div class="modal fade" id="modal-renstra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Rencana Strategis</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body container">
                <div class="d-flex justify-content-center align-items-center" style="gap:2%;">
                    <div class="col">
                        <div class="card card-wrapper"
                            style="border: 2px dashed #d2d2d2; border-radius:15px; width:auto; height:auto;">
                            <a href="home/create" class="card-body card-self py-5"
                                style="border-radius:15px; width:auto; height:auto; text-decoration: none;">
                                <h5 class="card-title" style="font-size: 20px; font-weight:bold; text-align:center;">
                                    Add Data Rencana Strategis</h5>
                            </a>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card card-wrapper"
                            style="border: 2px dashed #d2d2d2; border-radius:15px; width:auto; height:auto;">
                            <a href="/data-page" class="card-body card-self py-5"
                                style="border-radius:15px; width:auto; height:auto; text-decoration: none;">
                                <h5 class="card-title" style="font-size: 20px; font-weight:bold; text-align:center;">Data Page Rencana Strategis
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Local JavaScript -->
<script src="/js/index.js"></script>

</html>
