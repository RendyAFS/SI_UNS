@extends('layouts.app_guest')

@section('content')
    <div class="mb-3 mt-3 d-none d-md-block">
        <div class="text-center" style="position: relative;">
            {{-- Logo banner --}}
            <img class="img"
                style="width: 30%; position: absolute; top: 40%; left: 50%; transform: translateX(-50%); z-index: 10;"
                src="{{ Vite::asset('resources/assets/logo-banner.webp') }}" alt="image">

            {{-- Search box pc --}}
            <div class="container">
                <div class="input-group mb-3"
                    style="width: 60%; position: absolute; top: 65%; left: 50%; transform: translateX(-50%); z-index: 10;">
                    <input type="text" class="form-control rounded-start-4" placeholder="Search..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <span class="input-group-text p-1 rounded-end-4" id="basic-addon2">
                        <button type="button" class="btn btn-light text-dark">
                            <i class="bi bi-search"></i>
                        </button>
                    </span>
                </div>
            </div>
            {{-- banner --}}
            <img class="img" style="width: 100%; z-index: 1;" src="{{ Vite::asset('resources/assets/banner.webp') }}"
                alt="image">
        </div>
    </div>

    <div class="mb-3 mt-3 d-block d-md-none">
        {{-- Search box hp --}}
        <div class="container">
            <div class="input-group mb-3">
                <input type="text" class="form-control rounded-start-4" placeholder="Search..." aria-label="Search"
                    aria-describedby="basic-addon2">
                <span class="input-group-text p-1 rounded-end-4" id="basic-addon2">
                    <button type="button" class="btn btn-light">
                        <i class="bi bi-search"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col-12 col-md-9">
                <p class="h1 fw-bold">
                    Informasi Terbaru
                </p>
                <p class="fs-5">
                    Beasiswa, Lomba, dan Lowongan Kerja Terbaru
                </p>
            </div>
        </div>
        <hr class="line-hr">
        <div class="row">
            {{-- DATA --}}
            @foreach ($beasiswas as $beasiswa)
                <div class="card mb-3 px-3 py-2" style="max-width: 640px;  margin: 10px">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('storage/files/' . $beasiswa->image) }}" class="img-fluid rounded shadow"
                                alt="..." style="max-height: 180px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text"><small class="text-body-secondary">Beasiswa,
                                        {{ $beasiswa->created_at }}</small></p>
                                <h2 class="card-title" style="font-weight: bold">{{ $beasiswa->name }}</h2>
                                <p class="card-text">{{ $beasiswa->description }}</p>

                                {{-- Action --}}
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('guest.detail_beasiswa', ['id' => $beasiswa->id]) }}"
                                        class="btn btn-outline-dark btn-sm me-2"><i class="bi bi-info-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            {{-- DATA --}}
            @foreach ($lombas as $lomba)
                <div class="card mb-3 px-3 py-2" style="max-width: 640px;  margin: 10px">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('storage/files/' . $lomba->image) }}" class="img-fluid rounded shadow"
                                alt="..." style="max-height: 180px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text"><small class="text-body-secondary">Lomba,
                                        {{ $lomba->created_at }}</small></p>
                                <h2 class="card-title" style="font-weight: bold">{{ $lomba->name }}</h2>
                                <p class="card-text">{{ $lomba->description }}</p>

                                {{-- Action --}}
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('guest.detail_lomba', ['id' => $lomba->id]) }}"
                                        class="btn btn-outline-dark btn-sm me-2"><i class="bi bi-info-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            {{-- DATA --}}
            @foreach ($lokers as $loker)
                <div class="card mb-3 px-3 py-2" style="max-width: 640px;  margin: 10px">
                    <div class="row g-0">
                        <div class="col-md-4 d-flex justify-content-center align-items-center">
                            <img src="{{ asset('storage/files/' . $loker->image) }}" class="img-fluid rounded shadow"
                                alt="..." style="max-height: 180px;">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text"><small class="text-body-secondary">Loker,
                                        {{ $loker->created_at }}</small></p>
                                <h2 class="card-title" style="font-weight: bold">{{ $loker->name }}</h2>
                                <p class="card-text">{{ $loker->description }}</p>

                                {{-- Action --}}
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('guest.detail_loker', ['id' => $loker->id]) }}"
                                        class="btn btn-outline-dark btn-sm me-2"><i class="bi bi-info-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection
