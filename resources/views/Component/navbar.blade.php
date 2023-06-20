<nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background: white;">
  <div class="container-fluid">
      <img src="{{ asset('img/logo/Logo_SN_Text.png') }}" alt="My Image" style="width:35px; height:35px;">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="container search-bar" id="container-search" style="visibility:hidden;">
        <div id="search-bar" class="ms-5" style="width:80%; ">
          <form class="form-search" action="/renstrapage/{periode}" method="POST" style="display: flex">
            <input type="search" id="search-item" name="searchItem" class="form-control" placeholder="Cari Indikator..." aria-label="Username" aria-describedby="basic-addon1" style="border-radius: 1rem 0 0 1rem; height:2rem; text-align:center">
            <button class="btnSrch btn py-0" type="submit" id="button-addon1" style="background-color: #0096FF; color:white; border-radius: 0 1rem 1rem 0; height:2rem;"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </div>
        <button class="close-search btn mx-2 py-0 px-2" id="close-search" style="background:#d2d2d2;height:2rem;border-radius: 100%;" onclick="closeSearch()"><i class="bi bi-x"></i></button>
      </div>
      <ul class="navbar-nav" style="width:auto; justify-content:end; column-gap: 2%">
        <a class="btn navigateBtn p-0 d-flex" aria-current="page" href="/home" style="background-color: transparent; border:none; color:black; align-items:center; width:10rem">
          <li class="nav-item p-2" style="width: 100%">
            <i class="bi bi-house-door"></i> Home
          </li>
        </a>
        <a class="btn navigateBtn p-0 d-flex" href="/home/create" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: transparent; border:none; color:black; align-items:center; width:10rem">
          <li class="nav-item p-2" style="width: 100%">
            <i class="bi bi-file-earmark-diff"></i> Data 
          </li>
        </a>
        <a class="btn navigateBtn p-0 d-flex" aria-current="page" href="/activity-log" style="background-color: transparent; border:none; color:black; align-items:center; width:10rem">
          <li class="nav-item p-2" style="width: 100%">
            <i class="fa-solid fa-person-running"></i> Activity Log
          </li>
        </a>
      </ul>
    </div>
  </div>
</nav>
