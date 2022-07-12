@extends('layouts.admin')

@section('content')
    <div class="container show ps-5 pb-5">
        <div class="row">
            @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
            @endif
        </div>


        <div class="row border border-danger rounded-3 p-3">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <img class="w-100 h-100 rounded-3" src="{{ asset('storage/' . $coin->immagine) }}"
                    alt="{{ $coin->codice }}">
            </div>
            <div class="col-sm- 12 col-md-12 col-lg-6">
                <div class="d-flex flex-column">
                    <h3 class="card-title text-danger">{{ $coin->ammontare }}</h3>
                    <span class="mb-2"><span class="fw-bold text-uppercase">Ammontare: </span> {{ $coin->ammontare }}&dollar;;</span>
                    <span class="mb-2"><span class="fw-bold text-uppercase">Prezzo Singolo: </span> {{ $coin->prezzo_singolo }}</span>
                    <span class="mb-2"><span class="fw-bold text-uppercase">Apy: </span> {{ $coin->apy }}</span>
                </div>
            </div>
        </div>
        <a class="btn btn-danger mt-5 text-white" href="{{ route('admin.coins.index') }}">Mie Monete</a>
    </div>
@endsection
