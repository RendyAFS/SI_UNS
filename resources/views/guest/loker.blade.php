@extends('layouts.app')

@section('content')
    @include('layouts.nav_user')

    <div class="container mt-5 mb-5">
        <span class="h1 fw-bold">
            List Lowongan Kerja
        </span>
        <p class="mt-3">
            Kesempatan Kerja Terbaik
        </p>
        <hr class="line-hr">

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
                                <p class="card-text"><small class="text-body-secondary">loker,
                                        {{ $loker->created_at }}</small></p>
                                <h2 class="card-title" style="font-weight: bold">{{ $loker->name }}</h2>
                                <p class="card-text">{{ $loker->description }}</p>

                                {{-- Action --}}
                                <div class="d-flex justify-content-end">
                                    <a href="" class="btn btn-outline-dark btn-sm me-2"><i
                                            class="bi bi-info-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection