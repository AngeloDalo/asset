@extends('layouts.admin')

@section('content')
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
        <a class="btn btn-outline-success" href="{{ route('admin.trends.index') }}">
            Trend
        </a>
        <a class="btn btn-outline-success" href="{{ route('admin.trends.create') }}">
            Aggiungi Trend
        </a>
    </div>
    <div class="container border border-success rounded-3 p-3 mb-4">
        <div class="row">
            <div class="col">
                <h2 class="text-uppercase"><span class="text-success">Modifica Stock:</span> {{ $stock->nome }}</h2>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container">
                <form action="{{ route('admin.stocks.update', $stock->id) }}" method="post" enctype="multipart/form-data"
                    id="MyForm">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            @if (!empty($stock->immagine))
                                <div class="mb-3 w-100">
                                    <img class="w-20 rounded-3 w-75" src="{{ asset('storage/' . $stock->immagine) }}"
                                        alt="{{ $stock->nome }}">
                                </div>
                            @endif
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="codice" class="form-label text-uppercase fw-bold">Codice</label>
                                <textarea type="text-area" class="form-control" id="codice" name="codice" row="5">{{ $stock->codice }}</textarea>
                            </div>
                            {{-- <p id="demo3"></p> --}}
                            @error('codice')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="mb-3">
                                <label for="nome" class="form-label text-uppercase fw-bold">Nome</label>
                                <textarea type="text-area" class="form-control" id="nome" name="nome" row="5">{{ $stock->nome }}</textarea>
                            </div>
                            {{-- <p id="demo3"></p> --}}
                            @error('nome')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="ammontare" class="form-label text-uppercase fw-bold">Ammontare</label>
                                <input type="text" class="form-control" id="ammontare" name="ammontare"
                                    value="{{ $stock->ammontare }}">
                            </div>
                            {{-- <p id="demo2"></p> --}}
                            @error('ammontare')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="prezzo_singolo" class="form-label text-uppercase fw-bold">Prezzo Singolo</label>
                                <input type="text" class="form-control" id="prezzo_singolo" name="prezzo_singolo"
                                    value="{{ $stock->prezzo_singolo }}">
                            </div>
                            {{-- <p id="demo2"></p> --}}
                            @error('prezzo_singolo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Salva</button>
                </form>
            </div>
        </div>
    </div>
@endsection
