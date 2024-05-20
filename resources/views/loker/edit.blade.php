@extends('layouts.app')

@section('content')
    <div class="container-sm my-5">
        <form action="{{ route('lokers.update', ['loker' => $loker->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 col-xl-6">
                    <div class="mb-3 text-center">
                        <h4>Edit Lowongan kerja</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="name" class="form-label">Nama</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ $errors->any() ? old('name') : $loker->name }}">
                            @error('name')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="requirement" class="form-label">Persyaratan</label>
                            <textarea class="form-control @error('requirement') is-invalid @enderror" name="requirement" id="requirement" rows="4">{{ $errors->any() ? old('requirement') : $loker->requirement }}</textarea>
                            @error('requirement')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4">{{ $errors->any() ? old('description') : $loker->description }}</textarea>
                            @error('description')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="image" class="form-label">Foto</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('lokers.index') }}" class="btn btn-outline-dark btn-lg mt-3"><i class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i> Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
