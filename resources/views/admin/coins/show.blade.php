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
            <a class="btn btn-outline-success" href="{{ route('admin.money.index') }}">
                Mia Liquidit&agrave;
            </a>
            <a class="btn btn-outline-success" href="{{ route('admin.money.create') }}">
                Aggiungi Liquidit&agrave;
            </a>
        </div>

        <div class="row border border-success rounded-3 p-3">
            <div class="col-sm-12 col-md-12 col-lg-6">
                <img class="w-50 h-100 rounded-3" src="{{ asset('storage/' . $coin->immagine) }}"
                    alt="{{ $coin->codice }}">
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="d-flex flex-column">
                    <h3 class="card-title text-success">{{ $coin->codice }}</h3>
                    <span class="mb-2"><span class="fw-bold text-uppercase">Ammontare: </span>
                        {{ $coin->ammontare }}&dollar;;</span>
                    <span class="mb-2"><span class="fw-bold text-uppercase">Prezzo Singolo: </span>
                        {{ $coin->prezzo_singolo }}</span>
                    <span class="mb-2"><span class="fw-bold text-uppercase">Apy: </span> {{ $coin->apy }}</span>
                </div>
            </div>
        </div>

        <div class="row border border-success rounded-3 p-3">
            @foreach ($addresses as $address)
                <div class="row mb-3">
                    <div class="col-3"><span>PORTAFOGLIO: {{ $address->portafoglio }}</span></div>
                    <div class="col-3"><span>INDIRIZZO: {{ $address->indirizzo }}</span></div>
                    <div class="col-3"> <a class="btn btn-success text-white" href="{{ route('admin.address.edit', $address->id) }}">Modifica</a></div>
                    <div class="col-3">
                            <form action="{{ route('admin.address.destroy', $address) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-success text-white" type="submit" value="Elimina">
                            </form>
                    </div>
                </div>
            @endforeach
            <a class="btn btn-success mt-5 text-white" href="{{ route('admin.address.create', $coin->id) }}">Aggiungi Indirizzo
                {{ $coin->codice }}</a>
        </div>


        <a class="btn btn-success mt-5 text-white" href="{{ route('admin.coins.index') }}">Mie Monete</a>
    </div>
@endsection
