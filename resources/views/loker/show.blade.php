@extends('layouts.app_auth_nofooter')

@section('content')
    <div class="container-sm my-5">
        <div class="d-flex">
            <div class="text-body-secondary fw-bold">Lowongan Kerja, </div>
            <div class="fw-bold" style="margin-left: 5px; color: #219CB3">{{ $loker->created_at }}</div>
        </div>
        <div class="fw-bold" style="font-size: 35px">{{ $loker->name }}</div>
        <hr>
        <div class="col-md-4 d-flex justify-content-center align-items-center">
            <img src="{{ asset('storage/files/' . $loker->image) }}" class="img-fluid rounded shadow" alt="..."
                style="max-height: 180px;">
        </div>
        <hr>
        <div>
            <div class="text-body-secondary fw-bold" style="font-size: 20px">Persyaratan</div>
            <div class="fw-bold" style="margin-left: 5px; color: #219CB3">{{ $loker->requirement }}</div>
        </div>
        <hr>
        <div>
            <div class="text-body-secondary fw-bold" style="font-size: 20px">Deskripsi</div>
            <div class="fw-bold" style="margin-left: 5px; color: #219CB3">{{ $loker->description }}</div>
        </div>
    </div>
@endsection
