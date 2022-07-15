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

        <div class="d-block d-lg-none m-2">
            <a class="btn btn-outline-success" href="{{ url('/') }}">
                Home
            </a>
            <a class="btn btn-outline-success" href="{{ route('admin.summary.index') }}">
                Riassunto
            </a>
            <a class="btn btn-outline-success" href="{{ route('admin.coins.index') }}">
                Mie Monete
            </a>
            <a class="btn btn-outline-success" href="{{ route('admin.coins.create') }}">
                Aggiungi Moneta
            </a>
            <a class="btn btn-outline-success" href="{{ route('admin.stocks.index') }}">
                Mie Stocks
            </a>
            <a class="btn btn-outline-success" href="{{ route('admin.stocks.create') }}">
                Aggiungi Stocks
            </a>
            <a class="btn btn-outline-success" href="{{ route('admin.transactions.index') }}">
                Mie Transazioni Stocks
            </a>
            <a class="btn btn-outline-success" href="{{ route('admin.transactions.create') }}">
                Aggiungi Transazione Stocks
            </a>
            <a class="btn btn-outline-success" href="{{ route('admin.money.index') }}">
                Mia Liquidit&agrave;
            </a>
            <a class="btn btn-outline-success" href="{{ route('admin.money.create') }}">
                Aggiungi Liquidit&agrave;
            </a>
        </div>

        <div class="row border border-success rounded-3 p-3">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <img class="w-50 h-100 rounded-3" src="{{ asset('storage/' . $stock->immagine) }}"
                    alt="{{ $stock->codice }}">
            </div>
            <div class="col-sm- 12 col-md-12 col-lg-6">
                <div class="d-flex flex-column">
                    <h3 class="card-title text-success">{{ $stock->codice }}</h3>
                    <span class="mb-2"><span class="fw-bold text-uppercase">Nome: </span>
                    {{ $stock->nome }}</span>
                    <span class="mb-2"><span class="fw-bold text-uppercase">Ammontare: </span>
                        {{ $stock->ammontare }}&dollar;</span>
                    <span class="mb-2"><span class="fw-bold text-uppercase">Prezzo Singolo: </span>
                        {{ $stock->prezzo_singolo }}</span>
                </div>
            </div>
        </div>

        <a class="btn btn-success mt-5 text-white" href="{{ route('admin.stocks.index') }}">Miei Stocks</a>
    </div>
@endsection
