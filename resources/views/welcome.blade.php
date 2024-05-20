@extends('layouts.app')

@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a href="/">
                    <img class="img" style="width: 80%" src="{{ Vite::asset('resources/assets/logo-siuns.webp') }}"
                        alt="image">
                </a>
                {{-- btn humbuerger --}}
                <button class="navbar-toggler border border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="bi bi-list fs-3"></i>
                </button>

                {{-- Content navbar --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link fs-6" aria-current="page" href="/">Terbaru</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-6" href="{{ route('guest.beasiswa') }}">Beasiswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-6" href="{{ route('guest.lomba') }}">Lomba</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-6" href="{{ route('guest.loker') }}">Lowongan Kerja</a>
                        </li>

                    </ul>
                    <a class="icon-link icon-link-hover link-offset-2 link-underline link-underline-opacity-0 text-dark fw-bold fs-6"
                        href="/login">
                        Sign In
                        <i class="bi bi-box-arrow-in-right fs-5 d-flex"></i>
                    </a>
                </div>
            </div>
        </nav>
    </div>
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
                    Beasiswa, Lomba, dan Loker Terbaru
                </p>
            </div>
            <div class="col-12 col-md-3 d-flex justify-content-end">
                <span class="align-middle">
                    <a href="" class="link-offset-2 link-underline link-underline-opacity-0 l-semuanya">
                        Lihat Semuanya
                    </a>
                </span>
            </div>
        </div>
        <hr class="line-hr">


    </div>
@endsection
