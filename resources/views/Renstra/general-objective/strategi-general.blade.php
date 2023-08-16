<!-- Section untuk Tabel Roadmap -->
<div class="container shadow-sm" style="border-radius:20px; border:none; background:white;">
    <div class=" strategi-header mb-5 p-4 pt-5 d-flex ">
        <div class="col-2 d-flex justify-content-center align-items-center">
            <div style="">
                <img src="{{ asset('img/logo/Logo_SN_noText.png') }}" alt="company_gif" style="width: 40px; height:40px;">
            </div>
        </div>
        <div class="col px-3 d-flex align-items-end">
            <div>
                <h5 class="mb-1" style="font-weight:bold; font-size:10px;">Periode</h5>
                <p class="mb-4" style="font-size:12px">{{ $parent_periode->tahun_awal }} -
                    {{ $parent_periode->tahun_akhir }}</p>
                <h5 class="mb-1" style="font-weight:bold; font-size:12px;">General Objective</h5>
                <p class="mb-4" style="font-size:20px">{{ $generalObjective->strategi_general }}</p>
                <p class="m-0" style="font-weight:light; font-size:11px;"><i class="bi bi-clipboard-check-fill"></i>
                    &#8226; {{ count($generalObjective->indikator_general) }} datas </p>
            </div>
        </div>
    </div>
    <div class="px-4 mb-5">
        <div class="d-flex align-items-center">
            <div class="icon-bar px-3">
                <i class="fa-solid fa-bars-progress"></i>
            </div>
            <div class="container px-0">
                <div class="progress_container">
                    <div class="progress">
                        <div class="progress_item">
                            <h3 class="progress_title pt-0">Progress Now</h3>
                            <div class="progress_bar">
                                <div class="bar" data-value="{{ round($avg_general) }}"
                                    data-text="{{ round($avg_general) }}"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pb-3">
        <div class="px-3">
            <h5 style="font-weight:bold; font-size:20px;"> Indikator </h5>
            <p style="font-weight:light; font-size:11px;">Indikator yang bersangkutan dengan strategi
                {{ $generalObjective->strategi_general }}</p>
        </div>
        <div class="container">
            @foreach ($indikators as $indikator_general)
                <div class="overview-list my-3 mx-2 border px-3 py-1">
                    <a href="/indikator-general/{{ $indikator_general->id_indikator_general }}"
                        style="text-decoration: none; color:black;">
                        <p class="m-0 py-3" style="font-size:12px;">
                            {{ $indikator_general->deskripsi_indikator_general }}
                        </p>
                    </a>
                </div>

                {{-- <!-- Modal -->
                <div class="modal fade" id="update-indikator-{{ $indikator_general->id_indikator_general }}"
                    tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" style="max-width: 80%">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="/indikator-general/{{ $indikator_general->id_indikator_general }}"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="select-general-1">General Objective</label>
                                        <select id="select-general-1" class="form-select mb-3"
                                            aria-label=".form-select-lg example"
                                            name="selectGeneral">
                                            <option selected value="">Select General Objective...</option>
                                            @foreach ($generals as $general)
                                                @if (old('id_general', $general->id_general) === $indikator_general->id_general)
                                                    <option selected value={{ $general -> id_general }}>
                                                        {{ $general -> strategi_general }}
                                                    </option>
                                                @else
                                                    <option value={{ $general->id_general }}>
                                                        {{$general->strategi_general }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="input_indikator_general">Indikator</label>
                                        <textarea id="input_indikator_general" class="form-control" aria-label="With textarea" style="width: 80%;"
                                            name="input_indikator_general" placeholder="Masukkan Indikator...">{{ old('deskripsi_indikator_general', $indikator_general->deskripsi_indikator_general) }}</textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> --}}
            @endforeach
        </div>
    </div>
</div>
{{-- <div class="container-box">
    <button class="toggleBox">
        <span class="icon"></span>
    </button>
    <ul class="navItem">
        <li>
            <button id="toggle-edit" onclick="showBtnEdit()">
                <i class="bi bi-pencil" style="--i:1"></i>
            </button>
        </li>
    </ul>
</div> --}}
