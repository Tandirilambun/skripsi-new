@extends('main.index')
@section('index')
    <div class="container py-5">
        <div>
            <div class="mb-3 d-flex justify-content-end">
                {{-- rencananya disini mau taro filter sih --}}
                <div class="dropdown">
                    Filter by Action
                    <button class="btn dropdown-toggle ms-1 filter-action" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{$x}}
                    </button>
                    <ul class="dropdown-menu shadow-sm">
                        @foreach ($jenis_activity as $item)
                            <form action="/activity-log/filter-{{$item}}" method="POST">
                                @csrf
                                <li>
                                    <button type="submit" name="btn_value" class="btn dropdown-item"
                                        value="{{ $item }}">{{ Str::ucfirst($item)}}
                                    </button>
                                </li>
                            </form>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="accordion accordion-flush" id="accordionFlush">
                @foreach ($activity_log as $log)
                    <div class="accordion-item mb-3 border">
                        @if ($log->tipe_log === 'insert')
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-{{ $log->id_activity }}" aria-expanded="false"
                                    aria-controls="flush-{{ $log->id_activity }}">
                                    <i class="fa-solid fa-file-circle-plus me-3" style="font-size: 15px; color:#22A699"></i>
                                    <div>
                                        <p class="mb-1"> {{$log -> name}} insert data into
                                            <strong>{{ $log->locations_log }}</strong>
                                        </p>
                                        <small class="me-5" style="text-align: end">
                                            <i class="bi bi-clock-history me-1" style="font-size: 11px;"></i> Last
                                            {{ Str::substr($log->created_at, 0, 10) }} at
                                            {{ Str::substr($log->created_at, 11, 5) }}
                                        </small>
                                    </div>
                                </button>
                            </h2>
                            <div id="flush-{{ $log->id_activity }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlush">
                                <div class="accordion-body px-5">
                                    <p><code> 01 - </code>For : {{ $log->locations_log }}</p>
                                    <p><code> 02 - </code>Inserted : {{ $log->details_log }} </p>
                                    <p><code> 03 - Data inserted Successfull</code></p>
                                </div>
                            </div>
                        @elseif($log->tipe_log === 'update')
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-{{ $log->id_activity }}" aria-expanded="false"
                                    aria-controls="flush-{{ $log->id_activity }}">
                                    <i class="fa-solid fa-file-pen me-3" style="font-size: 15px; color:#F29727"></i>
                                    <div>
                                        <p class="mb-1">{{$log -> name}} made changes data for
                                            <strong>{{ $log->locations_log }}</strong>
                                        </p>
                                        <small class="me-5" style="text-align: end">
                                            <i class="bi bi-clock-history me-1" style="font-size: 11px;"></i> Last
                                            {{ Str::substr($log->created_at, 0, 10) }} at
                                            {{ Str::substr($log->created_at, 11, 5) }}
                                        </small>
                                    </div>
                                </button>
                            </h2>
                            <div id="flush-{{ $log->id_activity }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlush">
                                <div class="accordion-body px-5">
                                    <p><code> 01 - </code>For : {{ $log->details_log }}</p>
                                    <p><code> 02 - </code>Become : {{ $log->after_change }} </p>
                                    <p><code> 03 - Data update Successfull</code></p>
                                </div>
                            </div>
                        @elseif($log->tipe_log === 'delete')
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#flush-{{ $log->id_activity }}" aria-expanded="false"
                                    aria-controls="flush-{{ $log->id_activity }}">
                                    <i class="fa-solid fa-trash-can me-3" style="font-size: 15px; color:#F24C3D"></i>
                                    <div>
                                        <p class="mb-1">{{$log -> name}} removed Data from
                                            <strong> {{ $log->locations_log }}</strong>
                                        </p>
                                        <small class="me-5" style="text-align: end">
                                            <i class="bi bi-clock-history me-1" style="font-size: 11px;"></i> Last
                                            {{ Str::substr($log->created_at, 0, 10) }} at
                                            {{ Str::substr($log->created_at, 11, 5) }}
                                        </small>
                                    </div>
                                </button>
                            </h2>
                            <div id="flush-{{ $log->id_activity }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlush">
                                <div class="accordion-body px-5">
                                    <p><code> 01 - </code>For : {{ $log->details_log }}</p>
                                    <p><code> 02 - Data deleted successfull</code></p>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
