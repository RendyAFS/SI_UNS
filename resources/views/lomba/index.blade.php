@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-6">
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
            <div class="col-lg-3 col-xl-6">
                <ul class="list-inline mb-0 float-end">
                    <li class="list-inline-item">
                        <a href="{{ route('lombas.create') }}" class="btn btn-dark">
                            <i class="bi bi-plus-circle me-1"></i> Create Lomba
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row">
            @foreach ($lombas as $lomba)
                <div class="card mb-3" style="max-width: 540px; margin: 10px">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('storage/files/' . $lomba->image) }}" class="img-fluid rounded-start"
                                alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text"><small class="text-body-secondary">Lomba, {{ $lomba->created_at }}</small></p>
                                <h2 class="card-title" style="font-weight: bold">{{ $lomba->name }}</h2>
                                <p class="card-text">{{ $lomba->description }}</p>
                                <a href="{{ route('lombas.show', ['lomba' => $lomba->id]) }}"
                                    class="btn btn-outline-dark btn-sm me-2"><i class="fa-solid fa-circle-info"></i></a>
                                <a href="{{ route('lombas.edit', ['lomba' => $lomba->id]) }}"
                                    class="btn btn-outline-dark btn-sm me-2"><i class="bi-pencil-square"></i></a>
                                <div>
                                    <form action="{{ route('lombas.destroy', ['lomba' => $lomba->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-dark btn-sm me-2 btn-delete"
                                            data-name="{{ $lomba->name }}">
                                            <i class="bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
