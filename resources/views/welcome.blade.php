<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="width:100%;height:100%;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SATUNAMA | Rencana Strategis</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        
        <!-- Web Icon -->
        <link rel="icon" type="png" href="{{ asset('img/Logo_SN_Text.png') }}">
        
        <!-- Local CSS -->
        <link rel="stylesheet" href="/css/index.css">
        
        <!-- Bootstrap 5.3.0 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        
        <!-- Google Poppins Font -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap">
        
        <!-- Bootstrap Icon -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        
        <!-- Bootstrap Poopper JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
        
        <!-- Bootstrap 5.3.0 js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    </head>
    <body class="land-page">
        <div class="landing-page" >
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
                <a href="/home" class="btn homeBtn mt-3 p-0">Getting Started</a>
            </h2>
        </div>
        <div class="second-land" id="secondPage">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center">Visi</h5>
                    <p class="card-text">Indonesia yang beragam, beradab dan berkelanjutan</p>
                </div>
            </div>
            <div class="card mt-5" style="width: 100%;">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center">Misi</h5>
                    <ul class="misi" style="list-style-type: decimal">
                        <li class="card-text">
                            <span>
                                Mengembangkan budaya hidup bersama yang membela hak-hak dasar individu dan hak-hak dasar kolektif warga negara terutama warga paling marginal
                            </span>
                        </li>
                        <li class="card-text">
                            <span>
                                Memfasilitasi tumbuh kembangnya organisasi masyarakat sipil dalam memperjuangkan hak-hak dan kewajiban warga negara
                            </span>
                        </li> 
                        <li class="card-text">
                            <span>
                                Mengembangkan tata hidup yang demokratis, berkeadilan, transparan, akuntabel, dan bebas korupsi
                            </span>
                        </li>   
                        <li class="card-text"> 
                            <span>
                                Memperkuat jaringan kerja sama antar individu, masyarakat dan organisasi di level lokal hingga internasional
                            </span> 
                        </li> 
                        <li class="card-text"> 
                            <span>
                                Memperkuat negara memenuhi hak-hak konstitusi warga negara
                            </span> 
                        </li> 
                        <li class="card-text">
                            <span>
                                Membangun budaya Organisasi Yayasan, mitra dan masyarakat dampingan secara optimal
                            </span> 
                        </li> 
                        <li class="card-text">
                            <span>
                                Mengarusutamakan pelestarian lingkungan seperti sumber daya alam, air, energi dan perubahan iklim, pengelolaan risiko bencana, gender dan pemenuhan hak anak
                            </span> 
                        </li> 
                    </ul>
                </div>
            </div>
        </div>
    </body>
    <script src="/js/index.js"></script>
</html>
