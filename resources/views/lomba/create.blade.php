@extends('layouts.app')

@section('content')
    <div class="container-sm my-5">
        <form action="{{ route('lombas.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <h4>Create Lomba</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Nama</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Isi Nama Beasiswa">
                            @error('name')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="requirement" class="form-label">Persyaratan</label>
                            <textarea class="form-control @error('requirement') is-invalid @enderror" name="requirement" id="requirement" placeholder="Isi Persyaratan">{{ old('requirement') }}</textarea>
                            @error('requirement')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Isi Deskripsi">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="image" class="form-label">Foto</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('lombas.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
