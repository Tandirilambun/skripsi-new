{{-- @dump($periodes); --}}
@extends('main.index')

@section('index')
    <div class="container py-5">
        <nav class="mb-4">
            <div class="nav nav-tabs tabsNav" id="nav-tab" role="tablist">
                <button class="nav-link active btnNav mx-2" id="nav-goal-tab" data-bs-toggle="tab" data-bs-target="#nav-goal"
                    type="button" role="tab" aria-controls="nav-goal" aria-selected="false">Goal/Periode</button>
                <button class="nav-link btnNav mx-2" id="nav-general-tab" data-bs-toggle="tab" data-bs-target="#nav-general"
                    type="button" role="tab" aria-controls="nav-general" aria-selected="false">General
                    Objective</button>
                <button class="nav-link btnNav mx-2" id="nav-ultimate-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-ultimate" type="button" role="tab" aria-controls="nav-ultimate"
                    aria-selected="false">Ultimate Objective</button>
                <button class="nav-link btnNav mx-2" id="nav-intermediate-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-intermediate" type="button" role="tab" aria-controls="nav-intermediate"
                    aria-selected="false">Intermediate Objective</button>
                <button class="nav-link btnNav mx-2" id="nav-outcome-tab" data-bs-toggle="tab" data-bs-target="#nav-outcome"
                    type="button" role="tab" aria-controls="nav-outcome" aria-selected="false">Outcome</button>
                <button class="nav-link btnNav mx-2" id="nav-useofoutput-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-useofoutput" type="button" role="tab" aria-controls="nav-useofoutput"
                    aria-selected="false">Use Of Output</button>
                <button class="nav-link btnNav mx-2" id="nav-output-tab" data-bs-toggle="tab" data-bs-target="#nav-output"
                    type="button" role="tab" aria-controls="nav-output" aria-selected="false">Output</button>
            </div>
        </nav>
        <div class="card card-container shadow-sm" style="border-radius:15px; border-color: transparent;">
            <div class="px-3 py-2">
                <h5 style="font-weight:bold; font-size:24px;">Tambah Data Rencana Strategis</h5>
                <p style="font-weight:light; font-size:11px; margin:0%;">Tambah Data untuk Periode</p>
            </div>
            <hr size="3" width="100%" color="red" class="m-1">
            <div class="tabs">
                <div class="tab-content" id="nav-tabContent">
                    <!--Goal/Periode-->
                    <div class="tab-pane fade show active" id="nav-goal" role="tabpanel" aria-labelledby="nav-goal-tab">
                        <div class="container p-3">
                            <form method="POST" action="/periode">
                                @csrf
                                <div class="mb-3">
                                    <label for="inputRoadmap">Roadmap</label>
                                    <input required type="text" class="form-control" id="inputRoadmap"
                                        placeholder="Roadmap" name="inputRoadmap" style="width: auto">
                                </div>
                                <div class="mb-3">
                                    <label for="tahunAwal">Tahun Awal</label>
                                    <input required type="number" class="form-control" id="tahunAwal"
                                        placeholder="Tahun Awal" name="tahunAwal" style="width: auto">
                                </div>
                                <div class="mb-3">
                                    <label for="tahunAkhir">Tahun Akhir</label>
                                    <input required type="number" class="form-control" id="tahunAkhir"
                                        placeholder="Tahun Akhir" name="tahunAkhir" style="width: auto">
                                </div>
                                <div class="mb-3">
                                    <label for="input-ket">Keterangan Roadmap</label>
                                    <div id="input-ket" class="d-flex" style="gap:1%;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flag_keterangan"
                                                id="select-ket-4" value=4>
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                4 Tingkat
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flag_keterangan"
                                                id="select-ket-8" value=8 checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                8 Tingkat
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btnAdd"
                                    style="border-radius: 3px 3px 15px 15px;">
                                    <i class="bi bi-plus-square-dotted crtAdd"></i>Add Data
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-general" role="tabpanel" aria-labelledby="nav-goal-tab">
                        <div class="container p-3">
                            <p class="mb-2" style="font-size: 17px; font-weight:bold;"> General Objective </p>
                            <form action="/general-objective" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="select-periode-1">Periode</label>
                                    <select id="select-periode-1" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectPeriode">
                                        <option selected value="">Select Periode...</option>
                                        @foreach ($periodes as $periode)
                                            <option value={{ $periode->id_periode }}>{{ $periode->roadmap }}
                                                ({{ $periode->tahun_awal }} - {{ $periode->tahun_akhir }}) <br>
                                                *{{$periode -> flag_column_keterangan}} tingkat
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="input_general">General Objective</label>
                                    <textarea id="input_general" class="form-control " aria-label="With textarea"
                                        style="width: 80%;" name="input_general" placeholder="Masukkan Strategi..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btnAdd"
                                    style="border-radius: 3px 3px 15px 15px;">
                                    <i class="bi bi-plus-square-dotted crtAdd"></i>Add Data
                                </button>
                            </form>
                            <hr class="my-5">
                            <p class="mb-2" style="font-size: 17px; font-weight:bold;"> Indikator for General Objective </p>
                            <form action="/indikator-general" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="select-general-1">General Objective</label>
                                    <select id="select-general-1" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectGeneral">
                                        <option selected value="">Select General Objective...</option>
                                        @foreach ($generals as $general)
                                            <option value={{ $general->id_general }}>{{ $general->strategi_general }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="input_indikator_general">Indikator</label>
                                    <textarea id="input_indikator_general" class="form-control" aria-label="With textarea"
                                        style="width: 80%;" name="input_indikator_general" placeholder="Masukkan Indikator..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btnAdd"
                                    style="border-radius: 3px 3px 15px 15px;">
                                    <i class="bi bi-plus-square-dotted crtAdd"></i>Add Data
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-ultimate" role="tabpanel" aria-labelledby="nav-goal-tab">
                        <div class="container p-3">
                            <p class="mb-2" style="font-size: 17px; font-weight:bold;"> Ultimate Objective </p>
                            <form action="/ultimate-objective" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="select-periode-2">Periode</label>
                                    <select id="select-periode-2" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectPeriode">
                                        <option selected value="">Select Periode...</option>
                                        @foreach ($periodes as $periode)
                                            <option value={{ $periode->id_periode }}>{{ $periode->roadmap }}
                                                ({{ $periode->tahun_awal }} - {{ $periode->tahun_akhir }}) <br>
                                                *{{$periode -> flag_column_keterangan}} tingkat
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="select-general-2">General Objective</label>
                                    <select id="select-general-2" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectGeneral">
                                        <option selected value="">Select General Objective...</option>
                                        @foreach ($generals as $general)
                                            <option value={{ $general->id_general }}>{{ $general->strategi_general }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="input_ultimate">Ultimate Objective</label>
                                    <textarea class="form-control " id="input_ultimate" aria-label="With textarea" style="width: 80%;"
                                        name="input_ultimate" placeholder="Masukkan Strategi..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btnAdd"
                                    style="border-radius: 3px 3px 15px 15px;">
                                    <i class="bi bi-plus-square-dotted crtAdd"></i>Add Data
                                </button>
                            </form>
                            <hr class="my-5">
                            <p class="mb-2" style="font-size: 17px; font-weight:bold;"> Indikator for Ultimate Objective </p>
                            <form action="/indikator-ultimate" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="select-ultimate-1">Ultimate Objective</label>
                                    <select id="select-ultimate-1" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectUltimate">
                                        <option selected value="">Select Ultimate Objective...</option>
                                        @foreach ($ultimates as $ultimate)
                                            <option value={{ $ultimate->id_ultimate }}>{{ $ultimate->strategi_ultimate }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="input_indikator_ultimate">Indikator</label>
                                    <textarea id="input_indikator_ultimate" class="form-control" aria-label="With textarea"
                                        style="width: 80%;" name="input_indikator_ultimate" placeholder="Masukkan Indikator..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btnAdd"
                                    style="border-radius: 3px 3px 15px 15px;">
                                    <i class="bi bi-plus-square-dotted crtAdd"></i>Add Data
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-intermediate" role="tabpanel" aria-labelledby="nav-goal-tab">
                        <div class="container p-3">
                            <p class="mb-2" style="font-size: 17px; font-weight:bold;">Intermediate Objective </p>
                            <form action="/intermediate-objective" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="select-periode-3">Periode</label>
                                    <select id="select-periode-3" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectPeriode">
                                        <option selected value="">Select Periode...</option>
                                        @foreach ($periodes as $periode)
                                            <option value={{ $periode->id_periode }}>{{ $periode->roadmap }}
                                                ({{ $periode->tahun_awal }} - {{ $periode->tahun_akhir }}) <br>
                                                *{{$periode -> flag_column_keterangan}} tingkat
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="select-ultimate-2">Ultimate Objective</label>
                                    <select id="select-ultimate-2" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectUltimate">
                                        <option selected value="">Select Ultimate Objective...</option>
                                        @foreach ($ultimates as $ultimate)
                                            <option value={{ $ultimate->id_ultimate }}>{{ $ultimate->strategi_ultimate }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="input_intermediate">Intermediate Objective</label>
                                    <textarea class="form-control" id="input_intermediate" aria-label="With textarea" style="width: 80%;"
                                        name="input_intermediate" placeholder="Masukkan Strategi..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btnAdd"
                                    style="border-radius: 3px 3px 15px 15px;">
                                    <i class="bi bi-plus-square-dotted crtAdd"></i>Add Data
                                </button>
                            </form>

                            <hr class="my-5">
                            <p class="mb-2" style="font-size: 17px; font-weight:bold;"> Indikator for Intermediate Objective </p>
                            <form action="/indikator-intermediate" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="select-intermediate-1">Intermediate Objective</label>
                                    <select id="select-intermediate-1" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectIntermediate">
                                        <option selected value="">Select Intermediate Objective...</option>
                                        @foreach ($intermediates as $intermediate)
                                            <option value={{ $intermediate->id_intermediate }}>
                                                {{ $intermediate->strategi_intermediate }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="input_indikator_intermediate">Indikator</label>
                                    <textarea id="input_indikator_intermediate" class="form-control" aria-label="With textarea"
                                        style="width: 80%;" name="input_indikator_intermediate" placeholder="Masukkan Indikator..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btnAdd"
                                    style="border-radius: 3px 3px 15px 15px;">
                                    <i class="bi bi-plus-square-dotted crtAdd"></i>Add Data
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-outcome" role="tabpanel" aria-labelledby="nav-goal-tab">
                        <div class="container p-3">
                            <p class="mb-2" style="font-size: 17px; font-weight:bold;"> Outcome </p>
                            <form action="/outcome" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="select-periode-4">Periode</label>
                                    <select id="select-periode-4" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectPeriode">
                                        <option selected value="">Select Periode...</option>
                                        @foreach ($periodes as $periode)
                                            <option value={{ $periode->id_periode }}>{{ $periode->roadmap }}
                                                ({{ $periode->tahun_awal }} - {{ $periode->tahun_akhir }}) <br>
                                                *{{$periode -> flag_column_keterangan}} tingkat
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="select-intermediate-2">Intermediate Objective</label>
                                    <select id="select-intermediate-2" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectIntermediate">
                                        <option selected value="">Select Intermediate Objective...</option>
                                        @foreach ($intermediates as $intermediate)
                                            <option value={{ $intermediate->id_intermediate }}>
                                                {{ $intermediate->strategi_intermediate }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="input_outcome">Outcome</label>
                                    <textarea class="form-control" id="input_outcome" aria-label="With textarea" style="width: 80%;"
                                        name="input_outcome" placeholder="Masukkan Strategi..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btnAdd"
                                    style="border-radius: 3px 3px 15px 15px;">
                                    <i class="bi bi-plus-square-dotted crtAdd"></i>Add Data
                                </button>
                            </form>

                            <hr class="my-5">
                            <p class="mb-2" style="font-size: 17px; font-weight:bold;"> Indikator for Outcome </p>
                            <form action="/indikator-outcome" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="select-outcome-1">Outcome</label>
                                    <select id="select-outcome-1" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectOutcome">
                                        <option selected value="">Select Outcome...</option>
                                        @foreach ($outcomes as $outcome)
                                            <option value={{ $outcome->id_outcome }}>{{ $outcome->strategi_outcome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="input_indikator_outcome">Indikator</label>
                                    <textarea id="input_indikator_outcome" class="form-control" aria-label="With textarea"
                                        style="width: 80%;" name="input_indikator_outcome" placeholder="Masukkan Indikator..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btnAdd"
                                    style="border-radius: 3px 3px 15px 15px;">
                                    <i class="bi bi-plus-square-dotted crtAdd"></i>Add Data
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-useofoutput" role="tabpanel" aria-labelledby="nav-goal-tab">
                        <div class="container p-3">
                            <p class="mb-2" style="font-size: 17px; font-weight:bold;">Use Of Output </p>
                            <form action="/use-of-output" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="select-periode-5">Periode</label>
                                    <select id="select-periode-5" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectPeriode">
                                        <option selected value="">Select Periode...</option>
                                        @foreach ($periodes as $periode)
                                            <option value={{ $periode->id_periode }}>{{ $periode->roadmap }}
                                                ({{ $periode->tahun_awal }} - {{ $periode->tahun_akhir }}) <br>
                                                *{{$periode -> flag_column_keterangan}} tingkat
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="select-outcome-2">Outcome</label>
                                    <select id="select-outcome-2" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectOutcome">
                                        <option selected value="">Select Outcome...</option>
                                        @foreach ($outcomes as $outcome)
                                            <option value={{ $outcome->id_outcome }}>{{ $outcome->strategi_outcome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="input_useofoutput">Use of Output</label>
                                    <textarea class="form-control" id="input_useofoutput" aria-label="With textarea" style="width: 80%;"
                                        name="input_useofoutput" placeholder="Masukkan Strategi..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btnAdd"
                                    style="border-radius: 3px 3px 15px 15px;">
                                    <i class="bi bi-plus-square-dotted crtAdd"></i>Add Data
                                </button>
                            </form>

                            <hr class="my-5">
                            <p class="mb-2" style="font-size: 17px; font-weight:bold;"> Indikator for Use Of Output </p>
                            <form action="/indikator-use-of-output" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="select-useofoutput-1">Use of Output</label>
                                    <select id="select-useofoutput-1" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectUseofoutput">
                                        <option selected value="">Select Use of Output...</option>
                                        @foreach ($use_of_outputs as $use_of_output)
                                            <option value={{ $use_of_output->id_use_of_output }}>
                                                {{ $use_of_output->strategi_use_of_output }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="input_indikator_useofoutput">Indikator</label>
                                    <textarea id="input_indikator_useofoutput" class="form-control" aria-label="With textarea"
                                        style="width: 80%;" name="input_indikator_useofoutput" placeholder="Masukkan Indikator..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btnAdd"
                                    style="border-radius: 3px 3px 15px 15px;">
                                    <i class="bi bi-plus-square-dotted crtAdd"></i>Add Data
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-output" role="tabpanel" aria-labelledby="nav-goal-tab">
                        <div class="container p-3">
                            <form action="/output" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="select-periode-6">Periode</label>
                                    <select id="select-periode-6" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectPeriode">
                                        <option selected value="">Select Periode...</option>
                                        @foreach ($periodes as $periode)
                                            <option value={{ $periode->id_periode }}>{{ $periode->roadmap }}
                                                ({{ $periode->tahun_awal }} - {{ $periode->tahun_akhir }}) <br>
                                                *{{$periode -> flag_column_keterangan}} tingkat
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="select-output">Outcome</label>
                                    <select id="select-output" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectOutcome">
                                        <option selected value="">Select Outcome...</option>
                                        @foreach ($outcomes as $outcome)
                                            <option value={{ $outcome->id_outcome }}>{{ $outcome->strategi_outcome }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="select-useofoutput-2">Use of Output</label>
                                    <select id="select-useofoutput-2" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectUseofoutput">
                                        <option selected value="">Select Use of Output...</option>
                                        @foreach ($use_of_outputs as $use_of_output)
                                            <option value={{ $use_of_output->id_use_of_output }}>
                                                {{ $use_of_output->strategi_use_of_output }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="input_output">Output</label>
                                    <textarea class="form-control" id="input_output" aria-label="With textarea" style="width: 80%;" name="input_output"
                                        placeholder="Masukkan Strategi..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btnAdd"
                                    style="border-radius: 3px 3px 15px 15px;">
                                    <i class="bi bi-plus-square-dotted crtAdd"></i>Add Data
                                </button>
                            </form>

                            <hr class="my-5">
                            <p class="mb-2" style="font-size: 17px; font-weight:bold;"> Indikator for Use Of Output </p>
                            <form action="/indikator-use-of-output" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="select-output"> Output</label>
                                    <select id="select-output" class="form-select mb-3"
                                        aria-label=".form-select-lg example" style="max-width:auto; width:auto;"
                                        name="selectOutput">
                                        <option selected value="">Select Output...</option>
                                        @foreach ($outputs as $output)
                                            <option value={{ $output->id_output }}>
                                                {{ $output->strategi_output }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="input_indikator_output">Indikator</label>
                                    <textarea id="input_indikator_output" class="form-control" aria-label="With textarea"
                                        style="width: 80%;" name="input_indikator_output" placeholder="Masukkan Indikator..."></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btnAdd"
                                    style="border-radius: 3px 3px 15px 15px;">
                                    <i class="bi bi-plus-square-dotted crtAdd"></i>Add Data
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
